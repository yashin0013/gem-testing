<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DataTables;

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
            if (Hash::check($password,$result->password)) {
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

    public function contact_msg(Request $request)
    {
        // $data['msgs'] = Contact::orderBy('id', 'desc')->get();

        if ($request->ajax()) {
            $data = Contact::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn=  '<a href="/admin/contact/delete/'.$row->id.'" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>';
    
                            return $btn;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin/contact_msg');
    }

    public function delete(Request $request,$id)
    {
        // DB::table('contacts')->where('id', $id)->delete();
        $model=Contact::find($id);
        $model->delete();
        $request->session()->flash('success', 'Message has been deleted successfully');
        return redirect('admin/contact_msg');

    }

    // public function updatepassword()
    // {
    //    $r = Admin::find(1);
    //    $r->password=Hash::make('123');
    //    $r->save();
    // }
}
