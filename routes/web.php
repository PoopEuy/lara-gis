<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminController as ControllersAdminController;
use App\Http\Controllers\KoordinatController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
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

   Route::get('/user', [UserController::class,'index'])->middleware('userAkses:admin');
   Route::post('/user/store', [UserController::class,'store'])->middleware('userAkses:admin');
   Route::post('/user/update/{id}', [UserController::class,'update'])->middleware('userAkses:admin');
   Route::get('/user/destroy/{id}', [UserController::class,'destroy'])->middleware('userAkses:admin');

   Route::get('/tabelKoordinat', [KoordinatController::class,'tabelKoordinat'])->middleware('userAkses:admin');
   Route::get('/koordinatMap', [KoordinatController::class,'koordinatMap'])->middleware('userAkses:admin');
   Route::post('/koordinat/store', [KoordinatController::class,'store'])->middleware('userAkses:admin');
//    Route::post('/karyawan/update/{id}', [KoordinatController::class,'update'])->middleware('userAkses:admin');
//    Route::get('/karyawan/destroy/{id}', [KoordinatController::class,'destroy'])->middleware('userAkses:admin');
});



