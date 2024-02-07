<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
                return redirect('admin/dashboard');
        }else {
            return view('admin/login');
        }
       return view('admin/login');
    }

    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        // $result = Admin::where(['email'=>$email,'password'=>$password])->get();
        $result = Admin::where(['email'=>$email])->first();
        if ($result) {
            if (Hash::check($request->post('password'),$result->password)) {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else {
                $request->session()->flash('error','Please Enter Correct Password');
            return redirect('admin');
            }
        }
        else {
            $request->session()->flash('error','Please Enter Valid Login Details');
            return redirect('admin');
        }
    }

    public function contact_msg()
    {
        $message = DB::table('contacts')->get();
        return view('admin/contact_msg', ['msg' => $message]);
    }
    
    public function delete(Request $request,$id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        // $model=contact::find($id);
        // $model->delete();
        $request->session()->flash('message','Message Deleted');
        return redirect('admin/contact_msg');

    }

    public function category()
    {
        $data['categories'] = DB::table('category')->get();
        return view('admin/category',$data);

    }

    public function logistic()
    {
        // $data['categories'] = DB::table('category')->get();
        return view('admin/logistic');

    }

    public function insert_category(Request $req)
    {
        DB::table('category')->insert([
            'name' => $req->post('name'),
            $req->post("type") => 1,
        ]);
        $req->session()->flash('message','Type Inserted');
        return redirect('admin/category');

    }

    public function delete_category(Request $req,$id)
    {
        DB::table('category')->where('id', $id)->delete();
        $req->session()->flash('message','Type Deleted');
        return redirect('admin/category');

    }

    // public function updatepassword()
    // {
    //    $r = Admin::find(1);
    //    $r->password=Hash::make('123');
    //    $r->save();
    // }
}
