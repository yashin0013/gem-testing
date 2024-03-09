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
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class GemController extends Controller
{
    function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Gem::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('comments', function ($row) {
                        return '<p class="com-para">'.$row->comments.'</p>';
                    })
                    ->addColumn('image', function ($row) {
                       return '<img
                        src="/images/gems/'.$row->image.'"
                        class="img-fluid"
                        alt=""
                    />';

                    })
                    ->addColumn('action', function($row){
                        $btn=  '<div class="d-flex align-items-center justify-content-center" >
                        <a href="/admin/gems/'.$row->id.'/edit" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/gems/'.$row->id.'/delete" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>';
    
                            return $btn;
                    })
                    ->rawColumns(['action','image','comments'])
                    
                    ->make(true);
        }

        return view('admin.gems.index');
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
        return view('admin.gems.create');
    }

    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'report_number' => 'required|unique:gems,report_number',
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

        return redirect()->route('gems.index')->with('success', 'Gem Stone created successfully!');
    }

    public function edit($id){
        $data['gem'] = Gem::find($id);
        return view('admin.gems.edit', $data);
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
        return redirect()->route('gems.index')->with('success', 'Gem Stone updated successfully!');

    }

    public function delete(Gem $gem)
    {
        $gem->delete();
        return redirect()->route('gems.index')->with('success', 'Gem Stone deleted successfully!');
    }

    public function import_page(){
        return view('admin/import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv',
        ]);

        $import = new GemsImport();
        Excel::import($import, $request->file('file'));
    
        $validationErrors = $import->getValidationErrors();
    
        if (!empty($validationErrors)) {
            return redirect()->back()->with('validationErrors', $validationErrors);
        }

        return redirect()->route('gems.index')->with('success', 'Gem Stone imported successfully!');

    }

    public function download()
    {
        // File path
        $filePath = public_path('assets/sample/sample.csv');

        // Check if the file exists
        if (file_exists($filePath)) {
            // Set headers for force download
            $headers = [
                'Content-Type' => 'application/csv',
                'Content-Disposition' => 'attachment; filename="' . basename($filePath) . '"',
            ];

            // Return the file as response
            return response()->download($filePath, basename($filePath), $headers);
        } else {
            abort(404);
        }
    }
}
