<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'daftar';

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
        'diskon',
        'sisa_pembayaran',
        'sales_by',
        'keterangan',
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($daftar) {
    //         $daftar->calculateSisaPembayaran();
    //     });
    // }

    // public function calculateSisaPembayaran()
    // {
    //     $price = floatval(str_replace(',', '', $this->price));
    //     $diskon = floatval(str_replace(',', '', $this->diskon));
    //     $dp = floatval(str_replace(',', '', $this->dp));

    //     $discountedPrice = $price - ($price * ($diskon / 100));
    //     $this->sisa_pembayaran = number_format($discountedPrice - $dp, 2, ',', '.');

    //     // $price = $this->price;
    //     // $diskon = $this->diskon;
    //     // $dp = $this->dp;

    //     // $discountedPrice = $price - ($price * ($diskon / 100));
    //     // $this->sisa_pembayaran = $discountedPrice - $dp;
    // }

}
