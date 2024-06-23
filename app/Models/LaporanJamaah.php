<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanJamaah extends Model
{
    use HasFactory;
    protected $table = 'daftar';
    protected $fillable = [
        'mr_mrs', 'fullname', 'nik', 'gender', 'place_birth', 'date_birth', 'no_passport', 'date_issued', 'date_expired', 'issuing_office', 'plane_number', 'paket', 'price' , 'dp', 'diskon', 'sisa_pembayaran', 'sales_by', 'keterangan'
    ];

    protected $dates = ['place_birth','date_birth','date_issued', 'date_expired'];
}
