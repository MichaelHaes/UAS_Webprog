<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Janji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
        $dokters = Dokter::all();
        $dokterData = [];

        foreach ($dokters as $dokter) {
            $foto = Storage::url($dokter->fotoDokter);

            $dokterData[] = [
                'id' => $dokter->id,
                'namaDokter' => $dokter->namaDokter,
                'jenisDokter' => $dokter->jenisDokter,
                'foto' => $foto
            ];
        }
        return view('pasien/dashboard',
            [
                'pasien'=>Session::get('pasien'),
                'username'=>Session::get('username'),
                'password'=>Session::get('password'),
                'dokters'=>$dokterData
            ]);
    }

    public function login(Request $request)
    {
        $dokters = Dokter::all();
        $dokterData = [];

        foreach ($dokters as $dokter) {
            $foto = Storage::url($dokter->fotoDokter);

            $dokterData[] = [
                'id' => $dokter->id,
                'namaDokter' => $dokter->namaDokter,
                'jenisDokter' => $dokter->jenisDokter,
                'foto' => $foto
            ];
        }

        $pasien = Pasien::where('username', $request->username)->first();
        if($pasien && Hash::check($request->password, $pasien->password)) {
            Session::start();
            Session::put('pasien', $pasien);
            Session::put('username', $request->username);
            Session::put('password', $request->password);
            return view('pasien/dashboard',
                [
                    'pasien'=>Session::get('pasien'),
                    'username'=>Session::get('username'),
                    'password'=>Session::get('password'),
                    'dokters'=>$dokterData
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
        $dokters = Dokter::all();
        $dokterData = [];

        foreach ($dokters as $dokter) {
            $foto = Storage::url($dokter->fotoDokter);

            $dokterData[] = [
                'id' => $dokter->idDokter,
                'namaDokter' => $dokter->namaDokter,
                'jenisDokter' => $dokter->jenisDokter,
                'foto' => $foto
            ];
        }
        return view('pasien/buatJanji',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password'),
                'dokters'=>$dokterData,
                'pasien'=>Session::get('pasien')
            ]);
    }

    public function janjiConfirm(Request $request)
    {
        $isExist = Janji::where('tanggal_temu', $request->tanggal)
        ->where('jam_temu', $request->waktu)
        ->where('idDokter', $request->dokter)
        ->first();

        $dokters = Dokter::all();
        $dokterData = [];

        foreach ($dokters as $dokter) {
            $foto = Storage::url($dokter->fotoDokter);

            $dokterData[] = [
                'id' => $dokter->idDokter,
                'namaDokter' => $dokter->namaDokter,
                'jenisDokter' => $dokter->jenisDokter,
                'foto' => $foto
            ];
        }

        if ($isExist) {
            throw ValidationException::withMessages([
                'janji' => "Doctor already have an appointment at $request->tanggal on ($request->waktu)!",
            ]);
        } else {
            $janji = new Janji();
            $janji->idDokter = $request->dokter;
            $janji->idPasien = $request->pasien;
            $janji->tanggal_temu = $request->tanggal;
            $janji->jam_temu = $request->waktu;
            $janji->keluhan = $request->keluhan;
            $janji->status = "Pending";
            $janji->save();
        }

        return view('pasien/buatJanji',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password'),
                'dokters'=>$dokterData,
                'pasien'=>Session::get('pasien')
            ]);
    }

    public function review()
    {
        return view('pasien/reviewDokter',
            [
                'pasien'=>Session::get('pasien'),
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function profil()
    {
        return view('pasien/profilPasien',
            [
                'pasien'=>Session::get('pasien'),
                'username'=>Session::get('username'),
                'password'=>Session::get('password')
            ]);
    }

    public function register(Request $request)
    {
        $isExist = Pasien::where('username', $request->username)->first();

        if ($isExist) {
            throw ValidationException::withMessages([
                'registration' => 'Username already exists!',
            ]);
        }
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

    public function forgotpass(Request $request)
    {
        $pasien = Pasien::where('username', $request->username)->first();

        if (!$pasien) {
            throw ValidationException::withMessages([
                'forgotpass' => 'Username does not exists!',
            ]);
        } else if ($pasien && $request->password !== $request->confirmpassword) {
            throw ValidationException::withMessages([
                'forgotpass' => 'Password and confirm password must be the same!',
            ]);
        } else {
            $hashedPassword = Hash::make($request->password);
            DB::update("UPDATE pasien SET password = ? WHERE idPasien = ?",
            [$hashedPassword, $pasien['idPasien']]);
        }

        return redirect()->route('index');
    }

}
