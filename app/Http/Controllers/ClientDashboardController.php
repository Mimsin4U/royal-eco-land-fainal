<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CompanyInfo;
use App\Models\PlotOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientDashboardController extends Controller
{
    
    public function index()
    {
        $company = CompanyInfo::select('logo_png')->first();
        $plotOrder = PlotOrder::where('client_id', Auth::guard('client')->user()->id)->first();
        return view('frontEnd.dashboard.index',compact('company', 'plotOrder'));
    }

    public function plots()
    {
        $company = CompanyInfo::select('logo_png')->first();
        $plotOrder = PlotOrder::where('client_id', Auth::guard('client')->user()->id)->first();
        return view('frontEnd.dashboard.plots',compact('company', 'plotOrder'));
    }

    public function paymentSummery()
    {
        $company = CompanyInfo::select('logo_png')->first();
        $plotOrder = PlotOrder::where('client_id', Auth::guard('client')->user()->id)->first();
        return view('frontEnd.dashboard.paymentSummery',compact('company', 'plotOrder'));
    }
    
    public function installments()
    {
        $company = CompanyInfo::select('logo_png')->first();
        $plotOrder = PlotOrder::with('installments')->where('client_id', Auth::guard('client')->user()->id)->first();
        return view('frontEnd.dashboard.installments',compact('company', 'plotOrder'));
    }

    public function profile()
    {
        $company = CompanyInfo::select('logo_png')->first();
        return view('frontEnd.dashboard.profile',compact('company'));
    }

    public function changePassword()
    {
        $company = CompanyInfo::select('logo_png')->first();
        return view('frontEnd.dashboard.changePassword',compact('company'));
    }

    public function updatePassword(Request $request)
    {
        
        $request->validate([
            'current_password' => ['required',function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::guard('client')->user()->password)) {
                    return $fail(__('Current password is Incorrect Try Again or Contact To Admin.'));
                }
            }],
            'password' => 'required | min:6',
            'password_confirmation' => 'required|same:password',
            
        ]);
        $client = Client::find(Auth::guard('client')->user()->id);
        $client->password = Hash::make($request->password_confirmation);
        $client->save();
        return back()->with('message', "Your NewPassword Is : " . $request->password_confirmation);
    }
}
