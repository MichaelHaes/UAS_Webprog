<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Janji;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasienController extends Controller
{
    public function dashboard()
    {
        if(session()->has('token')) {
            $dokters = Dokter::all();
            $dokterData = [];

            foreach ($dokters as $dokter) {
                $reviews = Review::where('idDokter', $dokter->idDokter)->get();
                $foto = Storage::url($dokter->fotoDokter);
            
                $reviewData = [];
                foreach ($reviews as $review) {
                    $reviewData[] = [
                        'idReview' => $review->idReview,
                        'idDokter' => $review->idDokter,
                        'idPasien' => $review->idPasien,
                        'rating' => $review->rating,
                        'review' => $review->review,
                    ];
                }
            
                $dokterData[] = [
                    'id' => $dokter->idDokter,
                    'namaDokter' => $dokter->namaDokter,
                    'jenisDokter' => $dokter->jenisDokter,
                    'foto' => $foto,
                    'review' => $reviewData,
                ];
            }
            return view('pasien/dashboard', ['dokters'=>$dokterData]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha'
        ], [
            'captcha.required' => 'CAPTCHA is required.',
            'captcha.captcha' => 'CAPTCHA is incorrect. Please try again.',
        ]);
        $pasien = Pasien::where('username', $request->username)->first();
        if($pasien && Hash::check($request->password, $pasien->password)) {
            $dokters = Dokter::all();
            $dokterData = [];

            foreach ($dokters as $dokter) {
                $reviews = Review::where('idDokter', $dokter->idDokter)->get();
                $foto = Storage::url($dokter->fotoDokter);
            
                $reviewData = [];
                foreach ($reviews as $review) {
                    $reviewData[] = [
                        'idReview' => $review->idReview,
                        'idDokter' => $review->idDokter,
                        'idPasien' => $review->idPasien,
                        'rating' => $review->rating,
                        'review' => $review->review,
                    ];
                }
            
                $dokterData[] = [
                    'id' => $dokter->idDokter,
                    'namaDokter' => $dokter->namaDokter,
                    'jenisDokter' => $dokter->jenisDokter,
                    'foto' => $foto,
                    'review' => $reviewData,
                ];
            }

            Session::start();
            Session::put('pasien', $pasien);
            Session::put('username', $request->username);
            Session::put('token', $request->_token);
            return view('pasien/dashboard', ['dokters'=>$dokterData]);
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
        if(session()->has('token')) {
            $dokters = Dokter::all();
            $dokterData = [];

            foreach ($dokters as $dokter) {
                $foto = Storage::url($dokter->fotoDokter);

                $dokterData[] = [
                    'id' => $dokter->idDokter,
                    'namaDokter' => $dokter->namaDokter,
                    'jenisDokter' => $dokter->jenisDokter,
                    'deleted' => $dokter->deleted,
                    'foto' => $foto
                ];
            }
            return view('pasien/buatJanji', ['dokters'=>$dokterData]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function janjiConfirm(Request $request)
    {
        if(session()->has('token')) {
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
            return redirect()->route('janji')->with(['dokters' => $dokterData]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function review()
    {
        if(session()->has('token')) {
            $today = now()->toDateString();
            $janjiData = [];
            $janjis = Janji::
            where('idPasien', Session::get('pasien')->idPasien)
            ->where('status', 'Accepted')
            ->where('tanggal_temu', '<', $today)->get();

            foreach ($janjis->all() as $janji) {
                $janjiData[] = [
                    'idDokter' => $janji->idDokter,
                    'idPasien' => $janji->idPasien,
                    'idJanji' => $janji->idJanji
                ];
            }
            $idDokters = collect($janjiData)->pluck('idDokter')->toArray();
            $dokters = Dokter::whereIn('idDokter', $idDokters)->get();

            return view('pasien/reviewDokter',
                [
                    'janjis'=>$janjiData,
                    'dokters'=>$dokters
                ]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function reviewProses($id, Request $request)
    {
        if(session()->has('token')) {
            $review = new Review();
            $review->idDokter = $id;
            $review->idPasien = Session::get('pasien')->idPasien;
            $review->idJanji = $request->idJanji;
            $review->rating = $request->rating;
            $review->review = $request->review;
            $review->save();


            $today = now()->toDateString();
            $janjiData = [];
            $janjis = Janji::
            where('idPasien', Session::get('pasien')->idPasien)
            ->where('status', 'Accepted')
            ->where('idDokter', $id)
            ->where('tanggal_temu', '<', $today)->get();

            foreach ($janjis as $janji) {
                $janjiData[] = [
                    'idDokter' => $janji->idDokter,
                    'idJanji' => $janji->idJanji
                ];
            }
            $idDokters = collect($janjiData)->pluck('idDokter')->toArray();
            $dokters = Dokter::whereIn('idDokter', $idDokters)->get();

            foreach ($janjiData as $janji) {
                DB::update("UPDATE janji SET status = ? WHERE idjanji = ?",
                    ['Reviewed', $janji['idJanji']]);
            }
            // return view('pasien/reviewDokter',
            //     [
            //         'janjis'=>$janjiData,
            //         'dokters'=>$dokters
            //     ]);
            return redirect()->route('review')->with('janjis', $janjiData)->with('dokters', $dokters);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
    }

    public function profil()
    {
        if(session()->has('token')) {
        return view('pasien/profilPasien', ['pasien'=>Session::get('pasien')]);
        } else {
            return redirect()->route('index')->withErrors([
                'tokenInvalid' => 'Please log in to gain access!'
            ]);
        }
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
