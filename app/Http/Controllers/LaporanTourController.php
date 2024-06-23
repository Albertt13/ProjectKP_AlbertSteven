<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanTour;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TourExport;

class LaporanTourController extends Controller
{
    public function index() {
        $laporantour = LaporanTour::all();
        $user_name = Auth::user()->name;
        return view('laporantour', compact('user_name', 'laporantour'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search');
        $laporantour = DB::table('tours')
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

        if ($laporantour->isEmpty()) {
            return '<tr><td colspan="9">Data yang anda cari tidak ada.</td></tr>';
        }

        $output = '';
        foreach ($laporantour as $lt) {
            $output .= '<tr>'.
                '<td>'. $lt->mr_mrs .'</td>'.
                '<td>'. $lt->fullname .'</td>'.
                '<td>'. $lt->nik .'</td>'.
                '<td>'. $lt->gender .'</td>'.
                '<td>'. $lt->place_birth .'</td>'.
                '<td>'. $lt->date_birth .'</td>'.
                '<td>'. $lt->no_passport .'</td>'.
                '<td>'. $lt->date_issued .'</td>'.
                '<td>'. $lt->date_expired .'</td>'.
                '<td>'. $lt->issuing_office .'</td>'.
                '<td>'. $lt->plane_number .'</td>'.
                '<td>'. $lt->paket .'</td>'.
                '<td>'. $lt->price .'</td>'.
                '<td>'. $lt->dp .'</td>'.
                '<td>'. $lt->diskon .'</td>'.
                '<td>'. $lt->sisa_pembayaran .'</td>'.
                '<td>'. $lt->sales_by .'</td>'.
                '<td>'. $lt->keterangan .'</td>'.
            '</tr>';
        }
        return $output;
    }

    public function exportPdf()
    {
        set_time_limit(120);
        $laporantour = LaporanTour::all();
        $pdf = PDF::loadView('laporantour_pdf', compact('laporantour'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('LaporanTour.pdf');
    }

    public function exportExcel()
    {
        set_time_limit(120);
        return Excel::download(new TourExport, 'laporan_tour.xlsx');
    }
}
