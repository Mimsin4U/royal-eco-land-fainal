<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use App\Models\PlotCategory;
use App\Models\PlotCategoryTypePrice;
use App\Models\PlotImage;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlotController extends Controller
{
    public function index()
    {
        return view('admin.web.plot.plot', [
            'project' => Project::all(),
            'plotCategory' => PlotCategory::all(),
        ]);
    }
    public function plotStore(Request $request)
    {
        $plot = new Plot();
        $plot->name              = $request->pl_name;
        $plot->number            = $request->number;
        $plot->project_id        = $request->plot_project_id;
        $plot->plot_category_id  = $request->plot_category_id;
        $plot->plot_type_id      = $request->plot_category_type_id;
        $plot->plot_size         = $request->plot_size;
        $plot->unit_price        = $request->unit_price;
        $plot->description       = $request->description;
        $plot->save();
        if ($pImages = $request->p_images) {
            foreach ($pImages as $pImage) {
                $image = imageUpload($pImage, 'upload-image/plot-images/', 'plot-image');
                $plotImage = new PlotImage();
                $plotImage->plot_id = $plot->id;
                $plotImage->p_image = $image;
                $plotImage->save();
            }
        }
        return redirect(route('plot.index'))->with('message', 'Plot Created Successfully');
    }

    public function plotManage()
    {
        $plots = Plot::select(DB::raw("plots.*,projects.p_name,plot_categories.plc_name,plot_types.plt_name"))
            ->join('projects', 'projects.id', 'plots.project_id')
            ->join('plot_categories', 'plot_categories.id', 'plots.plot_category_id')
            ->join('plot_types', 'plot_types.id', 'plots.plot_type_id')
            ->get();
        return view('admin.web.plot.plot-manage', ['plots' => $plots]);
    }

    public function plotEdit($id)
    {
        return view('admin.web.plot.plot-edit', [
            'plot' => Plot::find($id),
            'project' => Project::all(),
            'plotCategory' => PlotCategory::all(),
            'plotType' => Plot::select(DB::raw("plot_types.*,plot_categories.*"))
                ->join('plot_types', 'plot_types.id', 'plots.plot_type_id')
                ->join('plot_categories', 'plot_categories.id', 'plots.plot_category_id')
                ->get()
        ]);
    }

    public function plotUpdate(Request $request)
    {
        $plot = Plot::find($request->plot_id);
        $plot->name              = $request->pl_name;
        $plot->number            = $request->number;
        $plot->project_id        = $request->plot_project_id;
        $plot->plot_category_id  = $request->plot_category_id;
        $plot->plot_type_id      = $request->plot_category_type_id;
        $plot->plot_size         = $request->plot_size;
        $plot->unit_price        = $request->unit_price;
        $plot->description       = $request->description;
        $plot->save();
        return redirect(route('plot.manage'))->with('message', 'Plot Upadated Successfully');
    }

    public function plotCategoryTypeData($id)
    {
        $data =  PlotCategoryTypePrice::select(DB::raw("plot_category_type_prices.*,plot_types.plt_name"))
            ->where('plot_category_type_prices.plot_category_id', $id)
            ->join('plot_types', 'plot_types.id', 'plot_category_type_prices.plot_type_id')
            ->get();
        return response()->json(['rows' => $data], 200);
    }

    public function plotDelete(Request $request)
    {
        $plot = Plot::find($request->plot_id);
        $plot->delete();
        return redirect(route('plot.manage'))->with('message', 'Plot delete successfully.');
    }
}
