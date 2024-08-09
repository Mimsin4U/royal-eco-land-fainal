<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PlotCategory;
use App\Models\PlotType;
use App\Models\PlotUnitPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlotUnitPriceController extends Controller
{
    public function index(){

        return view('admin.web.plotUnitPrice.plot-unit-price',[
            'plotCategory' => PlotCategory::all(),
            'plotType' => PlotType::all(),
        ]);
    }
     
    public function store(Request $request){

        $dataSave=new PlotUnitPrice();
        $plot_category_id=$request->plot_category_id;
        // $dataSave->save();

        $plot_type_id_arr = $request->plot_type_id;
        $unit_price_arr = $request->unit_price;
        foreach($plot_type_id_arr as $key => $v) {
            $rows[$key]['plot_category_id'] = $plot_category_id;
            $rows[$key]['plot_type_id']     = $plot_type_id_arr[$key];
            $rows[$key]['unit_price']       = $unit_price_arr[$key];
          
        }

        // $data_store = [];
        // for ($i = 0; $i < count($request->plot_type_id); $i++) {
        //     $data_store[] = [
        //         // 'plot_category_id' => $request->plot_category_id,
        //         'plot_type_id' => $request->plot_type_id[$i],
        //         'unit_price' => $request->unit_price[$i],
                
        //     ];
        // }
        // return $data_store;
        DB::table('plot_unit_prices')->insert($rows,['plot_category_id'=> $plot_category_id]);
        

        return redirect(route('plotUnitPrice.manage'))->with('message', 'plotCat create successfully.');
    
    }

    
    public function manage(){
        return view('admin.web.plotUnitPrice.plot-unit-price-manage',[
            'plotUnitPrice'=> DB::table('plot_unit_prices')
                            ->join('plot_categories as plc','plc.id','plot_unit_prices.plot_category_id')
                            ->join('plot_types as plt','plt.id','plot_unit_prices.plot_type_id')
                            ->select('plot_unit_prices.*','plc.plc_name','plt.plt_name')
                            ->get()
            

        ]);
    }
    public function plotUnitPriceEdit($id)
    { 
        
        // $plotUnitPrice =  PlotUnitPrice::select(DB::raw("plot_unit_prices.*"))
            // ->Join('plot_categories AS plc', 'plc.id', 'plot_unit_prices.plot_category_id')
            // ->Join('plot_types AS plt', 'plt.id', 'plot_unit_prices.plot_type_id')
            // ->where('plot_unit_prices.plot_category_id',$id)
            // ->get(),;
        // return $plotUnitPrice;
        

        
        // return $plotUnitPrice  = PlotUnitPrice::select(DB::raw("plot_unit_prices.*,plot_unit_prices.id as id,plot_types.*,plot_categories.*"))

        //         ->leftJoin('plot_categories', function($join) use ($id) {
        //             $join->on('plot_categories.id', '=', 'plot_unit_prices.plot_category_id');
        //             // $join->on('employee_salary_details.employee_salary_info_id', '=', DB::raw($id));

        //         })

        //         ->leftJoin('plot_types', function($join) use ($id) {
        //             $join->on('plot_types.id', '=', 'plot_unit_prices.plot_type_id');
        //             // $join->on('plot_unit_prices.id', '=', DB::raw($id));

        //         })
        //         ->where('plot_unit_prices.id',$id)
        //         ->get();
        // return PlotUnitPrice::where('plot_unit_prices.plot_category_id',$id)->get();
        
        
        
        
        // return PlotUnitPrice::where('plot_unit_prices.plot_category_id',$id)
        // ->get();
        return view('admin.web.plotUnitPrice.plot-unit-price-edit', [
            'plotUnitPrice' =>PlotUnitPrice::where('plot_unit_prices.plot_category_id',$id)
                                ->get(),
            'plotCategory'  =>PlotCategory::all(),
            'plotType'         =>PlotType::all(),

        ]);
    }
     



    // public function plotUnitPriceUpdate(Request $request,$id){
    //     $update = PlotUnitPrice::find($id);
    //     $update->plot_category_id  = $request->plt_name;
    //     $update->plot_type_id  = $request->plt_description;     
    //     $update->unit_price     = $request->plt_status;
    //     $update->save();
    //     return redirect('plot-type-manage')->with('message', 'plotCat Update successfully.');
 
    // }
}
