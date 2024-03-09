<?php

namespace App\Http\Controllers;

use App\Models\Jewellery;
use Illuminate\Http\Request;
use DataTables;

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
                        <a href="/admin/diamonds/' . $row->id . '/edit" class="btn btn-sm btn-outline-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/diamonds/' . $row->id . '/delete" class="btn btn-sm btn-outline-danger">
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
