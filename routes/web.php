<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
// Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
Route::group(['middleware'=>'admin_auth'],function()
{
Route::view('admin/dashboard','admin/dashboard');
Route::get('admin/gems',[AdminController::class,'gems']);

Route::get('admin/contact_msg',[AdminController::class,'contact_msg']);
Route::get('admin/contact/delete/{id}',[AdminController::class,'delete']);

// Category routes 
Route::get('admin/category',[AdminController::class,'category']);
Route::post('admin/category/insert',[AdminController::class,'insert_category'])->name('type.insert');
Route::get('category/delete/{id}',[AdminController::class,'delete_category']);

// Route::get('admin/team',[TeamController::class,'index']);
// Route::get('admin/team/add_member',[TeamController::class,'add_member']);
// Route::get('admin/team/manage_team/{id}',[TeamController::class,'edit_member']);
// Route::post('admin/category/add_member_process',[TeamController::class,'add_member_process'])->name('team.manage_team');
// Route::post('admin/team/update_member_process/{id}',[TeamController::class,'update_process']);
// Route::get('admin/team/delete/{id}',[TeamController::class,'delete']);

// Route::get('admin/service',[ServiceController::class,'index']);
// Route::get('admin/service/add',[ServiceController::class,'add']);
// Route::get('admin/service/manage_service/{id}',[ServiceController::class,'edit']);
// Route::post('admin/service/add_service_process',[ServiceController::class,'add_service_process'])->name('service.manage_service');
// Route::post('admin/service/update_service_process/{id}',[ServiceController::class,'update_process']);
// Route::get('admin/service/delete/{id}',[ServiceController::class,'delete']);

// -----------  Products Routes ---------------------

// Route::get('admin/products',[ProductController::class,'index']);
// Route::get('admin/products/add',[ProductController::class,'add']);
// Route::get('admin/products/edit/{id}',[ProductController::class,'edit']);
// Route::post('admin/products/insert',[ProductController::class,'insert'])->name('products.manage_products');
// Route::post('admin/products/update_products_process/{id}',[ProductController::class,'update_process']);
// Route::get('admin/products/delete/{id}',[ProductController::class,'delete']);

// -----------  Logistic Routes ---------------------
// Route::get('admin/logistic',[BillController::class,'index']);
// Route::get('admin/import',[BillController::class,'import']);
// Route::post('bill_import', [BillController::class, 'bill_import'])->name('bill_import');

Route::get('admin/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->flash('error','Logout Successfully');
    return redirect('admin');
});
});