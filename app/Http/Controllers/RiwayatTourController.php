<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatTour;
use Illuminate\Support\Facades\DB;
use Auth;

class RiwayatTourController extends Controller
{
    public function riwayattour() {
        $riwayattour = DB::table('tours')
            ->select('id','mr_mrs', 'fullname', 'gender', 'paket', 'price', 'plane_number', 'sales_by', 'keterangan')
            ->orderByDesc('id')
            ->get();
        $user_name = Auth::user()->name;
        return view('riwayattour', compact('user_name', 'riwayattour'));
        // return view('riwayattour');
    }

    public function search(Request $request)
    {
        $query = $request->get('search');
        $riwayattour = DB::table('tours')
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

        if ($riwayattour->isEmpty()) {
            return '<tr><td colspan="9">Data yang anda cari tidak ada.</td></tr>';
        }

        $output = '';
        foreach ($riwayattour as $rt) {
            $output .= '<tr>'.
                '<td>'. $rt->mr_mrs .'</td>'.
                '<td>'. $rt->fullname .'</td>'.
                '<td>'. $rt->gender .'</td>'.
                '<td>'. $rt->paket .'</td>'.
                '<td>'. $rt->price .'</td>'.
                '<td>'. $rt->plane_number .'</td>'.
                '<td>'. $rt->sales_by .'</td>'.
                '<td>'. $rt->keterangan .'</td>'.
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
    public function show(RiwayatTour $riwayattour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatTour $riwayattour, $id)
    {
        $riwayattour = RiwayatTour::find($id);
        return view("editriwayattour", compact("riwayattour"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiwayatTour $riwayattour, $id)
    {
        $riwayattour = RiwayatTour::find($id);
        $riwayattour->update($request->all());
        return redirect()->route('riwayattour')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatTour $riwayattour, $id)
    {
        $riwayattour = RiwayatTour::find($id);
        $riwayattour->delete();
        return redirect()->route('riwayattour')->with('success', 'Data berhasil dihapus');
    }
}
