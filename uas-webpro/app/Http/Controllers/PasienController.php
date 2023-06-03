<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pasien/loginPasien');
    }

    public function dashboard()
    {
        return view('pasien/dashboard',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function login()
    {
        Session::start();
        Session::put('username', $_POST["username"]);
        Session::put('password', $_POST["password"]);
        return view('pasien/dashboard',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('index');
    }

    public function janji()
    {
        return view('pasien/buatJanji',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function review()
    {
        return view('pasien/reviewDokter',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function profil()
    {
        return view('pasien/profilPasien',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function register()
    {
        return redirect()->route('index');
    }

    public function forgotpass()
    {
        return view('pasien/forgotPassword');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
