<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GemController;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JewelleryController;
use App\Http\Controllers\RudrakshaController;
// use Illuminate\Support\Facades\Artisan;
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
//     Artisan::call("migrate");
//     Artisan::call("db:seed");
// });

Route::get('/', [HomeController::class,'index']);

Route::post('getreport',[HomeController::class,'getreport'])->name('getreport');
Route::post('contact/store',[HomeController::class,'contact'])->name('contact.store');
Route::get('show/{id}',[GemController::class,'show']);


Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
// Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
Route::group(['middleware'=>'admin_auth', 'prefix'=> 'admin'],function()
{
    
Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/images',[AdminController::class, 'images'])->name('images');
Route::post('/images/upload',[AdminController::class, 'images_upload'])->name('images.upload');

Route::resources([
    'diamonds' => DiamondController::class,
    'jewellery' => JewelleryController::class,
    'rudraksha' => RudrakshaController::class,
    'gems' => GemController::class,
]);

Route::get('/gems/{gem}/delete',[GemController::class,'delete']);
Route::get('/gem/show/{id}',[GemController::class,'show']);
Route::get('/import/{type}',[GemController::class,'import_page']);
Route::post('/gem/import',[GemController::class,'import'])->name('gem.import');
Route::get('/sample-excel/{type}',[GemController::class,'download_excel']);

//  Diamond routes
Route::get('/diamonds/{diamond}/delete',[DiamondController::class,'delete']);

// Jewellery Routes
Route::get('/jewellery/{jewellery}/delete',[JewelleryController::class,'delete']);

// Rudraksha Routes
Route::get('/rudraksha/{rudraksha}/delete',[RudrakshaController::class,'delete']);

// Route::get('/image',[GemController::class,'image_edit']);

Route::get('/contact_msg',[AdminController::class,'contact_msg'])->name('contact.index');
Route::get('/contact/delete/{id}',[AdminController::class,'delete']);

Route::get('/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->flash('error','Logout Successfully');
    return redirect('admin');
});
});