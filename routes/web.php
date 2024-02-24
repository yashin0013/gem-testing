<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GemController;
use App\Http\Controllers\HomeController;
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

// Route::get('/run', function () {
//     Artisan::call("db:seed");
// });

Route::get('/', [HomeController::class,'index']);

Route::post('getreport',[HomeController::class,'getreport'])->name('getreport');
Route::post('contact/store',[HomeController::class,'contact'])->name('contact.store');


Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
// Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
Route::group(['middleware'=>'admin_auth', 'prefix'=> 'admin'],function()
{
Route::view('/dashboard','admin/dashboard');

Route::get('/gems',[GemController::class,'index']);
Route::get('/gem/create',[GemController::class,'create']);
Route::post('/gem/store',[GemController::class,'store'])->name('gem.store');
Route::get('/gem/delete/{id}',[GemController::class,'delete']);
Route::get('/gem/show/{id}',[GemController::class,'show']);

// Route::get('/image',[GemController::class,'image_edit']);


Route::get('/contact_msg',[AdminController::class,'contact_msg']);
Route::get('/contact/delete/{id}',[AdminController::class,'delete']);

Route::get('/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->flash('error','Logout Successfully');
    return redirect('admin');
});
});