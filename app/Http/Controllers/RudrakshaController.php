<?php

namespace App\Http\Controllers;

use App\Models\Rudraksha;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class RudrakshaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Rudraksha::select('*');
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
                ->addColumn('action', function ($row) {
                    $btn =  '<div class="d-flex align-items-center justify-content-center" >
                        <a href="/admin/rudraksha/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/rudraksha/' . $row->id . '/delete" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        
                    </div>';

                    return $btn;
                })

                ->rawColumns(['action', 'image', 'comments'])
                ->make(true);
        }

        return view('admin/rudraksha/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rudraksha.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'report_number' => 'required|unique:rudraksha',
            'weight' => 'required',
            'dimension' => 'required',
            'color' => 'required',
            'shape' => 'required',
            'natural_face' => 'required',
            'artificial_face' => 'required',
            'test' => 'required',
            'origin' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'comments' => 'required',
        ], [
            'report_number.required' => 'The report number field is required.',
            'report_number.unique' => 'The report number has already been taken.',
            'weight.required' => 'The weight field is required.',
            'dimension.required' => 'The dimension field is required.',
            'color.required' => 'The color field is required.',
            'shape.required' => 'The shape field is required.',
            'natural_face.required' => 'The natural face field is required.',
            'artificial_face.required' => 'The artificial face field is required.',
            'test.required' => 'The test field is required.',
            'origin.required' => 'The origin field is required.',
            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            'comments.required' => 'The comments field is required.',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/gems';
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = null; // If no image uploaded, set imageName to null or handle it as per your application logic
        }

        // Create new Rudraksha instance and save data
        Rudraksha::create([
            'report_number' => $request->report_number,
            'type' => 4,
            'weight' => $request->weight,
            'dimension' => $request->dimension,
            'color' => $request->color,
            'shape' => $request->shape,
            'natural_face' => $request->natural_face,
            'artificial_face' => $request->artificial_face,
            'test' => $request->test,
            'origin' => $request->origin,
            'image' => $imageName,
            'comments' => $request->comments,
        ]);

        return redirect()->route('rudraksha.index')->with('success', 'Rudraksha created successfully.');
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
    public function edit(Rudraksha $rudraksha)
    {
        return view('admin.rudraksha.edit', compact('rudraksha'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rudraksha $rudraksha)
    {
        $request->validate([
            'report_number' => [
                'required',
                Rule::unique('rudraksha')->ignore($rudraksha->id),
            ],
            'weight' => 'required',
            'dimension' => 'required',
            'color' => 'required',
            'shape' => 'required',
            'natural_face' => 'required',
            'artificial_face' => 'required',
            'test' => 'required',
            'origin' => 'required',
            'comments' => 'required',
        ], [
            'report_number.required' => 'The report number field is required.',
            'report_number.unique' => 'The report number has already been taken.',
            'weight.required' => 'The weight field is required.',
            'dimension.required' => 'The dimension field is required.',
            'color.required' => 'The color field is required.',
            'shape.required' => 'The shape field is required.',
            'natural_face.required' => 'The natural face field is required.',
            'artificial_face.required' => 'The artificial face field is required.',
            'test.required' => 'The test field is required.',
            'origin.required' => 'The origin field is required.',
            'comments.required' => 'The comments field is required.',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2MB
            ],[
                'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            ]);

            // Delete old image if exists
            // if ($jewellery->image) {
            //     Storage::delete('images/gems/' . $jewellery->image);
            // }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/gems';
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = $rudraksha->image; // If no image uploaded, set imageName to null or handle it as per your application logic
        }

         // Create new Rudraksha instance and save data
         $rudraksha->update([
            'report_number' => $request->report_number,
            'type' => 4,
            'weight' => $request->weight,
            'dimension' => $request->dimension,
            'color' => $request->color,
            'shape' => $request->shape,
            'natural_face' => $request->natural_face,
            'artificial_face' => $request->artificial_face,
            'test' => $request->test,
            'origin' => $request->origin,
            'image' => $imageName,
            'comments' => $request->comments,
        ]);

        return redirect()->route('rudraksha.index')->with('success', 'Rudraksha updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Rudraksha $rudraksha)
    {
        $rudraksha->delete();
        return redirect()->route('rudraksha.index')->with('success', 'Rudraksha deleted successfully!');
    }
}
