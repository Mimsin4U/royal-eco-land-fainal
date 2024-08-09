<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function index()
    {
        $company = CompanyInfo::first();
        if ($company) {
            return view('admin.web.company.company-edit',compact('company'));
        }
        return view('admin.web.company.company-info');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
        ], [
            'name.required'    => 'Company Name is required',
        ]);

        if (CompanyInfo::first()) {
            $company = CompanyInfo::first();

            $company->name      =  $request->name;
            $company->title     =  $request->title;
            $company->slogan    =  $request->slogan;
            $company->mission   =  $request->mission;
            $company->vission   =  $request->vission;
            $company->policy    =  $request->policy;
            $company->term      =  $request->term;
            $company->value     =  $request->value;
            $company->service   =  $request->service;
            $company->whyus     =  $request->whyus;
            $company->overview  =  $request->overview;

            if ($request->file('logo_jpg')) {
                if (file_exists($company->logo_jpg)) {
                    unlink($company->logo_jpg);
                    unlink($request->logo_jpg);
                }
                $logoJpgimaUrl = $this->getLogoJpgUrl($request);
            } else {
                $logoJpgimaUrl = $company->logo_jpg;
            }

            if ($request->file('logo_png')) {
                if (file_exists($company->logo_png)) {
                    unlink($company->logo_png);
                    unlink($request->logo_png);
                }
                $logoPngimaUrl = $this->getLogoPngUrl($request);
            } else {
                $logoPngimaUrl = $company->logo_png;
            }

            if ($request->file('favicon')) {
                if (file_exists($company->favicon)) {
                    unlink($company->favicon);
                    unlink($request->favicon);
                }
                $logoFaviconimaUrl = $this->getFaviconUrl($request);
            } else {
                $logoFaviconimaUrl = $company->favicon;
            }

            if ($request->file('profile')) {
                if (file_exists($company->profile)) {
                    unlink($company->profile);
                }
                $profileUrl = $this->getCompProfile($request);
            } else {
                $profileUrl = $company->profile;
            }

            if ($request->file('trade_license')) {
                if (file_exists($company->trade_license)) {
                    unlink($company->trade_license);
                }
                $trade_licenseUrl = $this->getComTradeLisence($request);
            } else {
                $trade_licenseUrl = $company->trade_license;
            }
            $company->logo_jpg            =  $logoJpgimaUrl;
            $company->logo_png            =  $logoPngimaUrl;
            $company->favicon             =  $logoFaviconimaUrl;
            $company->profile             =   $profileUrl;
            $company->trade_license       =  $trade_licenseUrl;
            $company->contact_number_one  =  $request->contact_number_one;
            $company->contact_number_two  =  $request->contact_number_two;
            $company->address_one         =  $request->address_one;
            $company->address_two         =  $request->address_two;
            $company->fb_link             =  $request->fb_link;
            $company->linkedin_link       =  $request->linkedin_link;
            $company->youtube_link        =    $request->youtube_link;
            $company->whatsapp            =  $request->whatsapp;
            $company->save();
        } else {
            $company = new CompanyInfo;
            $company->name      =  $request->name;
            $company->title     =  $request->title;
            $company->slogan    =  $request->slogan;
            $company->mission   =  $request->mission;
            $company->vission   =  $request->vission;
            $company->policy    =  $request->policy;
            $company->term      =  $request->term;
            $company->value     =  $request->value;
            $company->service   =  $request->service;
            $company->whyus     =  $request->whyus;
            $company->overview  =  $request->overview;
            if ($request->file('logo_jpg')) {
                $logoJpgimaUrl  = $this->getLogoJpgUrl($request);
            } else {
                $logoJpgimaUrl = '';
            }
            if ($request->file('logo_png')) {
                $logoPngimaUrl  = $this->getLogoPngUrl($request);
            } else {
                $logoPngimaUrl = '';
            }
            if ($request->file('favicon')) {
                $logoFaviconimaUrl  = $this->getFaviconUrl($request);
            } else {
                $logoFaviconimaUrl = '';
            }

            if ($request->file('profile')) {
                $profileUrl   =  $this->getCompProfile($request);
            } else {
                $profileUrl = '';
            }
            if ($request->file('trade_license')) {
                $trade_licenseUrl  =  $this->getComTradeLisence($request);
            } else {
                $trade_licenseUrl = '';
            }
            $company->logo_jpg            =  $logoJpgimaUrl;
            $company->logo_png            =  $logoPngimaUrl;
            $company->favicon             =  $logoFaviconimaUrl;
            $company->profile             =  $profileUrl;
            $company->trade_license       =  $trade_licenseUrl;
            $company->contact_number_one  =  $request->contact_number_one;
            $company->contact_number_two  =  $request->contact_number_two;
            $company->address_one         =  $request->address_one;
            $company->address_two         =  $request->address_two;
            $company->fb_link             =  $request->fb_link;
            $company->linkedin_link       =  $request->linkedin_link;
            $company->youtube_link        =  $request->youtube_link;
            $company->whatsapp            =  $request->whatsapp;
            $company->save();
        }

        return redirect(route('company.index'))->with('message', 'Company Info Updated!');
    }

    public function getLogoJpgUrl($request)
    {
        $imageJpg = $request->file('logo_jpg');

        $imageJpgName = time() . 'jpg.' . $imageJpg->extension();
        $directoryJpg = 'upload-image/company-info/';
        $imageJpg->move($directoryJpg, $imageJpgName);
        return $directoryJpg . $imageJpgName;
    }

    public function getLogoPngUrl($request)
    {
        $imagePng = $request->file('logo_png');
        $imagePngName = time() . 'png.' . $imagePng->extension();
        $directory = 'upload-image/company-info/';
        $imagePng->move($directory, $imagePngName);
        return $directory . $imagePngName;
    }

    public function getFaviconUrl($request)
    {
        $image = $request->file('favicon');
        $imageName = time() . 'favicon.' . $image->extension();
        $directory = 'upload-image/company-info/';
        $image->move($directory, $imageName);
        return $directory . $imageName;
    }
    public function getCompProfile($request)
    {
        $image = $request->file('profile');
        $imageName = time() . 'compProfile.' . $image->getClientOriginalExtension();
        $directory = 'upload-image/company-info/';
        $image->move($directory, $imageName);
        return $directory . $imageName;
    }
    public function getComTradeLisence($request)
    {
        $image = $request->file('trade_license');
        $imageName = time() . 'compTradeLisence.' . $image->getClientOriginalExtension();
        $directory = 'upload-image/company-info/';
        $image->move($directory, $imageName);
        return $directory . $imageName;
    }


    public function companyInfoEdit()
    {
        return view('admin.web.company.company-edit', ['company' => CompanyInfo::all()]);
    }
}
