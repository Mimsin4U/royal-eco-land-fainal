<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HeroContent;
use Illuminate\Http\Request;

class HeroContentController extends Controller
{
    public function heroEdit()
    {
        $hero = HeroContent::firstOrCreate();
        return view('admin.web.hero.hero-edit', compact('hero'));
    }

    public function heroUpdate(Request $request)
    {
        $hero = HeroContent::first();
        $hero->title = $request->title;
        $hero->desc = $request->desc;

        if ($request->file('vedio')) {
            if (file_exists($hero->vedio)) {
                unlink($hero->vedio);
            }
            $vedioUrl = imageUpload($request->vedio, 'upload-vedio/hero-vedio/', 'hero-vedio');
        }
        $hero->vedio = $vedioUrl;
        $hero->save();

        return back()->with('message', 'HeroContent Updated Successfully!');
    }


}
