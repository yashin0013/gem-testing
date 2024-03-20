<?php

namespace App\Http\Controllers;

use App\Models\Diamond;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class DiamondController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Diamond::select('*');
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
                        <a href="/admin/diamonds/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/diamonds/' . $row->id . '/delete" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>

                    </div>';

                    return $btn;
                })

                ->rawColumns(['action', 'image', 'comments'])
                ->make(true);
        }

        return view('admin/diamond/index');
    }

    public function create()
    {
        return view('admin.diamond.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_number' => 'required|unique:gems,report_number',
            'name' => 'required',
            'description' => 'required',
            'shape_cut' => 'required',
            'dimension' => 'required',
            'weight' => 'required',
            'clarity_grade' => 'required',
            'color_grade' => 'required',
            'cut_prop' => 'required',
            'finish' => 'required',
            'fluoresc' => 'required',
            'image' => 'required',
            'comments' => 'required',
        ]);


        $diamond = new Diamond();
        $diamond->report_number = $request->report_number;
        $diamond->name = $request->name;
        $diamond->type = 2;
        $diamond->description = $request->description;
        $diamond->shape_cut = $request->shape_cut;
        $diamond->dimension = $request->dimension;
        $diamond->weight = $request->weight;
        $diamond->clarity_grade = $request->clarity_grade;
        $diamond->color_grade = $request->color_grade;
        $diamond->cut_prop = $request->cut_prop;
        $diamond->finish = $request->finish;
        $diamond->fluoresc = $request->fluoresc;
        $diamond->image = $request->image;
        $diamond->comments = $request->comments;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            // $image_name = $image->getClientOriginalName();
            // $ext = $image->getClientOriginalExtension();
            $destinationPath = 'images/gems';
            $gemImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gemImage);
            $diamond->image = $gemImage;
        }
        $diamond->save();
        return redirect()->route('diamonds.index')->with('success', 'Diamond record created successfully!');

    }

    public function show(Diamond $diamond)
    {
        return $diamond;
    }

    public function edit(Diamond $diamond) {
        return view('admin.diamond.edit', compact('diamond'));
    }

    public function update(Request $request, Diamond $diamond)
    {
        $request->validate([
            'report_number' => [
                'required',
                Rule::unique('diamonds')->ignore($diamond->id),
            ],
            'description' => 'required',
            'name' => 'required',
            'shape_cut' => 'required',
            'dimension' => 'required',
            'weight' => 'required',
            'clarity_grade' => 'required',
            'color_grade' => 'required',
            'cut_prop' => 'required',
            'finish' => 'required',
            'fluoresc' => 'required',
            'comments' => 'required',
        ]);

        $diamond->report_number = $request->report_number;
        $diamond->name = $request->name;
        $diamond->description = $request->description;
        $diamond->shape_cut = $request->shape_cut;
        $diamond->dimension = $request->dimension;
        $diamond->shape_cut = $request->shape_cut;
        $diamond->weight = $request->weight;
        $diamond->clarity_grade = $request->clarity_grade;
        $diamond->color_grade = $request->color_grade;
        $diamond->cut_prop = $request->cut_prop;
        $diamond->finish = $request->finish;
        $diamond->fluoresc = $request->fluoresc;
        $diamond->comments = $request->comments;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            // $image_name = $image->getClientOriginalName();
            // $ext = $image->getClientOriginalExtension();
            $destinationPath = 'images/gems';
            $gemImage = time(). "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gemImage);
            $diamond->image = $gemImage;
        }
        $diamond->save();
        return redirect()->route('diamonds.index')->with('success', 'Diamond record updated successfully!');
    }

    public function delete(Request $request,Diamond $diamond)
    {
        $diamond->delete();
        return redirect()->route('diamonds.index')->with('success', 'Diamond deleted successfully!');
    }
}
