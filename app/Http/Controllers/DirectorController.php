<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::all();
        return view('admin.director.index',compact('directors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | unique:users,email',
            'mobile' => 'required | unique:users,mobile',
        ]);
        
        $lastDirector = Director::orderBy('id', 'desc')->first();
        if($lastDirector)
        {
            $code = 'D'. $lastDirector->id+1;
        }
        else 
        {
            $code = 'D1';
        }
        $director = new Director();
        $director->name = $request->name;
        $director->code = $code;
        $director->image = "dummy/profile/dummy_person.jpg";
        $director->email = $request->email;
        $director->mobile = $request->mobile;
        $director->save();
        return redirect(route('director.manage'))->with('message', 'Director Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required | unique:users,email',
        ]);
        $director = Director::find($id);
        $director->name   = $request->name;
        $director->email  = $request->email;
        $director->mobile = $request->mobile;
        $director->status = $request->status;
        $director->save();
        return redirect(route('director.manage'))->with('message', 'Director Updated Successfully');
    }

    public function delete(Request $request){
        Director::find($request->id)->delete();
        return redirect(route('director.manage'))->with('message', 'Director Deleted Successfully');
    }
}
