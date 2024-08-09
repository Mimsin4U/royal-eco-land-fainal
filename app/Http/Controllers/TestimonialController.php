<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function testimonial()
    {
        return view('admin.web.testimonial.testimonial');
    }

    public function testimonialCreate(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->name        = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->feedback = $request->feedback;
        $testimonial->image       = imageUpload($request->image, 'upload-image/testimonial-images/', 'testimonial');
        $testimonial->status      = $request->status;
        $testimonial->save();
        return back()->with('message', 'Testimonial Created Successfully.');
    }

    public function testimonialManage()
    {
        return view('admin.web.testimonial.testimonial-manage', [
            'testimonials' => Testimonial::latest()->get()
        ]);
    }
    public function testimonialEdit($id)
    {
        return view('admin.web.testimonial.testimonial-edit', ['testimonial' => Testimonial::find($id)]);
    }

    public function testimonialUpdate(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->name        = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->feedback     = $request->feedback;
        $testimonial->status      = $request->status;

        if ($request->image) {
            if (file_exists($testimonial->image)) {
                unlink($testimonial->image);
            }
            $imageUrl = imageUpload($request->image, 'upload-image/testimonial-images/', 'testimonial');
            $testimonial->image = $imageUrl;
        }
        $testimonial->save();
        return to_route('testimonial.manage')->with('message', 'Testimonial Updated Successfully.');
    }
    public function testimonialDelete(Request $request)
    {
        $testimonial = Testimonial::find($request->testimonial_id);
        if ($request->file('image')) {
            if (file_exists($testimonial->image)) {
                unlink($testimonial->image);
            }
        }
        $testimonial->delete();
        return redirect('testimonial-manage')->with('message', 'Testimonial Deleted Successfully.');
    }
}
