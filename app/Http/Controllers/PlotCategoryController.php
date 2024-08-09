<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PlotCategory;
use Illuminate\Http\Request;

class PlotCategoryController extends Controller
{
    public function create()
    {
        return view('admin.plot-category.index', );
    }

    public function store(Request $request)
    {
        $plotCat = new PlotCategory();
        $plotCat->name        = $request->name;
        $plotCat->short_desc  = $request->short_desc;
        $plotCat->long_desc   = $request->long_desc;
        $plotCat->image       = imageUpload($request->image, 'upload-image/plot-category-images/', 'plot-category');
        $plotCat->vedio       = $request->vedio ?? null;
        $plotCat->status      = $request->status;
        $plotCat->save();

        return back()->with('message', 'Plot Category Create Successfully.');
    }

    public function manage()
    {
        $plotCategories = PlotCategory::all();
        return view('admin.plot-category.manage', compact('plotCategories'));
    }

    public function edit($id)
    {
        return view('admin.plot-category.edit', [
            'plotCat' => PlotCategory::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $plotCat = PlotCategory::find($id);
        $plotCat->name  = $request->name;
        $plotCat->short_desc = $request->short_desc;
        $plotCat->long_desc  = $request->long_desc;
        $plotCat->status = $request->status;
        if ($request->hasFile('image')) {
            if (file_exists($plotCat->image)) {
                unlink($plotCat->image);
            }
            $plotCat->image  = imageUpload($request->image, 'upload-image/plot-category-images/', 'plot-category');
        }
        $plotCat->vedio = $request->vedio? $request->vedio: null;
        $plotCat->save();

        return redirect()->route('admin.plotCategory.manage')->with('message', 'Plot Category Update Successfully.');
    }

    public function delete(Request $request)
    {
        $plotCat = PlotCategory::find($request->plotCat_id);
        if (file_exists($plotCat->image)) {
            unlink($plotCat->image);
        }
        if (file_exists($plotCat->vedio)) {
            unlink($plotCat->vedio);
        }
        $plotCat->delete();
        return redirect()->route('admin.plotCategory.manage')->with('message', 'Plot Category Deleted Successfully.');
    }
}
