<?php

namespace App\Http\Controllers;

use App\Models\Gem;
use Illuminate\Http\Request;

class GemController extends Controller
{
    function index() {
        $data['gems'] = Gem::paginate(10);
        return view('admin/gems',$data);
    }

    public function create()
    {
        return view('admin/add_gem');
    }

}
