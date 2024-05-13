<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
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
    Route::get('/home', [DaftarController::class, 'home']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
// Route::get('/login', function () {
//     return view('Auth.login');
// });
// Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
