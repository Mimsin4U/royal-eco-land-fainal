<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClientSubscription;
use Illuminate\Http\Request;

class ClientSubscriptionController extends Controller
{
    public function index(){
        $subscriptions = ClientSubscription::all();
        return view('');
    }

    public function store(Request $r){
        $r->validate([
            'email' => 'string'
        ]);
        $subscription = new ClientSubscription();
        $subscription->email = $r->email;
        $subscription->save();
        return back()->with('msg','Subscribed To our Newslater');
    }
}
