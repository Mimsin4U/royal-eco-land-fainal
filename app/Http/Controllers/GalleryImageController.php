<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function galleryCreate(Request $request)
    {
        $gallery = new GalleryImage();
        $gallery->category = $request->category;
        $gallery->image    = imageUpload($request->image, 'upload-image/gallery-images/', 'gallery');
        $gallery->save();
        return back()->with('message', 'GalleryImage Created Successfully.');
    }

    public function galleryManage()
    {
        return view('admin.web.gallery.gallery-manage', [
            'galleries' => GalleryImage::latest()->get()
        ]);
    }
    public function galleryEdit($id)
    {
        return view('admin.web.gallery.gallery-edit', ['gallery' => GalleryImage::find($id)]);
    }

    public function galleryUpdate(Request $request, $id)
    {
        $gallery = GalleryImage::find($id);
        $gallery->category = $request->category;
        if ($request->file('image')) {
            if (file_exists($gallery->image)) {
                unlink($gallery->image);
            }
            $imageUrl = imageUpload($request->image, 'upload-image/gallery-images/', 'gallery');
            $gallery->image = $imageUrl;
        }
        $gallery->save();
        return to_route('gallery.manage')->with('message', 'GalleryImage Updated Successfully.');
    }
    public function galleryDelete(Request $request)
    {
        $gallery = GalleryImage::find($request->gallery_id);
        if ($request->file('image')) {
            if (file_exists($gallery->image)) {
                unlink($gallery->image);
            }
        }
        $gallery->delete();
        return redirect('gallery-manage')->with('message', 'GalleryImage Deleted Successfully.');
    }
}
