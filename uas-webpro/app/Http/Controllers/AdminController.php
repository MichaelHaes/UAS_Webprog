<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Janji;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function dashboard()
    {
        if(session()->has('token'))
            return view('admin/dashboardAdmin');
        else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function login(Request $request)
    {
        $res = DB::select("select * from admin where idAdmin = ?", [1]);
        if(Hash::check($request->password, $res[0]->password)) {
            Session::start();
            Session::put('username', $request->username);
            Session::put('token', $request->_token);
            return view('admin/dashboardAdmin');
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
        if(session()->has('token')) {
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
                    'dokters'=>$dokterData
                ]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function tambahDokter(Request $request) 
    {
        if(session()->has('token')) {
            $path = $request->file('foto')->storePublicly('dokter', 'public');

            $dokter = new Dokter();
            $dokter->namaDokter = $request->nama;
            $dokter->jenisDokter = $request->spesialisasi;
            $dokter->fotoDokter = $path;
            $dokter->save();
            return redirect()->route('dokter');
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }

    }

    public function updateDokter($id, Request $request)
    {
        if(session()->has('token')) {
            $dokter = Dokter::where('idDokter', $id)->firstOrFail();
        
            $path = $dokter->fotoDokter;
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->storePublicly('dokter', 'public');
            }

            DB::update("UPDATE dokter SET namaDokter = ?, jenisDokter = ?, fotoDokter = ? WHERE idDokter = ?",
            [$request->query('nama'), $request->query('spesialisasi'), $path, $id]);

            
            return redirect()->route('dokter');
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function deleteDokter($id)
    {
        if(session()->has('token')) {
            DB::delete("DELETE FROM dokter WHERE idDokter = ?", [$id]);
            
            return redirect()->route('dokter');
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }


    public function pasien() 
    {
        if(session()->has('token')) {
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
            return view('admin/dataPasien', ['pasien'=>$pasienData]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function berkas() 
    {
        if(session()->has('token')) {
            $janjis = Janji::all(); 
            $janjiData = [];

            foreach ($janjis as $janji) {
                $pasien = Pasien::where('idPasien', $janji->idPasien)->first();
                $dokter = Dokter::where('idDokter', $janji->idDokter)->first();
                $janjiData[] = [
                    'idJanji' => $janji->idJanji,
                    'namaPasien' => $pasien->nama,
                    'namaDokter' => $dokter->namaDokter,
                    'tanggal_temu' => $janji->tanggal_temu,
                    'jam_temu' => $janji->jam_temu,
                    'keluhan' => $janji->keluhan,
                    'status' => $janji->status
                ];
            }
            return view('admin/berkasJanji', ['janjis'=>$janjiData]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function persetujuanBerkas(Request $request) {
        if(session()->has('token')) {
            $action = $request->input('action');

            if ($action === 'accept') {
                DB::update("UPDATE janji SET status = ? WHERE idJanji = ?",
                ['Accepted', $request->input('idJanji')]);
            } elseif ($action === 'decline') {
                DB::update("UPDATE janji SET status = ? WHERE idJanji = ?",
                ['Declined', $request->input('idJanji')]);
            }

            $janjis = Janji::all(); 
            $janjiData = [];

            foreach ($janjis as $janji) {
                $pasien = Pasien::where('idPasien', $janji->idPasien)->first();
                $dokter = Dokter::where('idDokter', $janji->idDokter)->first();
                $janjiData[] = [
                    'idJanji' => $janji->idJanji,
                    'namaPasien' => $pasien->nama,
                    'namaDokter' => $dokter->namaDokter,
                    'tanggal_temu' => $janji->tanggal_temu,
                    'jam_temu' => $janji->jam_temu,
                    'keluhan' => $janji->keluhan,
                    'status' => $janji->status
                ];
            }
            return view('admin/berkasJanji', ['janjis'=>$janjiData]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function profil() 
    {    
        if(session()->has('token')) {
            $admin = Admin::first();
            return view('admin/profilAdmin', ['admin'=>$admin]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

}
