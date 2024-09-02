<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReportsController extends Controller
{
    function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Report::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return '<img
                        src="/images/gems/' . $row->image . '"
                        class="img-fluid"
                        alt=""
                        width="100"
                    />';
                })
                ->addColumn('action', function ($row) {
                    $btn =  '<div class="d-flex align-items-center justify-content-center" >
                        <a href="/admin/reports/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/reports/' . $row->id . '/delete" onclick="return confirm(\'Are you sure you want to delete this item?\');" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>';

                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.reports.index');
    }

    public function create()
    {
        return view('admin.reports.create');
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'report_number' => 'required|unique:reports,number',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $report = new Report();
        $report->number = $request->report_number;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            // $image_name = $image->getClientOriginalName();
            // $ext = $image->getClientOriginalExtension();
            $destinationPath = 'images/gems';
            $gemImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $gemImage);
            $report->image = $gemImage;
        }
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Report created successfully!');
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function delete(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'report_number' => 'required',
            'id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $gem = Report::find($request->id);
        $gem->number = $request->report_number;
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
        return redirect()->route('reports.index')->with('success', 'Report updated successfully!');
    }
}