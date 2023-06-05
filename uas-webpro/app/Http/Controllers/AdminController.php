<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    public function login(Request $request)
    {
        $res = DB::select("select * from admin where idAdmin = ?", [1]);
        if(Hash::check($request->password, $res[0]->password)) {
            Session::start();
            Session::put('username', $request->username);
            Session::put('password', $request->password);
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
        
        return view('admin/profilDokter',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password'),
                'dokters'=>$dokterData
            ]);
    }

    public function tambahDokter(Request $request) {
        $path = $request->file('foto')->storePublicly('dokter', 'public');
        $ext = $request->file('foto')->extension();

        $dokter = new Dokter();
        $dokter->namaDokter = $request->nama;
        $dokter->jenisDokter = $request->spesialisasi;
        $dokter->fotoDokter = $path;
        $dokter->save();
        

        return redirect()->route('dokter');
    }

    public function updateDokter($id, Request $request)
    {
        $dokter = Dokter::where('idDokter', $id)->firstOrFail();
    
        $path = $dokter->fotoDokter;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->storePublicly('dokter', 'public');
        }

        DB::update("UPDATE dokter SET namaDokter = ?, jenisDokter = ?, fotoDokter = ? WHERE idDokter = ?",
        [$request->query('nama'), $request->query('spesialisasi'), $path, $id]);

        
        return redirect()->route('dokter');
    }

    public function deleteDokter($id)
    {
        DB::delete("DELETE FROM dokter WHERE idDokter = ?", [$id]);
        
        return redirect()->route('dokter');
    }


    public function pasien() {
        $pasiens = Pasien::all();
        $pasienData = [];

        foreach ($pasiens as $pasien) {
            $pasienData[] = [
                'id' => $pasien->idPasien,
                'username'=>$pasien->username,
                'nama' => $pasien->nama,
                'tempatlahir' => $pasien->tempatLahir,
                'tanggallahir' => $pasien->tanggalLahir,
                'telepon' => $pasien->telepon,
                'alamat' => $pasien->alamat
            ];
        }
        return view('admin/dataPasien',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password'),
                'pasien'=>$pasienData
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
        $admin = Admin::first();
        return view('admin/profilAdmin',
            [
                'username'=>Session::get('username'),
                'password'=>Session::get('password'),
                'admin'=>$admin
            ]);
    }

}
