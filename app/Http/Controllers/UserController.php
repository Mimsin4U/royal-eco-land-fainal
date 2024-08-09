<?php

namespace App\Http\Controllers;

use App\Models\AssistantSalesManeger;
use App\Models\Director;
use App\Models\JointDirector;
use App\Models\Role;
use App\Models\SeniorManeger;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    private $user, $userRoles;

    public function index()
    {
        $directorors = Director::where('status',1)->get(['name','code']);
        $jointDirectors = JointDirector::where('status',1)->get(['code','name']);
        $seniorManegers = SeniorManeger::where('status',1)->get(['code','name']);
        $asistentSeniorManegers = AssistantSalesManeger::where('status',1)->get(['code','name']);
        $roles = Role::all();
        return view('user.index', compact('roles', 'directorors', 'jointDirectors', 'seniorManegers', 'asistentSeniorManegers'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users,email'
        ]);

        $this->user = User::newUser($request);
        // foreach ($request->role as $selectedOption)
        // {
        //     $this->user->roles()->attach($selectedOption);
        // }
        return redirect('/user/add')->with('message', 'User info create successfully.');
    }

    public function manage()
    {
        return view('user.manage', ['users' => User::latest()->get()]);
    }

    public function edit($id)
    {
        return view('user.edit', ['roles' => Role::all(), 'user' => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->user = User::updateUser($request, $id);
        if ($request->role)
        {
            DB::table('user_role')->where('user_id', $id)->delete();
            foreach ($request->role as $selectedOption)
            {
                $this->user->roles()->attach($selectedOption);
            }
        }
        return redirect('/user/manage')->with('message', 'User info update successfully.');
    }

    public function delete($id)
    {
        User::deleteUser($id);
        DB::table('user_role')->where('user_id', $id)->delete();
        return redirect('/user/manage')->with('message', 'User info delete successfully.');
    }

    public function getTeamByCode()
    {
        $team = null;

        if ($d = Director::select('name','mobile','email')->firstWhere('code',$_GET['code'])){
            $team = $d;
        }elseif ($jd = JointDirector::select('name','mobile','email')->firstWhere('code',$_GET['code'])){
            $team = $jd;
        }elseif ($sm = SeniorManeger::select('name','mobile','email')->firstWhere('code',$_GET['code'])){
            $team = $sm ;
        }elseif ($asm = AssistantSalesManeger::select('name','mobile','email')->firstWhere('code',$_GET['code'])){
            $team = $asm ;
        }

        return response()->json($team);
    }
}
