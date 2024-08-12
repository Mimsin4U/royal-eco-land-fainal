<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\JointDirector;
use App\Models\SeniorManeger;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeniorManegerController extends Controller
{
    public function index()
    {
        $directors = Director::where('status', 1)->select('id', 'name')->get();

        if (Str::startsWith(auth()->user()->code, 'D')) {
            $jointDirectors = JointDirector::where(['director_id' => Director::where('code', auth()->user()->code)->first('id')->id, 'status' => 1])->get();
            $seniorManegers = SeniorManeger::where(['director_id' => Director::where('code', auth()->user()->code)->first('id')->id])->get();
        }elseif(Str::startsWith(auth()->user()->code, 'JD')){
            $directors      = Director::where(['id'=> JointDirector::where('code', auth()->user()->code)->first()->director_id])->select('name')->get();
            $jointDirectors = JointDirector::where(['code' => auth()->user()->code, 'status' => 1])->get();
            $seniorManegers = SeniorManeger::where(['joint_director_id' => JointDirector::where('code', auth()->user()->code)->first('id')->id])->get();
        }else {
            $jointDirectors = JointDirector::where('status', 1)->get();
            $seniorManegers = SeniorManeger::all();
        }

        return view('admin.sm.index', compact('seniorManegers', 'directors', 'jointDirectors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | unique:users,email',
            'mobile' => 'required | unique:users,mobile',
        ]);
        
        $lastSeniorManeger = SeniorManeger::orderBy('id', 'desc')->first();
        if ($lastSeniorManeger) {
            $code = 'SM' . $lastSeniorManeger->id + 1;
        } else {
            $code = 'SM1';
        }
        $seniorManeger = new SeniorManeger();

        $seniorManeger->name = $request->name;

        if ($request->director_id) {
            $seniorManeger->director_id = $request->director_id;
        } elseif(Str::startsWith(auth()->user()->code, 'D')){
            $seniorManeger->director_id = Director::where('code', auth()->user()->code)->first()->id;
        }elseif(Str::startsWith(auth()->user()->code, 'JD')){
            $seniorManeger->director_id = JointDirector::where('code', auth()->user()->code)->first()->director_id;
        }elseif(Str::startsWith(auth()->user()->code, 'SM')){
            $seniorManeger->director_id = SeniorManeger::where('code', auth()->user()->code)->first()->director_id;
        }

        if ($request->joint_director_id) {
            $seniorManeger->joint_director_id = $request->joint_director_id;
        }elseif(Str::startsWith(auth()->user()->code, 'JD')){
            $seniorManeger->joint_director_id = JointDirector::where('code', auth()->user()->code)->first()->id;
        }
        $seniorManeger->code = $code;
        $seniorManeger->email = $request->email;
        $seniorManeger->mobile = $request->mobile;
        $seniorManeger->image = "dummy/profile/dummy_person.jpg";
        $seniorManeger->save();
        return redirect(route('seniorManeger.manage'))->with('message', 'Senior Maneger Updated Successfully');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'email' => 'required | unique:users,email',
        ]);
        $seniorManeger = SeniorManeger::find($id);
        $seniorManeger->name = $request->name;
        $seniorManeger->director_id = $request->director_id;
        $seniorManeger->joint_director_id = $request->joint_director_id;
        $seniorManeger->email = $request->email;
        $seniorManeger->mobile = $request->mobile;
        $seniorManeger->status = $request->status;
        $seniorManeger->save();
        return redirect(route('seniorManeger.manage'))->with('message', 'Senior Maneger Created Successfully');
    }

    public function smByjointDirector()
    {
        $seniorManeger = SeniorManeger::where(['joint_director_id' => $_GET['jdid'], 'status' => 1])->get(['id', 'name', 'code']);
        return response()->json($seniorManeger, 200);
    }

    public function delete(Request $request)
    {
        SeniorManeger::find($request->id)->delete();
        return redirect(route('seniorManeger.manage'))->with('message', 'Senior Maneger Deleted Successfully');
    }
}
