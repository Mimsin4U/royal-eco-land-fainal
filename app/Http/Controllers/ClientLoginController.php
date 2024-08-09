<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ClientLoginController extends Controller
{
    //no need
    // public function clientSignUpView()
    // {
    //     return view('admin.client.add');
    // }

    //no need
    // public function clientSignUp(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'email | unique:clients,email',
    //         'password' => 'required | min:6',
    //     ]);

    //     $client = Client::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     // Auth::guard('client')->login($client);

    //     return back()->with('message','Client Added Successfully!');
    // }

    public function clientSignInView()
    {
        return view('frontEnd.auth.client-signin');
    }

    public function clientSignIn(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('client')->attempt($request->only('email','password'))) {
            return to_route('client.dashboard');
        }
        
        return redirect()->back();
    }

    public function clientSignOut(Request $request)
    {
        Auth::guard('client')->logout();
        session()->invalidate();
        return to_route('home');
    }

}
