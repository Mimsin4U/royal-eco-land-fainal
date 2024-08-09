<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use App\Models\AssistantSalesManeger;
use App\Models\Director;
use App\Models\JointDirector;
use App\Models\SeniorManeger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitRequestController extends Controller
{
    public function clientVisits(Request $request)
    {
        $visitRequests = VisitRequest::where('assigned_to',Auth::user()->code)->get();
        return view('admin.client.visits',compact('visitRequests'));
    }

    public function clientVisitUpdate($id)
    {
        $visit = VisitRequest::find($id);
        $visit->status = 'Connected';
        $visit->save();
        return back()->with('message',"Client Is Connected To You, Please Fix A Meeting with $visit->name !");
    }

    public function clientVisitFeedback(Request $request, $id)
    {
        $visit = VisitRequest::find($id);
        $visit->feedback = $request->feedback;
        $visit->follow_date = $request->follow_date;
        $visit->status = 'Visited';
        $visit->save();
        return back()->with('message',"Feedback Given To Admin !");
    }

    public function index(Request $request)
    {
        $visitRequests = VisitRequest::all();
        $directorors = Director::where('status',1)->get(['name','code','mobile','email']);
        $jointDirectors = JointDirector::where('status',1)->get(['code','name','mobile','email']);
        $seniorManegers = SeniorManeger::where('status',1)->get(['code','name','mobile','email']);
        $assistantSalesManegers = AssistantSalesManeger::where('status',1)->get(['code','name','mobile','email']);
        return view('admin.web.visit-request.index',compact('visitRequests', 'directorors', 'jointDirectors', 'seniorManegers', 'assistantSalesManegers'));
    }
    public function visitRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'max:400'
        ]);
        $visitRequest = new VisitRequest();
        $visitRequest->category_name = $request->category_name;
        $visitRequest->name = $request->name;
        $visitRequest->email = $request->email;
        $visitRequest->mobile = $request->mobile;
        $visitRequest->adress = $request->adress;
        $visitRequest->message = $request->message;
        $visitRequest->save();
        return redirect()->back()->with('message', 'Request Sent ,Please Wait For our Response!');
    }
    
    public function edit($id)
    {
        
        return response()->json([
            'status' => 200,
            'visitRequest' => VisitRequest::find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        $visitRequest = VisitRequest::find($id);
        $visitRequest->status = 'Assigned';
        $visitRequest->assigned_to = $request->assigned_to;
        $visitRequest->visit_date = $request->visit_date;
        $visitRequest->save();
        return redirect()->back()->with('message', 'Request Assigned !');
    }

    public function confirm($id) {
        $visitRequest = VisitRequest::find($id,['id','name', 'email', 'mobile', 'category_name']);
        $visitRequest->status = 'Confirmed';
        $visitRequest->save();
        return back()->with('message','Order Confirmed!');
    }
    
    public function delete(Request $request)
    {
        VisitRequest::find($request->id)->delete();
        return redirect()->back()->with('message', 'Request Deleted !');
    }


}
