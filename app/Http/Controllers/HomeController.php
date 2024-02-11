<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function getreport(Request $request) {
        return response()->json(['success' => 'Post created successfully.']);
    }
}
