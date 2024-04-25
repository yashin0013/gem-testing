<?php

namespace App\Http\Controllers;

use App\Exports\DiamondsExport;
use App\Exports\GemsExport;
use App\Exports\JewelleryExport;
use App\Exports\RudrakshaExport;
use App\Imports\DiamondsImport;
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
use App\Imports\JewelleryImport;
use App\Imports\RudrakshaImport;
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
                    return '<p class="com-para">' . $row->comments . '</p>';
                })
                ->addColumn('image', function ($row) {
                    return '<img
                        src="/images/gems/' . $row->image . '"
                        class="img-fluid"
                        alt=""
                    />';
                })
                ->addColumn('view', function ($row) {
                    $btn =  '<a href="/admin/gems/'.$row->id.'" class="btn btn-sm btn-warning mr-1" target="_blank">
                            <i class="fas fa-eye"></i>
                            </a>';
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn =  '<div class="d-flex align-items-center justify-content-center" >
                        <a href="/admin/gems/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/gems/' . $row->id . '/delete" onclick="return confirm(\'Are you sure you want to delete this item?\');" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>';

                    return $btn;
                })
                ->rawColumns(['action', 'image', 'comments','view'])
                ->make(true);
        }

        return view('admin.gems.index');
    }

    public function show(Gem $gem)
    {
        $customPaper = [0, 0, 400, 590];
        $pdf = PDF::loadView('admin.card',compact('gem'))
                    ->setPaper($customPaper, 'landscape');
        return $pdf->stream('gem-card.pdf');
        // return $pdf->stream('itsolutionstuff.pdf');
        return view('admin.card', compact('gem'));
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
            'name' => 'required',
            'weight' => 'required',
            'dimension' => 'required',
            'color' => 'required',
            'shape_cut' => 'required',
            'optic_char' => 'required',
            'refractive_index' => 'required',
            'specific_gravity' => 'required',
            'microscope_view' => 'required',
            'species' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gem = new Gem();
        $gem->report_number = $request->report_number;
        $gem->name = $request->name;
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
            $gemImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gemImage);
            $gem->image = $gemImage;
        }
        $gem->save();

        return redirect()->route('gems.index')->with('success', 'Gem Stone created successfully!');
    }

    public function edit(Gem $gem)
    {
        // $data['gem'] = Gem::find($id);
        return view('admin.gems.edit', compact('gem'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'report_number' => 'required',
            'name' => 'required',
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
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gem = Gem::find($request->id);
        $gem->report_number = $request->report_number;
        $gem->name = $request->name;
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
            $gemImage = time() . "." . $image->getClientOriginalExtension();
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

    public function import_page($type)
    {
        $arr = ['gems', 'diamonds', 'jewellery', 'rudraksha'];

        if (in_array($type, $arr)) {
            return view('admin/import', compact('type'));
        }

        return redirect()->route('dashboard')->with('error', 'Page Not Found');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv',
            'type' => 'required'
        ]);

        switch ($request->type) {
            case 'gems':
                $import = new GemsImport();
                break;
            case 'diamonds':
                $import = new DiamondsImport();
                break;
            case 'jewellery':
                $import = new JewelleryImport();
                break;
            case 'rudraksha':
                $import = new RudrakshaImport();
                break;
                default:
            return redirect()->back()->with('error', "Invalid Type");

        }

        Excel::import($import, $request->file('file'));

        $validationErrors = $import->getValidationErrors();

        if (!empty($validationErrors)) {
            return redirect()->back()->with('validationErrors', $validationErrors);
        }

        return redirect()->route($request->type.'.index')->with('success', $request->type.' imported successfully!');
    }

    public function download_excel($type)
    {
        switch ($type) {
            case 'gems':
                $export = new GemsExport();
                break;
            case 'diamonds':
                $export = new DiamondsExport();
                break;
            case 'jewellery':
                $export = new JewelleryExport();
                break;
            case 'rudraksha':
                $export = new RudrakshaExport();
                break;
                default:
            return redirect()->back()->with('error', "Invalid Type");
        }

        return Excel::download($export, $type.'-sample.xlsx');

    }
}
