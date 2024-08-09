<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PlotType;
use Illuminate\Http\Request;

class PlotTypeController extends Controller
{
    public function plot_type(){

        return view('admin.web.plotType.plot-type');
    }
     
    public function plotTypeCreate(Request $request){
        $plotType = new PlotType();
        $plotType->plt_name  = $request->plt_name;
        $plotType->plt_description  = $request->plt_description;     
        $plotType->plt_image      = $this->getImageUrl($request);
        $plotType->plt_status     = $request->plt_status;
        $plotType->save();
        return redirect('plot-type')->with('message', 'Plot Type Create Successfully.');
    
    }

    public function getImageUrl($request)
    {
        $image = $request->file('plt_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $directory = 'upload-image/plot-type-images/';
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }

    public function plotTypeManage(){
        return view('admin.web.plotType.plot-type-manage',[
            'plotTypes'=>PlotType::all()
        ]);
    }
    public function plotTypeEdit($id)
    { 
        return view('admin.web.plotType.plot-type-edit', ['plotType' => PlotType::find($id)]);
    }
     
    public function plotTypeUpdate(Request $request,$id){
        $plotType = PlotType::find($id);
        $plotType->plt_name         = $request->plt_name;
        $plotType->plt_description  = $request->plt_description;    
        $plotType->plt_status       = $request->plt_status;
        if ($request->file('plt_image'))
        {
            if (file_exists($plotType->plt_image))
            {
                unlink($plotType->plt_image);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else
        {
            $imageUrl = $plotType->plt_image;
        }
        $plotType->plt_image = $imageUrl; 
          
        $plotType->save();
        return redirect('plot-type-manage')->with('message', 'plotCat Update successfully.');
 
    }
    public function plotTypeDelete(Request $request)
    {
        $plotType = PlotType::find($request->plotType_id);
        if ($request->file('plt_image'))
        {   
            
            if (file_exists($plotType->plt_image))
            {
                unlink($plotType->plt_image);
            }
            unlink($request->plt_image);
              
        } 
        $plotType->delete();
        return redirect('plot-type-manage')->with('message', 'plotCat delete successfully.');
    }
}
