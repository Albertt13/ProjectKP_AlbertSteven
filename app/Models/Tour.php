<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tour extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'tours';

    protected $fillable = [
        'mr/mrs',
        'fullname',
        'nik',
        'gender',
        'place_birth',
        'date_birth',
        'no_passport',
        'date_issued',
        'date_expired',
        'issuing_office',
        'plane_number',
        'paket',
        'price',
        'dp',
        'sisa_pembayaran',
        'sales_by',
        'keterangan',
    ];
}
