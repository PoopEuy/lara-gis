<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminController as ControllersAdminController;
use App\Http\Controllers\SesiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//mencegah jika sudah login tidak bisa akses ke halaman login
Route::middleware(['guest'])->group(function(){
    //Http->controller->sesiController
    Route::get('/', [SesiController::class,'index'])->name('login');
    Route::post('/', [SesiController::class,'login']);
});


Route::get('/home', function(){
    return redirect('/admin');
});

//mencegah user bbelum login untuk akses ke bagian di bawah
Route::middleware(['auth'])->group(function(){
   Route::get('/admin', [AdminController::class,'indexAdmin'])->middleware('userAkses:admin');
   Route::get('/viewers', [AdminController::class,'indexViewer'])->middleware('userAkses:viewers');
   Route::get('/logout', [SesiController::class,'logout']);
   Route::get('/home', [AdminController::class,'indexHome']);
});

