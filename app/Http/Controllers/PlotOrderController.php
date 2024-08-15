<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssistantSalesManeger;
use App\Models\Client;
use App\Models\Commission;
use App\Models\Director;
use App\Models\JointDirector;
use App\Models\PlotCategory;
use App\Models\PlotOrder;
use App\Models\PlotOrderInstallment;
use App\Models\SeniorManeger;
use App\Models\VisitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlotOrderController extends Controller
{
    public function index()
    {
        $plotOrders = PlotOrder::whereIn('status', [1, 2])->latest()->get();
        if (Auth::user()->type) {
            $plotOrders = PlotOrder::where('confirmed_by', Auth::user()->code)->whereIn('status', [1, 2])->latest()->get();
        }
        
        return view('admin.plot-order.index', compact('plotOrders'));
    }

    public function create($id) {
        $visitRequest = VisitRequest::find($id,['id','name', 'email', 'mobile', 'category_name']);
        return view('admin.plot-order.create',compact('visitRequest'));
    }

    public function manualOrder() {
        $plotCategories = PlotCategory::where('status',1)->get();
        $directorors = Director::where('status', 1)->get(['name', 'code', 'mobile', 'email']);
        $jointDirectors = JointDirector::where('status', 1)->get(['code', 'name', 'mobile', 'email']);
        $seniorManegers = SeniorManeger::where('status', 1)->get(['code', 'name', 'mobile', 'email']);
        $asistentSeniorManegers = AssistantSalesManeger::where('status', 1)->get(['code', 'name', 'mobile', 'email']);
        return view('admin.plot-order.manual-order', compact('plotCategories', 'directorors', 'jointDirectors', 'seniorManegers', 'asistentSeniorManegers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:100',
            'email' => 'required | unique:clients,email',
            'mobile' => 'required | max:15',
            'client_nid' => 'required',
            'nomine' => 'required',
            'nomine_nid' => 'required',
            'category_name' => 'required',
            'plot_no' => 'required',
            'plot_uid' => 'required | unique:plot_orders,plot_uid',
            'plot_area' => 'required | integer',
            'plot_road_no' => 'required',
            'total_price' => 'required | integer | min:1000',
            'booking_money' => 'required | integer  | min:100',
            'down_payment_date' => 'required',
        ],);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make(12345678)
        ]);

        $vr = VisitRequest::find($request->vrId);

        $plotOrder = new PlotOrder();
        $plotOrder->confirmed_by      = $vr->assigned_to ?? $request->confirmed_by;
        $plotOrder->client_id         = $client->id;
        $plotOrder->nomine            = $client->nomine;
        $plotOrder->nomine_nid        = $client->nomine_nid;
        $plotOrder->category_name     = $request->category_name;
        $plotOrder->plot_no           = $request->plot_no;
        $plotOrder->plot_uid          = $request->plot_uid;
        $plotOrder->plot_area         = $request->plot_area;
        $plotOrder->plot_road_no      = $request->plot_road_no;
        $plotOrder->total_price       = $request->total_price;
        $plotOrder->booking_money     = $request->booking_money;
        $plotOrder->paid_amount       = $request->booking_money;
        $plotOrder->due_amount        = $request->total_price - $request->booking_money;
        $plotOrder->down_payment_date = $request->down_payment_date;
        $plotOrder->save();

        if($vr) {
            $vr->delete();
        }

        $this->giveBookingMoneyCommission($plotOrder->id,1, $request->booking_money);
        
        return to_route('plotOrders')->with('message', "Plot Order Placed Successfully And New Client  ( $client->name ) Added, Password is: 12345678 ");
    }

    public function receiveDpView($id)
    {
        $plotOrder = PlotOrder::find($id);
        return view('admin.plot-order.receive-dp', compact('plotOrder'));
    }

    public function receiveDp(Request $request, $id)
    {
        $request->validate([
            'down_payment' => 'required | integer | min:100',
            'installment_years' => 'required | integer',
        ]);
        
        $installments = 12 * $request->installment_years;

        $plotOrder = PlotOrder::find($id);
        $plotOrder->down_payment      = $request->down_payment;
        $plotOrder->installment_years = $request->installment_years;
        $plotOrder->installment_count = $installments;
        $plotOrder->status            = 2; // Down Payment Paid

        if ($request->installment_years == 7) {
            $plotOrder->total_price_extended = $plotOrder->total_price + ($plotOrder->plot_area * 100000);
        } elseif ($request->installment_years == 10) {
            $plotOrder->total_price_extended = $plotOrder->total_price + ($plotOrder->plot_area * 200000);
        } else {
            $plotOrder->total_price_extended = $plotOrder->total_price;
        }

        $plotOrder->paid_amount = $plotOrder->paid_amount + $request->down_payment;
        $plotOrder->due_amount = $plotOrder->total_price_extended - $plotOrder->paid_amount;
        $plotOrder->amount_per_installment = round($plotOrder->due_amount /  $installments);
        $plotOrder->save();
        
        $this->giveDownPaymentCommission($plotOrder,2, $request->down_payment);
        
        return to_route('plotOrders')->with('message', 'Down Payment Recived Successfully!');
    }

    public function reciveInstallmentView()
    {
        $clients = Client::all('id', 'name', 'email', 'mobile');
        
        $plotOrder = '';
        return view('admin.plot-order.receive-installment', compact('clients', 'plotOrder'));
    }

    public function reciveInstallment(Request $request)
    {
        $request->validate([
            'amount' => 'required | integer'
        ]);

        $plotOrder = PlotOrder::find($request->plot_order_id);

        if ($plotOrder->due_amount == 0) {
            return to_route('admin.reciveInstallmentView')->with('error', 'Plot Order Amount Already Clearded! ');
        }

        if($plotOrder->installment_count == 0 ) {
            return to_route('admin.reciveInstallmentView')->with('error', 'No Installment Left pay with #fine!');
        }

        $installment = new PlotOrderInstallment();
        $installment->plot_order_id  = $request->plot_order_id;
        $installment->amount = $request->amount;
        $installment->payment_date = now();
        $installment->status = 1;
        if ($plotOrder->installments->count()) {
            $installment->installment_no = $plotOrder->installments->last()->installment_no + 1;
        } else {
            $installment->installment_no = 1;
        }
        $installment->save();

        $plotOrder->installment_count = $plotOrder->installment_count - 1;
        $plotOrder->paid_amount = $plotOrder->paid_amount + $installment->amount;
        $plotOrder->due_amount  = $plotOrder->total_price_extended - $plotOrder->paid_amount;
        $plotOrder->amount_per_installment = round($plotOrder->due_amount / $plotOrder->installment_count);
        $plotOrder->save();

        // Commission 
        $this->giveInstallmentCommission($plotOrder->id,3, $request->amount);

        return to_route('admin.reciveInstallmentView')->with('message', 'Installment Amount Recived Successfully!');
    }

    public function searchInstallment(Request $request)
    {
        $clients = Client::all('id', 'name', 'email', 'mobile');
        $plotOrder = PlotOrder::where('status', 2)->where('client_id', $request->client_id)->first();

        return view('admin.plot-order.receive-installment', compact('clients', 'plotOrder'));
    }

    public function commissions()
    {
        if (Auth::user()->type == null) {
            $commissions = Commission::with('plotOrder')->latest()->get();
        }else {
            $commissions = Commission::with('plotOrder')->where('employee_code' , Auth::user()->code)->latest()->get();
        }
        return view('admin.plot-order.commissions', compact( 'commissions', ));
    }



// Private Methods ------------------------------------------------------------------------->

    // For BookingMoneyCommission -------->
    private function giveBookingMoneyCommission($plotOrderId, int $cType,$amount)
    {
        $plotOrder = PlotOrder::find($plotOrderId);
        if (Str::startsWith($plotOrder->confirmed_by, 'D')) {
            $d = Director::where('code', $plotOrder->confirmed_by)->first();
            if ($d) {
                $commissionRates = [
                    $d->code => 45,
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'JD')) {
            $jd = JointDirector::where('code', $plotOrder->confirmed_by)->first();
            if ($jd) {
                $commissionRates = [
                    $jd->code => 40,
                    $jd->director->code => 5
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'SM')) {
            $sm = SeniorManeger::where('code', $plotOrder->confirmed_by)->first();
            if ($sm) {
                $jointDirectorCode = $sm->jointDirector ? $sm->jointDirector->code : null;
                $commissionRates = [
                    $sm->code => 30,
                    $jointDirectorCode => 10,
                    $sm->director->code => $jointDirectorCode ? 5 : 15
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'ASM')) {
            $asm = AssistantSalesManeger::where('code', $plotOrder->confirmed_by)->first();
            if ($asm) {
                $seniorManagerCode = $asm->seniorManeger ? $asm->seniorManeger->code : null;
                $jointDirectorCode = $asm->jointDirector ? $asm->jointDirector->code : null;
                $commissionRates = [
                    $asm->code => 20,
                    $seniorManagerCode => 10,
                    $jointDirectorCode => $seniorManagerCode ? 10 : 20,
                    $asm->director->code => $jointDirectorCode ? 5 : ($seniorManagerCode ? 15 : 25)
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        }
    }

    // For DownPaymentCommission -------->
    private function giveDownPaymentCommission($plotOrderId, int $cType,$amount)
    {
        $plotOrder = PlotOrder::find($plotOrderId->id);

        if (Str::startsWith($plotOrder->confirmed_by, 'D')) {
            $d = Director::where('code', $plotOrder->confirmed_by)->first();
            if ($d) {
                $commissionRates = [
                    $d->code => 20,
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'JD')) {
            $jd = JointDirector::where('code', $plotOrder->confirmed_by)->first();
            if ($jd) {
                $commissionRates = [
                    $jd->code => 18,
                    $jd->director->code => 2
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'SM')) {
            $sm = SeniorManeger::where('code', $plotOrder->confirmed_by)->first();
            if ($sm) {
                $jointDirectorCode = $sm->jointDirector ? $sm->jointDirector->code : null;
                $commissionRates = [
                    $sm->code => 15,
                    $jointDirectorCode => 3,
                    $sm->director->code => $jointDirectorCode ? 2 : 5
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'ASM')) {
            $asm = AssistantSalesManeger::where('code', $plotOrder->confirmed_by)->first();
            if ($asm) {
                $seniorManagerCode = $asm->seniorManeger ? $asm->seniorManeger->code : null;
                $jointDirectorCode = $asm->jointDirector ? $asm->jointDirector->code : null;
                $commissionRates = [
                    $asm->code => 10,
                    $seniorManagerCode => 5,
                    $jointDirectorCode => $seniorManagerCode ? 3 : 8,
                    $asm->director->code => $jointDirectorCode ? 2 : ($seniorManagerCode ? 5 : 10)
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $amount);
            }
        }
    }

    // For InstallmentCommission -------->
    private function giveInstallmentCommission($plotOrderId, int $cType,$installmentAmoutnt)
    {
        $plotOrder = PlotOrder::find($plotOrderId);

        if (Str::startsWith($plotOrder->confirmed_by, 'D')) {
            $d = Director::where('code', $plotOrder->confirmed_by)->first();
            if ($d) {
                $commissionRates = [
                    $d->code => 15,
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder, $installmentAmoutnt);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'JD')) {
            $jd = JointDirector::where('code', $plotOrder->confirmed_by)->first();
            if ($jd) {
                $commissionRates = [
                    $jd->code => 13,
                    $jd->director->code => 2
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder,$installmentAmoutnt);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'SM')) {
            $sm = SeniorManeger::where('code', $plotOrder->confirmed_by)->first();
            if ($sm) {
                $jointDirectorCode = $sm->jointDirector ? $sm->jointDirector->code : null;
                $commissionRates = [
                    $sm->code => 11,
                    $jointDirectorCode => 2,
                    $sm->director->code => $jointDirectorCode ? 2 : 4
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder,$installmentAmoutnt);
            }
        } elseif (Str::startsWith($plotOrder->confirmed_by, 'ASM')) {
            $asm = AssistantSalesManeger::where('code', $plotOrder->confirmed_by)->first();
            if ($asm) {
                $seniorManagerCode = $asm->seniorManeger ? $asm->seniorManeger->code : null;
                $jointDirectorCode = $asm->jointDirector ? $asm->jointDirector->code : null;
                $commissionRates = [
                    $asm->code => 8,
                    $seniorManagerCode => 3,
                    $jointDirectorCode => $seniorManagerCode ? 2 : 5,
                    $asm->director->code => $jointDirectorCode ? 2 : ($seniorManagerCode ?  4 : 7)
                ];
                $this->giveCommission($commissionRates, $cType, $plotOrder,$installmentAmoutnt);
            }
        }
    }

    // For Giveing Commission to a d,jd,sm,asm --------->
    private function giveCommission($commissionRates,$cType,$plotOrder,$amount) 
    {
        foreach ($commissionRates as $employeeCode => $percentage) {
            if ($employeeCode) {
                $commission = new Commission();
                $commission->plot_order_id = $plotOrder->id;
                $commission->employee_code = $employeeCode;
                $commission->amount = round(($amount * $percentage) / 100);
                $commission->tax =  round(($commission->amount * 15) / 100);
                $commission->erning = $commission->amount - $commission->tax;
                $commission->installment_no = $cType == 3 ? $plotOrder->installments->last()->installment_no : null;
                $commission->payment_date = now();
                $commission->type = $cType;
                $commission->save();
            }
        }
    }

    public function invoice($id)
    {
        $plotOrder = PlotOrder::find($id);
        return view('admin.plot-order.invoice', compact('plotOrder'));
    }

}
