<?php

namespace App\Http\Controllers;

use App\Models\Gem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;
// use Intervention\Image\Typography\FontFactory;
// use PDF;

class GemController extends Controller
{
    function index()
    {
        $data['gems'] = Gem::latest()->paginate(5);
        return view('admin/gems', $data);
    }

    public function show($id){
        // $pdf = PDF::loadView('admin.test');
        // return $pdf->stream('itsolutionstuff.pdf');
        $data['gem'] = Gem::find($id);
        return view('admin.card', $data);
    }

    // public function image_edit()
    // {
    //     $manager = new ImageManager(Driver::class);
    //     // create test image
    //     $image = $manager->read('images/gti.jpg');


    //     // write text to image
    //     $image->text('This is the text', 350, 250, function (FontFactory $font) {
    //         $font->filename('assets/fonts/Ldfcomicsans-jj7l.ttf');
    //         $font->color('#373737');
    //         $font->size(35.5);
    //         $font->align('center');
    //         $font->valign('middle');
    //         $font->lineHeight(2.6);
    //         $font->angle(0);
    //     });
    //     $imageName = time().".png";
    //     $destinationPath = public_path('images/');

    //     $image->save($destinationPath.$imageName);

    //     return '<img src="/images/'.$imageName.'" alt="Girl in a jacket" width="800" height="600">';
    // }

    public function create()
    {
        return view('admin/add_gem');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request...

        $request->validate([
            'report_number' => 'required',
            'weight' => 'required',
            'dimension' => 'required',
            'color' => 'required',
            'shape_cut' => 'required',
            'optic_char' => 'required',
            'refractive_index' => 'required',
            'specific_gravity' => 'required',
            'microscope_view' => 'required',
            'species' => 'required',
        ]);

        $gem = new Gem();
        $gem->report_number = $request->report_number;
        $gem->weight = $request->weight;
        $gem->dimension = $request->dimension;
        $gem->color = $request->color;
        $gem->shape_cut = $request->shape_cut;
        $gem->optic_char = $request->optic_char;
        $gem->refractive_index = $request->refractive_index;
        $gem->specific_gravity = $request->specific_gravity;
        $gem->microscope_view = $request->microscope_view;
        $gem->species = $request->species;
        $gem->comments = $request->comments;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            // $image_name = $image->getClientOriginalName();
            // $ext = $image->getClientOriginalExtension();
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('public/gems', $image_name);
            $gem->image = $image_name;
        }
        $gem->save();
        $request->session()->flash('success', 'New Gem has been added successfully');
        return redirect('admin/gems');
    }

    public function delete(Request $request, $id)
    {
        $gem = Gem::find($id);
        $gem->delete();
        $request->session()->flash('success', 'Gem has been deleted successfully');
        return redirect('admin/gems');
    }
}
