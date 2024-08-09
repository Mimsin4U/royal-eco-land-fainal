<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JointDirector;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JointDirectorController extends Controller
{
    public function index()
    {
        if (Str::startsWith(auth()->user()->code, 'D')) {
            $jointDirectors = JointDirector::where(['director_id' => Director::where('code', auth()->user()->code)->first('id')->id])->get();
        }else {
            $jointDirectors = JointDirector::all();
        }
        $directors = Director::where('status',1)->get();
        return view('admin.joint-director.index', compact('jointDirectors', 'directors'));
    }

    public function store(Request $request)
    {
        $lastJointDirector = JointDirector::orderBy('id', 'desc')->first();
        if ($lastJointDirector) {
            $code = 'JD' . $lastJointDirector->id + 1;
        } else {
            $code = 'JD1';
        }
        $jointDirector = new JointDirector();
        $jointDirector->name = $request->name;
        if ($request->director_id) {
            $jointDirector->director_id = $request->director_id;
        }else{
            $jointDirector->director_id = Director::where('code',Auth::user()->code)->first()->id;
        }
        $jointDirector->code = $code;
        $jointDirector->email = $request->email;
        $jointDirector->mobile = $request->mobile;
        $jointDirector->image = "dummy/profile/dummy_person.jpg";
        
        $jointDirector->save();
        return redirect(route('jointDirector.manage'))->with('message', 'JointDirector Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $jointDirector = JointDirector::find($id);
        $jointDirector->name = $request->name;
        $jointDirector->director_id = $request->director_id;
        $jointDirector->email = $request->email;
        $jointDirector->mobile = $request->mobile;
        $jointDirector->status = $request->status;
        $jointDirector->save();
        return redirect(route('jointDirector.manage'))->with('message', 'JointDirector Updated Successfully');
    }

    public function delete(Request $request)
    {
        JointDirector::find($request->id)->delete();
        return redirect(route('jointDirector.manage'))->with('message', 'Joint Director Deleted Successfully');
    }

    public function jointDirectorsByDirector(){
        $jointDirectors = JointDirector::where(['director_id' => $_GET['did'], 'status' => 1])->get(['id', 'name', 'code']);
        return response()->json($jointDirectors,200);
    }
    

}
