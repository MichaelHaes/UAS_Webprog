<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    return view('index');
})->name('index');

Route::get('/insert', function(){
    // $username = 'admin';
    // $password = 'admin123';
    // $hashedPassword = Hash::make($password);

    // DB::insert("insert into admin(idAdmin, username, password) values(?,?,?)",
    // [1, $username, $hashedPassword]);
});

//  Routing Admin
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin', 'index');      
    Route::get('/admin/dashboard', 'dashboard');
    Route::post('/admin/dashboard', 'login')->middleware('web');
    Route::get('/admin/dokter', 'dokter')->middleware('web')->name('dokter');
    Route::post('/admin/tambahdokter', 'tambahDokter')->middleware('web');
    Route::get('/admin/updatedokter/{id}', 'updateDokter')->middleware('web');
    Route::get('/admin/deletedokter/{id}', 'deleteDokter')->middleware('web');
    Route::get('/admin/pasien', 'pasien')->middleware('web');
    Route::get('/admin/berkas', 'berkas')->middleware('web');
    Route::get('/admin/profil', 'profil')->middleware('web');
    Route::get('/admin/logout', 'logout')->name('logout');
});

//  Routing Pasien

Route::controller(PasienController::class)->group(function(){
    Route::get('/pasien', 'index');
    Route::get('/pasien/dashboard', 'dashboard');
    Route::post('/pasien/dashboard', 'login')->middleware('web');
    Route::get('/pasien/logout', 'logout')->name('logout');
    Route::post('/pasien/register', 'register');
    Route::get('/pasien/janji', 'janji')->middleware('web');
    Route::get('/pasien/review', 'review')->middleware('web');
    Route::get('/pasien/profil', 'profil')->middleware('web');
    Route::get('/pasien/forgotpass', 'forgotpass');
});