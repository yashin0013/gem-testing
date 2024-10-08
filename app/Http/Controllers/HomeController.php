<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Diamond;
use App\Models\Gem;
use App\Models\Jewellery;
use App\Models\Report;
use App\Models\Rudraksha;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getreport(Request $request)
    {
       $test = $request->validate([
            'rid' => 'required'
        ],[
            'rid.required' => "Report number is a required field. Please enter the report number to proceed."
        ]);

        $data = Report::where('number', $request->rid)->first();
        if (empty($data)) {
            return response()->json(['message' => 'Apologies, no matching report was found in our records.','error' => 1]);
        }
        // $results = getProductIdAndType($request->rid);

        // if ($results) {
        //     if ($results->type == 1) {
        //         $data = Gem::select(
        //             'report_number',
        //             'name',
        //             'weight',
        //             'dimension',
        //             'color',
        //             'shape_cut',
        //             'optic_char',
        //             'refractive_index',
        //             'specific_gravity',
        //             'microscope_view',
        //             'species',
        //             'comments',
        //             'image'
        //         )->find($results->id)->getAttributes();
        //     } elseif ($results->type == 2) {
        //         $data = Diamond::select(
        //             'report_number',
        //             'name',
        //             'description',
        //             'shape_cut',
        //             'dimension',
        //             'weight',
        //             'clarity_grade',
        //             'color_grade',
        //             'cut_prop',
        //             'finish',
        //             'fluoresc',
        //             'image',
        //             'comments',
        //         )->find($results->id)->getAttributes();
        //     } elseif ($results->type == 3) {
        //         $data = Jewellery::select(
        //             'report_number',
        //             'name',
        //             'gross_wt',
        //             'gold_wt',
        //             'dia_wt',
        //             'shape_cut',
        //             'clarity',
        //             'color',
        //             'finish',
        //             'image',
        //             'description',
        //         )
        //             ->find($results->id)->getAttributes();
        //     } elseif ($results->type == 4) {
        //         $data = Rudraksha::select(
        //             'report_number',
        //             'name',
        //             'weight',
        //             'dimension',
        //             'color',
        //             'shape',
        //             'natural_face',
        //             'artificial_face',
        //             'test',
        //             'origin',
        //             'image',
        //             'comments',
        //         )
        //             ->find($results->id)->getAttributes();
        //     } else {
        //         return response()->json(['message' => 'Apologies, no matching report was found in our records.','error' => 1]);
        //     }
        // } else {
        //     return response()->json(['message' => 'Apologies, no matching report was found in our records.','error' => 1]);
        // }

        return view('modal.details', compact('data'));

        // return response()->json(['success' => $gem]);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
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
