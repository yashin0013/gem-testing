<?php

namespace App\Http\Controllers;

use App\Models\Gem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;
// use Intervention\Image\Typography\FontFactory;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Spipu\Html2Pdf\Html2Pdf;
use App\Imports\GemsImport;
use Maatwebsite\Excel\Facades\Excel;

class GemController extends Controller
{
    function index()
    {
        $data['gems'] = Gem::orderBy('id', 'desc')->paginate(5);
        return view('admin/gems', $data);
    }

    public function show($id){
        $data['gem'] = Gem::find($id);

         $pdf = Pdf::loadView('admin.card2', $data);
         return $pdf->stream('invoice.pdf');

        // $pdf = PDF::loadView('admin.card2',$data);
        // return $pdf->stream('itsolutionstuff.pdf');

        // $html = View::make('admin.card2',$data)->render();

        // $html2pdf = new Html2Pdf();
        // $html2pdf->writeHTML($html);
        // $html2pdf->output('sample.pdf');

        // $data['gem'] = Gem::find($id);
        // return view('admin.card', $data);
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
            $destinationPath = 'images/gems';
            $gemImage = time(). "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gemImage);
            $gem->image = $gemImage;

        }
        $gem->save();
        $request->session()->flash('success', 'New Gem has been added successfully');
        return redirect('admin/gems');
    }

    public function edit($id){
        $data['gem'] = Gem::find($id);
        return view('admin.edit_gem', $data);
    }

    public function update(Request $request) {
        $request->validate([
            'report_number' => 'required',
            'id' => 'required',
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

        $gem = Gem::find($request->id);
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
            $destinationPath = 'images/gems';
            $gemImage = time(). "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gemImage);
            $gem->image = $gemImage;

        }
        $gem->save();
        $request->session()->flash('success', 'Gem has been updated successfully');
        return redirect('admin/gems');

    }

    public function delete(Request $request, $id)
    {
        $gem = Gem::find($id);
        $gem->delete();
        $request->session()->flash('success', 'Gem has been deleted successfully');
        return redirect('admin/gems');
    }

    public function import_page(){
        return view('admin/import');
    }

    public function import()
    {
        Excel::import(new GemsImport,request()->file('file'));
        return back();
    }
}
