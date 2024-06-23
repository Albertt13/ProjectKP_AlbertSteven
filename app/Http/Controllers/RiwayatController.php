<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function riwayat() {
        $riwayat = DB::table('daftar')
            ->select('id','mr_mrs', 'fullname', 'gender', 'paket', 'price', 'plane_number', 'sales_by', 'keterangan')
            ->orderByDesc('id')
            ->get();
        $user_name = Auth::user()->name;
        return view('riwayat', compact('user_name', 'riwayat'));
        // return view('riwayat');
    }

    public function index()
    {
        // $riwayat = DB::table('daftar')
        //     ->select('mr_mrs', 'fullname', 'gender', 'paket', 'price', 'plane_number', 'sales_by', 'keterangan')
        //     ->orderByDesc('id')
        //     ->get();
        // return view('riwayat', compact('riwayat'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search');
        $riwayat = DB::table('daftar')
            ->where('mr_mrs', 'LIKE', "%{$query}%")
            ->orWhere('fullname', 'LIKE', "%{$query}%")
            ->orWhere('gender', 'LIKE', "%{$query}%")
            ->orWhere('paket', 'LIKE', "%{$query}%")
            ->orWhere('price', 'LIKE', "%{$query}%")
            ->orWhere('plane_number', 'LIKE', "%{$query}%")
            ->orWhere('sales_by', 'LIKE', "%{$query}%")
            ->orWhere('keterangan', 'LIKE', "%{$query}%")
            ->orderByDesc('id')
            ->get();

        if ($riwayat->isEmpty()) {
            return '<tr><td colspan="9">Data yang anda cari tidak ada.</td></tr>';
        }

        $output = '';
        foreach ($riwayat as $r) {
            $output .= '<tr>'.
                '<td>'. $r->mr_mrs .'</td>'.
                '<td>'. $r->fullname .'</td>'.
                '<td>'. $r->gender .'</td>'.
                '<td>'. $r->paket .'</td>'.
                '<td>'. $r->price .'</td>'.
                '<td>'. $r->plane_number .'</td>'.
                '<td>'. $r->sales_by .'</td>'.
                '<td>'. $r->keterangan .'</td>'.
                '<td>'.
                    '<div class="action-buttons">'.
                    '<a href="" class="btn btn-primary btn-edit">Edit</a>'.
                    '<a href="" class="btn btn-danger btn-delete">Delete</a>'.
                    '</div>'.
                '</td>'.
            '</tr>';
        }
        return $output;
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
    public function show(Riwayat $riwayat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Riwayat $riwayat, $id)
    {
        $riwayat = Riwayat::find($id);
        return view("editriwayat", compact("riwayat"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Riwayat $riwayat, $id)
    {
        $riwayat = Riwayat::find($id);
        $riwayat->update($request->all());
        return redirect()->route('riwayat')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riwayat $riwayat, $id)
    {
        $riwayat = Riwayat::find($id);
        $riwayat->delete();
        return redirect()->route('riwayat')->with('success', 'Data berhasil dihapus');
    }
}
