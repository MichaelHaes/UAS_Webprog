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
    Route::get('/admin/dashboard', 'dashboard');
    Route::post('/admin/dashboard', 'login');
    Route::get('/admin/dokter', 'dokter')->name('dokter');
    Route::post('/admin/tambahdokter', 'tambahDokter');
    Route::get('/admin/updatedokter/{id}', 'updateDokter');
    Route::get('/admin/deletedokter/{id}', 'deleteDokter');
    Route::get('/admin/pasien', 'pasien');
    Route::get('/admin/berkas', 'berkas')->name('berkas');
    Route::post('/admin/berkas/action', 'persetujuanBerkas');
    Route::get('/admin/profil', 'profil');
    Route::get('/admin/logout', 'logout')->name('logout');
});

//  Routing Pasien

Route::controller(PasienController::class)->group(function(){
    Route::get('/pasien/dashboard', 'dashboard')->name('dashboard');
    Route::post('/pasien/dashboard', 'login');
    Route::get('/pasien/logout', 'logout')->name('logout');
    Route::post('/pasien/register', 'register');
    Route::get('/pasien/janji', 'janji')->name('janji');
    Route::post('/pasien/janji/confirm', 'janjiConfirm');
    Route::post('/pasien/review/{id}', 'reviewProses');
    Route::get('/pasien/review', 'review')->name('review');
    Route::get('/pasien/profil', 'profil');
    Route::post('/pasien/forgotpass', 'forgotpass');
});