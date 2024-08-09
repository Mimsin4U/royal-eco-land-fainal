<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssistantSalesManeger;
use App\Models\Director;
use App\Models\JointDirector;
use App\Models\SeniorManeger;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AssistantSalesManegerController extends Controller
{
    public function index()
    {
        $directors = Director::where('status', 1)->select('id', 'name')->get();

        if (Str::startsWith(auth()->user()->code, 'D')) {
            $jointDirectors = JointDirector::where(['director_id' => Director::where('code', auth()->user()->code)->first('id')->id, 'status' => 1])->get();
            $seniorManegers = SeniorManeger::where(['director_id' => Director::where('code', auth()->user()->code)->first('id')->id, 'status' => 1])->get();
            $assistantSalesManegers = AssistantSalesManeger::where(['director_id' => Director::where('code', auth()->user()->code)->first('id')->id])->get();;
        } elseif (Str::startsWith(auth()->user()->code, 'JD')) {
            $directors      = Director::where(['id' => JointDirector::where('code', auth()->user()->code)->first()->director_id])->select('name')->get();
            $jointDirectors = JointDirector::where(['code' => auth()->user()->code, 'status' => 1])->get('name');
            $seniorManegers = SeniorManeger::where(['joint_director_id' => JointDirector::where('code', auth()->user()->code)->first('id')->id, 'status' => 1])->get();
            $assistantSalesManegers = AssistantSalesManeger::where(['joint_director_id' => JointDirector::where('code', auth()->user()->code)->first('id')->id, 'status' => 1])->get();
        } elseif (Str::startsWith(auth()->user()->code, 'SM')) {
            $directors      = Director::where(['id' => SeniorManeger::where('code', auth()->user()->code)->first()->director_id])->get('name');
            $jointDirectors = JointDirector::where(['id' => SeniorManeger::where('code', auth()->user()->code)->first()->joint_director_id])->get();
            $seniorManegers = SeniorManeger::where('code', auth()->user()->code)->get();
            $assistantSalesManegers = AssistantSalesManeger::where(['senior_maneger_id' => SeniorManeger::where('code', auth()->user()->code)->first()->id])->get();
        } else {
            $jointDirectors = JointDirector::where('status', 1)->get();
            $seniorManegers = SeniorManeger::where('status', 1)->get();
            $assistantSalesManegers = AssistantSalesManeger::all();
        }
        return view('admin.asm.index', compact('directors', 'jointDirectors', 'seniorManegers', 'assistantSalesManegers',));
    }

    public function store(Request $request)
    {
        $lastAssistantSalesManeger = AssistantSalesManeger::orderBy('id', 'desc')->first();
        if ($lastAssistantSalesManeger) {
            $code = 'ASM' . $lastAssistantSalesManeger->id + 1;
        } else {
            $code = 'ASM1';
        }
        $assistantSalesManeger = new AssistantSalesManeger();
        $assistantSalesManeger->name = $request->name;
        if ($request->director_id) {
            $assistantSalesManeger->director_id = $request->director_id;
        } elseif (Str::startsWith(auth()->user()->code, 'JD')) {
            $assistantSalesManeger->director_id = JointDirector::where('code', auth()->user()->code)->first()->director_id;
        } elseif (Str::startsWith(auth()->user()->code, 'SM')) {
            $assistantSalesManeger->director_id = SeniorManeger::where('code', auth()->user()->code)->first()->director_id;
        }

        if ($request->joint_director_id) {
            $assistantSalesManeger->joint_director_id = $request->joint_director_id;
        } elseif (Str::startsWith(auth()->user()->code, 'JD')) {
            $assistantSalesManeger->joint_director_id = JointDirector::where('code', auth()->user()->code)->first()->joint_director_id;
        } elseif (Str::startsWith(auth()->user()->code, 'SM')) {
            $assistantSalesManeger->joint_director_id = SeniorManeger::where('code', auth()->user()->code)->first()->joint_director_id;
        }

        if ($request->senior_maneger_id) {
            $assistantSalesManeger->senior_maneger_id = $request->senior_maneger_id;
        } elseif (Str::startsWith(auth()->user()->code, 'SM')) {
            $assistantSalesManeger->senior_maneger_id = SeniorManeger::where('code', auth()->user()->code)->first()->id;
        }
        $assistantSalesManeger->code   = $code;
        $assistantSalesManeger->email  = $request->email;
        $assistantSalesManeger->mobile = $request->mobile;
        $assistantSalesManeger->image  = "dummy/profile/dummy_person.jpg";
        $assistantSalesManeger->save();
        return redirect(route('assistantSalesManeger.manage'))->with('message', 'Asistent Senior Maneger Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $assistantSalesManeger = AssistantSalesManeger::find($id);
        $assistantSalesManeger->name              = $request->name;
        $assistantSalesManeger->director_id       = $request->director_id;
        $assistantSalesManeger->joint_director_id = $request->joint_director_id;
        $assistantSalesManeger->senior_maneger_id = $request->senior_maneger_id;
        $assistantSalesManeger->email             = $request->email;
        $assistantSalesManeger->mobile            = $request->mobile;
        $assistantSalesManeger->status            = $request->status;
        $assistantSalesManeger->image             = "dummy/profile/dummy_person.jpg";
        $assistantSalesManeger->save();
        return redirect(route('assistantSalesManeger.manage'))->with('message', 'Asistent Senior Maneger Updated Successfully');
    }

    public function delete(Request $request)
    {
        AssistantSalesManeger::find($request->id)->delete();
        return redirect(route('assistantSalesManeger.manage'))->with('message', 'Asistent Senior Maneger Deleted Successfully');
    }
}
