<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/loginAdmin');
    }

    public function dashboard()
    {
        return view('admin/dashboardAdmin',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function login()
    {
        $res = DB::select("select * from admin where idAdmin = ?", [1]);
        if(Hash::check($_POST["password"], $res[0]->password)) {
            Session::start();
            Session::put('username', $_POST["username"]);
            Session::put('password', $_POST["password"]);
            return view('admin/dashboardAdmin',
                [
                    'username'=>Session::get('username'),
                    'password'=>Session::get('password')
                ]);
        } else {
            throw ValidationException::withMessages([
                'passwordAdmin' => 'Wrong Password!',
            ]);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('index');
    }


    public function dokter() {
        return view('admin/profilDokter',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function pasien() {
        return view('admin/dataPasien',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function berkas() {
        return view('admin/berkasJanji',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function profil() {
        return view('admin/profilAdmin',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
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
