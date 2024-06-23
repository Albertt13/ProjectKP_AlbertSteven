<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanJamaah;
use Illuminate\Support\Facades\DB;
use Auth;
use Barryvdh\DomPDF\Facade;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JamaahExport;

class LaporanJamaahController extends Controller
{
    public function index() {
        $laporanjamaah = LaporanJamaah::all();
        $user_name = Auth::user()->name;
        return view('laporanjamaah', compact('user_name', 'laporanjamaah'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search');
        $laporanjamaah = DB::table('daftar')
            ->where('mr_mrs', 'LIKE', "%{$query}%")
            ->orWhere('fullname', 'LIKE', "%{$query}%")
            ->orWhere('nik', 'LIKE', "%{$query}%")
            ->orWhere('gender', 'LIKE', "%{$query}%")
            ->orWhere('place_birth', 'LIKE', "%{$query}%")
            ->orWhere('date_birth', 'LIKE', "%{$query}%")
            ->orWhere('no_passport', 'LIKE', "%{$query}%")
            ->orWhere('date_issued', 'LIKE', "%{$query}%")
            ->orWhere('date_expired', 'LIKE', "%{$query}%")
            ->orWhere('issuing_office', 'LIKE', "%{$query}%")
            ->orWhere('plane_number', 'LIKE', "%{$query}%")
            ->orWhere('paket', 'LIKE', "%{$query}%")
            ->orWhere('price', 'LIKE', "%{$query}%")
            ->orWhere('dp', 'LIKE', "%{$query}%")
            ->orWhere('diskon', 'LIKE', "%{$query}%")
            ->orWhere('sales_by', 'LIKE', "%{$query}%")
            ->orWhere('keterangan', 'LIKE', "%{$query}%")
            ->orderByDesc('id')
            ->get();

        if ($laporanjamaah->isEmpty()) {
            return '<tr><td colspan="9">Data yang anda cari tidak ada.</td></tr>';
        }

        $output = '';
        foreach ($laporanjamaah as $lj) {
            $output .= '<tr>'.
                '<td>'. $lj->mr_mrs .'</td>'.
                '<td>'. $lj->fullname .'</td>'.
                '<td>'. $lj->nik .'</td>'.
                '<td>'. $lj->gender .'</td>'.
                '<td>'. $lj->place_birth .'</td>'.
                '<td>'. $lj->date_birth .'</td>'.
                '<td>'. $lj->no_passport .'</td>'.
                '<td>'. $lj->date_issued .'</td>'.
                '<td>'. $lj->date_expired .'</td>'.
                '<td>'. $lj->issuing_office .'</td>'.
                '<td>'. $lj->plane_number .'</td>'.
                '<td>'. $lj->paket .'</td>'.
                '<td>'. $lj->price .'</td>'.
                '<td>'. $lj->dp .'</td>'.
                '<td>'. $lj->diskon .'</td>'.
                '<td>'. $lj->sisa_pembayaran .'</td>'.
                '<td>'. $lj->sales_by .'</td>'.
                '<td>'. $lj->keterangan .'</td>'.
            '</tr>';
        }
        return $output;
    }

    public function exportPdfJamaah()
    {
        set_time_limit(120);
        $laporanjamaah = LaporanJamaah::all();
        $pdf = PDF::loadView('laporanjamaah_pdf', compact('laporanjamaah'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('LaporanJamaahHaji.pdf');
    }

    public function exportExcel()
    {
        set_time_limit(120);
        return Excel::download(new JamaahExport, 'laporan_jamaah.xlsx');
    }

}
