<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RiwayatTourController;
use App\Http\Controllers\LaporanTourController;
use App\Http\Controllers\LaporanJamaahController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class,'register'])->name('register');
    Route::post('/postregister', [AuthController::class,'postregister'])->name('postregister');
    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/postlogin', [AuthController::class,'postlogin'])->name('postlogin');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [DaftarController::class, 'home'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
   
    // Route Daftar Tour
    Route::get('/tour', [TourController::class, 'index'])->name('tour');
    Route::post('/daftarTour', [TourController::class, 'store'])->name('daftarTour');
    Route::get('/riwayattour', [RiwayatTourController::class, 'riwayattour'])->name('riwayattour');
    //Route::get('/riwayattour', [RiwayatTourController::class, 'riwayattour'])->name('riwayattour');

    //Route Daftar Jamaah
    Route::post('/daftarJamaah', [DaftarController::class, 'store'])->name('store');
    Route::get('/riwayat', [RiwayatController::class, 'riwayat'])->name('riwayat');
    
    // Route Laporan Jamaah
    Route::get('/laporanjamaah', [LaporanJamaahController::class, 'index'])->name('laporanjamaah');

    // Route Laporan Tour
    Route::get('/laporantour', [LaporanTourController::class, 'index'])->name('laporantour');

    // Search Bar
    Route::get('/riwayat/search', [RiwayatController::class, 'search'])->name('riwayat.search');
    Route::get('/riwayattour/search', [RiwayatTourController::class, 'search'])->name('riwayattour.search');
    Route::get('/laporanjamaah/search', [LaporanJamaahController::class, 'search'])->name('laporanjamaah.search');
    Route::get('/laporantour/search', [LaporanTourController::class, 'search'])->name('laporantour.search');

    // Edit Riwayat Jamaah
    Route::get('/riwayat/edit/{id}', [RiwayatController::class, 'edit'])->name('riwayat.edit');
    Route::put('/riwayat/update/{id}', [RiwayatController::class, 'update'])->name('riwayat.update');
    Route::delete('/riwayat/delete/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');

    // Edit Riwayat Tour
    Route::get('/riwayattour/edit/{id}', [RiwayatTourController::class, 'edit'])->name('riwayattour.edit');
    Route::put('/riwayattour/update/{id}', [RiwayatTourController::class, 'update'])->name('riwayattour.update');
    Route::delete('/riwayattour/delete/{id}', [RiwayatTourController::class, 'destroy'])->name('riwayattour.destroy');
   
    // Export to PDF
    Route::get('laporanjamaah/export/pdf', [LaporanJamaahController::class, 'exportPdfJamaah'])->name('downloadjamaah.pdf');
    Route::get('laporantour/export/pdf', [LaporanTourController::class, 'exportPdf'])->name('download.pdf');

    // Export to Excel
    Route::get('/laporanjamaah/exportExcel', [LaporanJamaahController::class, 'exportExcel'])->name('laporanjamaah.exportExcel');
    Route::get('/laporantour/exportExcel', [LaporanTourController::class, 'exportExcel'])->name('laporantour.exportExcel');

    //Route::get('/download-pdf', [LaporanJamaahController::class, 'downloadPDF'])->name('download.pdf');
    // Route::controller(DaftarController::class->prefix('daftar')->group(function () {
    //     Route::get('', 'index')->name('daftar');
    //     Route::get('create', 'create')->name('daftar.create');
    //     Route::post('store', 'store')->name('daftar.store');
    // }))
});
// Route::get('/login', function () {
//     return view('Auth.login');
// });
// Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
