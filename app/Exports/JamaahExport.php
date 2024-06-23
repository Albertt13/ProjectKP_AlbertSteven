<?php

namespace App\Exports;

use App\Models\LaporanJamaah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JamaahExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LaporanJamaah::all();
    }

    public function headings(): array
    {
        return [
            'mr_mrs', 'fullname', 'nik', 'gender', 'place_birth', 'date_birth', 'no_passport', 'date_issued', 'date_expired', 'issuing_office', 'plane_number', 'paket', 'price', 'dp', 'diskon', 'sisa_pembayaran', 'sales_by', 'keterangan'
        ];
    }
}
