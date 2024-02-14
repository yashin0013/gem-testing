<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Gem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function getreport(Request $request) {
        $request->validate([
            'rid'=>'required|exists:gems,report_number',
        ],[
            'rid.required' => 'Please Enter Report Number',
            'rid.exists' => 'Please Enter Valid Report Number',
        ]);
        $data['gem'] = Gem::where('report_number',$request->rid)->first();
        return view('gem.details',$data);
        // return response()->json(['success' => $gem]);
    }

    public function contact(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone' => 'required|digits:10',
            'subject' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return response()->json(['success' => 'Form details submitted successfully.']);
    }
}
