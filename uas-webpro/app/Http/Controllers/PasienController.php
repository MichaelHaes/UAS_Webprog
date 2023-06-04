<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

    public function login(Request $request)
    {
        $pasien = Pasien::where('username', $request->username)->first();
        if($pasien && Hash::check($request->password, $pasien->password)) {
            Session::start();
            Session::put('username', $request->username);
            Session::put('password', $request->password);
            return view('pasien/dashboard',
                [
                    'username'=>Session::get('username'),
                    'password'=>Session::get('password')
                ]);
        } else {
            throw ValidationException::withMessages([
                'passwordPasien' => 'That password was incorrect. Please try again.',
            ]);
        }
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

    public function register(Request $request)
    {
        if($request->password == $request->confirmPassword) {
            $hashedPassword = Hash::make($request->password);
            $pasien = new Pasien();
            $pasien->username = $request->username;
            $pasien->nama = $request->nama;
            $pasien->tempatLahir = $request->tempatlahir;
            $pasien->tanggalLahir = $request->tanggallahir;
            $pasien->telepon = $request->telp;
            $pasien->alamat = $request->alamat;
            $pasien->password = $hashedPassword;
            $pasien->save();
        } else {
            throw ValidationException::withMessages([
                'registration' => 'Password must be the same!',
            ]);
        }

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
