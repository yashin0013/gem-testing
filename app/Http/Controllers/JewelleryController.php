<?php

namespace App\Http\Controllers;

use App\Models\Jewellery;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class JewelleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jewellery::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('description', function ($row) {
                    return '<p class="com-para">' . $row->description . '</p>';
                })
                ->addColumn('image', function ($row) {
                    return '<img
                        src="/images/gems/' . $row->image . '"
                        class="img-fluid"
                        alt=""
                    />';
                })
                ->addColumn('action', function ($row) {
                    $btn =  '<div class="d-flex align-items-center justify-content-center" >
                        <a href="/admin/jewellery/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/jewellery/' . $row->id . '/delete" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>

                    </div>';

                    return $btn;
                })

                ->rawColumns(['action', 'image', 'description'])
                ->make(true);
        }

        return view('admin/jewellery/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jewellery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'report_number' => 'required|unique:jewellery',
            'name' => 'required',
            'gross_wt' => 'required',
            'gold_wt' => 'required',
            'dia_wt' => 'required',
            'shape_cut' => 'required',
            'clarity' => 'required',
            'color' => 'required',
            'finish' => 'required',
            'image' => 'required',
            'description' => 'required',
        ], [
            'report_number.required' => 'Report number is required.',
            'report_number.unique' => 'Name is required.',
            'name.required' => 'Report number is required.',
            'gross_wt.required' => 'Gross weight is required.',
            'gold_wt.required' => 'Gold weight is required.',
            'dia_wt.required' => 'Diamond weight is required.',
            'shape_cut.required' => 'Shape cut is required.',
            'clarity.required' => 'Clarity is required.',
            'color.required' => 'Color is required.',
            'finish.required' => 'Finish is required.',
            'description.required' => 'Description is required.',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/gems';
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = null; // If no image uploaded, set imageName to null or handle it as per your application logic
        }

        // Create a new record in the database
        Jewellery::create([
            'report_number' => $request->report_number,
            'name' => $request->name,
            'type' => 3,
            'gross_wt' => $request->gross_wt,
            'gold_wt' => $request->gold_wt,
            'dia_wt' => $request->dia_wt,
            'shape_cut' => $request->shape_cut,
            'clarity' => $request->clarity,
            'color' => $request->color,
            'finish' => $request->finish,
            'fluoresc' => $request->fluoresc,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect()->route('jewellery.index')->with('success', 'Jewellery record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jewellery $jewellery)
    {
        return view('admin.jewellery.edit', compact('jewellery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jewellery $jewellery)
    {
        $validatedData = $request->validate([
            'report_number' => [
                'required',
                Rule::unique('jewellery')->ignore($jewellery->id),
            ],
            'name' => 'required',
            'gross_wt' => 'required',
            'gold_wt' => 'required',
            'dia_wt' => 'required',
            'shape_cut' => 'required',
            'clarity' => 'required',
            'color' => 'required',
            'finish' => 'required',
            'description' => 'required',
        ], [
            'report_number.required' => 'Report number is required.',
            'report_number.unique' => 'Report number must be unique.',
            'name.required' => 'Name is required.',
            'gross_wt.required' => 'Gross weight is required.',
            'gold_wt.required' => 'Gold weight is required.',
            'dia_wt.required' => 'Diamond weight is required.',
            'shape_cut.required' => 'Shape cut is required.',
            'clarity.required' => 'Clarity is required.',
            'color.required' => 'Color is required.',
            'finish.required' => 'Finish is required.',
            'description.required' => 'Description is required.',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2MB
            ]);

            // Delete old image if exists
            // if ($jewellery->image) {
            //     Storage::delete('images/gems/' . $jewellery->image);
            // }

            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/gems';
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = $jewellery->image; // If no image uploaded, set imageName to null or handle it as per your application logic
        }

        $jewellery->update([
            'report_number' => $request->report_number,
            'name' => $request->name,
            'type' => 3,
            'gross_wt' => $request->gross_wt,
            'gold_wt' => $request->gold_wt,
            'dia_wt' => $request->dia_wt,
            'shape_cut' => $request->shape_cut,
            'clarity' => $request->clarity,
            'color' => $request->color,
            'finish' => $request->finish,
            'fluoresc' => $request->fluoresc,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect()->route('jewellery.index')->with('success', 'Jewellery record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Jewellery $jewellery)
    {
        $jewellery->delete();
        return redirect()->route('jewellery.index')->with('success', 'Jewellery deleted successfully!');
    }
}
