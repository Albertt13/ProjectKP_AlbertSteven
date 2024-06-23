<?php

namespace App\Exports;

use App\Models\LaporanTour;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TourExport implements FromCollection
{
    public function collection()
    {
        return LaporanTour::all();
    }

    public function headings(): array
    {
        return [
            'mr_mrs', 'fullname', 'nik', 'gender', 'place_birth', 'date_birth', 'no_passport', 'date_issued', 'date_expired', 'issuing_office', 'plane_number', 'paket', 'price', 'dp', 'diskon', 'sisa_pembayaran', 'sales_by', 'keterangan'
        ];
    }
}
