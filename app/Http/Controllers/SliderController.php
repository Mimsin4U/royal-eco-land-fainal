<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // private $slider;
    public function slider()
    {
        return view('admin.web.slider.slider');
    }

    public function sliderCreate(Request $request)
    {
        $slider = new Slider();
        $slider->title_one  = $request->sl_title;
        $slider->title_two  = $request->sl_sub_title;
        $slider->image      = imageUpload($request->sl_image, 'upload-image/slider-images/', 'slider');
        $slider->status     = $request->sl_status;
        $slider->save();
        return redirect('slider')->with('message', 'Slider Created Successfully.');
    }

    public function sliderManage()
    {
        return view('admin.web.slider.slider-manage', [
            'sliders' => Slider::latest()->get()
        ]);
    }
    public function sliderEdit($id)
    {
        return view('admin.web.slider.slider-edit', ['slider' => Slider::find($id)]);
    }

    public function sliderUpdate(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->title_one = $request->sl_title;
        $slider->title_two = $request->sl_sub_title;
        $slider->status = $request->sl_status;

        if ($request->file('sl_image')) {
            if (file_exists($slider->image)) {
                unlink($slider->image);
            }
            $imageUrl = imageUpload($request->sl_image, 'upload-image/slider-images/', 'slider');
        }

        $slider->save();
        return redirect('slider-manage')->with('message', 'Slider Updated Successfully.');
    }
    public function sliderDelete(Request $request)
    {
        $slider = Slider::find($request->slider_id);
        if ($request->file('sl_image')) {
            if (file_exists($slider->image)) {
                unlink($slider->image);
            }
        }
        $slider->delete();
        return redirect('slider-manage')->with('message', 'Slider Deleted Successfully.');
    }
}
