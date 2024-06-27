<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_name = Auth::user()->name;
        return view('tour', compact('user_name'));
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
        $tour = new Tour();

        $tour->mr_mrs = $request->mr_mrs;
        $tour->fullname = $request->fullname;
        $tour->nik = $request->nik;
        $tour->gender = $request->gender;
        $tour->place_birth = $request->place_birth;
        $tour->date_birth = $request->date_birth;
        $tour->no_passport = $request->no_passport;
        $tour->date_issued = $request->date_issued;
        $tour->date_expired = $request->date_expired;
        $tour->issuing_office = $request->issuing_office;
        $tour->plane_number = $request->plane_number;
        $tour->paket = $request->paket;
        $tour->price = $request->price;
        $tour->dp = $request->dp;
        $tour->sisa_pembayaran = $request->sisa_pembayaran;

        // Perhitungan Price, Diskon, dan DP
        // $price = floatval(str_replace(',', '', $request->price));
        // $diskon = floatval(str_replace(',', '', $request->diskon));
        // $dp = floatval(str_replace(',', '', $request->dp));

        // $discountedPrice = $price - ($price * ($diskon / 100));
        // $tour->sisa_pembayaran = number_format($discountedPrice - $dp, 2, ',', '.');
        // $tour->sisa_pembayaran = $request->sisa_pembayaran;
        
        $tour->sales_by = $request->sales_by;
        $tour->keterangan = $request->keterangan;

        $tour->save();

        // dump($request);

        // $request->session()->flash('success', 'Registrasi berhasil');
        return redirect()->route('riwayattour')->with('success', 'Data Tour Berhasil di Input');
        //return redirect()->route('riwayat')->with('success', 'Data Jamaah Berhasil di Input');
        //return view('tour');
    }

    /**
     * Display the specified resource.
     */
    public function show(tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tour $tour)
    {
        //
    }
}
