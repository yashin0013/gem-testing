<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Http\Requests\StoreFilesRequest;
use App\Http\Requests\UpdateFilesRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Files::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('images', function ($row) {
                    return '<img
                        src="/images/gems/' . $row->image . '"
                        class="img-fluid"
                        alt="' . $row->image . '"
                        width="100"
                    />';
                })
                ->addColumn('copy', function ($row) {
                    $btn =  '<div class="d-flex align-items-center justify-content-center" >
                    <button onclick="copyText(\'' . $row->image . '\')" class="btn btn-sm btn-success">
                        Copy
                    </button>
                </div>';

                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn =  '<div class="d-flex align-items-center justify-content-center" >
                        <a href="/admin/files/' . $row->id . '/delete" onclick="return confirm(\'Are you sure you want to delete this image?\');" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>';

                    return $btn;
                })

                ->rawColumns(['action', 'images', 'copy'])
                ->make(true);
        }
        return view('admin.images');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilesRequest $request)
    {

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images/gems'), $imageName);

                $fileModal = new Files();
                $fileModal->image = $imageName;
                $fileModal->save();
            }
            return redirect()->route('files.index')->with('success', 'Images uploaded successfully');
        }
        return redirect()->route('files.index')->with('error', 'No images uploaded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Files $files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilesRequest $request, Files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Files $files)
    {

        $file_path = public_path('images/gems/') . $files->image;
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                $files->delete();
                return redirect()->route('files.index')->with('success', 'Gem Stone deleted successfully!');
            } else {
                return redirect()->route('files.index')->with('error', 'Unable to delete the image.');
            }
        } else {
            return redirect()->route('files.index')->with('error', 'Image does not exist.');
        }
    }


}
