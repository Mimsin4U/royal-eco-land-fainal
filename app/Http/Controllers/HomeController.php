<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\Faq;
use App\Models\GalleryImage;
use App\Models\HeroContent;
use App\Models\Slider;
use App\Models\Plot;
use App\Models\PlotCategory;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $company = CompanyInfo::first();
        $teamMembers = TeamMember::where('status',1)->get();
        $testimonials = Testimonial::where('status',1)->get();
        $faqs = Faq::where('status',1)->get();
        $heroContent = HeroContent::first();
        $plots = Plot::where('status',1)->take(20)->get();
        $plotCategories = PlotCategory::where('status',1)->get();
        $sliders = Slider::where('status', 1)->select('id', 'title_one', 'title_two', 'image')->get();
        return view('frontEnd.home.home', compact('company', 'sliders', 'plots', 'plotCategories', 'heroContent','teamMembers','testimonials','faqs'));
    }

    public function downloadForm()
    {
        return view('frontEnd.form.index');
    }

    public function about()
    {
        $company = CompanyInfo::first();
        $teamMembers = TeamMember::where('status', 1)->get();
        return view('frontEnd.about.about', compact('company', 'teamMembers'));
    }
    public function categoryDetailsView()
    {
        $company = CompanyInfo::first();
        return view('frontEnd.category-details.index', compact('company'));
    }
    
    public function plotCategory()
    {
        $company = CompanyInfo::first();
        $plotCategories = PlotCategory::where('status', 1)->take(10)->get();
        return view('frontEnd.plot.plot-category', compact('company', 'plotCategories'));
    }

    public function plotCategoryDetails($id)
    {
        $company = CompanyInfo::first();
        $plotCategory = PlotCategory::find($id);
        return view('frontEnd.plot-category-details.index', compact('company', 'plotCategory'));
    }

    public function gallery()
    {
        $company = CompanyInfo::first();
        $galleries = [
            '1' => GalleryImage::where('category',1)->get(),
            '2' => GalleryImage::where('category',2)->get(),
            '3' => GalleryImage::where('category',3)->get(),
            '4' => GalleryImage::where('category',4)->get(),
            '5' => GalleryImage::where('category',5)->get(),
        ];
        return view('frontEnd.gallery.gallery', compact('company','galleries'));
    }
    public function siteMap()
    {
        $company = CompanyInfo::first();
        return view('frontEnd.sitemap.site-map', compact('company'));
    }
    public function contactUs()
    {
        $company = CompanyInfo::first();
        return view('frontEnd.contact.contact', compact('company'));
    }
    public function userSignUp()
    {
        return view('frontEnd.login.user-sign-up');
    }

    public function userSignIn()
    {
        return view('frontEnd.login.user-sign-in');
    }
}
