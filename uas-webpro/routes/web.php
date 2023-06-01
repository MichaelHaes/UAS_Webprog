<?php

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
    return view('index');
});

//  Routing Admin

Route::get('/admin', function () {
    return view('admin/loginAdmin');
});

Route::get('/admin/dashboard', function () {
    return view('admin/dashboardAdmin');
});

Route::get('/admin/dokter', function () {
    return view('admin/profilDokter');
});

Route::get('/admin/pasien', function () {
    return view('admin/dataPasien');
});

Route::get('/admin/berkas', function () {
    return view('admin/berkasJanji');
});

Route::get('/admin/profil', function () {
    return view('admin/profilAdmin');
});

//  Routing Pasien

Route::get('/pasien', function () {
    return view('pasien/loginPasien');
});

Route::get('/pasien/dashboard', function () {
    return view('pasien/dashboard');
});

Route::get('/pasien/register', function () {
    return view('pasien/register');
});

Route::get('/pasien/forgotpass', function () {
    return view('pasien/forgotPassword');
});

Route::get('/pasien/janji', function () {
    return view('pasien/buatJanji');
});

Route::get('/pasien/review', function () {
    return view('pasien/reviewDokter');
});

Route::get('/pasien/profil', function () {
    return view('pasien/profilPasien');
});