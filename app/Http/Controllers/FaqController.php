<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq()
    {
        return view('admin.web.faq.faq');
    }

    public function faqCreate(Request $request)
    {
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->status   = $request->status;
        $faq->save();
        return back()->with('message', 'Faq Created Successfully.');
    }

    public function faqManage()
    {
        return view('admin.web.faq.faq-manage', [
            'faqs' => Faq::latest()->get()
        ]);
    }
    public function faqEdit($id)
    {
        return view('admin.web.faq.faq-edit', ['faq' => Faq::find($id)]);
    }

    public function faqUpdate(Request $request, $id)
    {
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->status   = $request->status;
        $faq->save();
        return to_route('faq.manage')->with('message', 'Faq Updated Successfully.');
    }
    public function faqDelete(Request $request)
    {
        $faq = Faq::find($request->faq_id);
        $faq->delete();
        return redirect('faq-manage')->with('message', 'Faq Deleted Successfully.');
    }
}
