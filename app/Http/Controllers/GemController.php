<?php

namespace App\Http\Controllers;

use App\Models\Gem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GemController extends Controller
{
    function index() {
        $data['gems'] = Gem::paginate(10);
        return view('admin/gems',$data);
    }

    public function create()
    {
        return view('admin/add_gem');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request...

        $request->validate([
            'report_number'=>'required',
            'weight'=>'required',
            'dimension'=>'required',
            'color'=>'required',
            'shape_cut'=>'required',
            'optic_char'=>'required',
            'refractive_index'=>'required',
            'specific_gravity'=>'required',
            'microscope_view'=>'required',
            'species'=>'required',
        ]);
 
        $gem = new Gem();
        $gem->report_number = $request->report_number;
        $gem->weight = $request->weight;
        $gem->dimension = $request->dimension;
        $gem->color = $request->color;
        $gem->shape_cut = $request->shape_cut;
        $gem->optic_char = $request->optic_char;
        $gem->refractive_index =$request->refractive_index;
        $gem->specific_gravity = $request->specific_gravity;
        $gem->microscope_view = $request->microscope_view;
        $gem->species = $request->species;
        $gem->comments = $request->comments;
        if ($request->hasfile('image')) {
            $image=$request->file('image');
            // $image_name = $image->getClientOriginalName();
            // $ext = $image->getClientOriginalExtension();
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('public/gems', $image_name);
            $gem->image=$image_name;
        }
        $gem->save();
        $request->session()->flash('success','New Gem has been added successfully');
        return redirect('admin/gems');
    }

    public function delete(Request $request,$id) {
        $gem = Gem::find($id);
        $gem->delete();
        $request->session()->flash('success','Gem has been deleted successfully');
        return redirect('admin/gems');
    }

}
