<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Daftar;

use Illuminate\Http\Request;

class DaftarController extends Controller
{

    public function store(Request $request) {
        $daftar = new Daftar();

        $daftar->mr_mrs = $request->mr_mrs;
        $daftar->fullname = $request->fullname;
        $daftar->nik = $request->nik;
        $daftar->gender = $request->gender;
        $daftar->place_birth = $request->place_birth;
        $daftar->date_birth = $request->date_birth;
        $daftar->no_passport = $request->no_passport;
        $daftar->date_issued = $request->date_issued;
        $daftar->date_expired = $request->date_expired;
        $daftar->issuing_office = $request->issuing_office;
        $daftar->plane_number = $request->plane_number;
        $daftar->paket = $request->paket;
        $daftar->price = $request->price;
        $daftar->dp = $request->dp;
        $daftar->sisa_pembayaran = $request->sisa_pembayaran;

        // Perhitungan Price, Diskon, dan DP
        //$price = floatval(str_replace(',', '', $request->price));
        //$diskon = floatval(str_replace(',', '', $request->diskon));
        //$dp = floatval(str_replace(',', '', $request->dp));
        //$sisaPembayaran = floatval(str_replace(',', '', $request->sisa_pembayaran));

        //$discountedPrice = $price - ($price * ($diskon / 100));
        //$daftar->sisa_pembayaran = number_format($discountedPrice - $dp, 2, ',', '.');
        
        $daftar->sales_by = $request->sales_by;
        $daftar->keterangan = $request->keterangan;

        $daftar->save();

        // dump($request);

        // $request->session()->flash('success', 'Registrasi berhasil');
        return redirect()->route('riwayat')->with('success', 'Data Jamaah Berhasil di Input');
    }


    public function __construct() {
        $this->middleware('auth');
    }

    public function home() {
        $user_name = Auth::user()->name;
        return view('home', compact('user_name'));

    }

}
