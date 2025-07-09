<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Auth\SSOController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
Route::post('calStore', [CalendarController::class, 'store'])->name('calendar.store');
Route::delete('calDestroy/{id}', [CalendarController::class, 'destroy']);
Route::put('calUpdate/{id}', [CalendarController::class, 'update'])->name('calendar.update');

Route::get('/', function () {
    return view('autentikasi');
})->name('autentikasi');

Route::get('/Ruangan', [RuanganController::class, 'index'])->name('ruanganAku');
    
Route::get('/Kendaraan',function(){
    return view('kendaraan');
})->name('kendaraanAku');

Route::get('/Barang',function(){
    return view('barang');
})->name('barangAku');

Route::get('/login-sso', function(){
    return redirect("https://satupintu.wahanavisi.org/login?app_id=TestPinjam");
})->name('login');

Route::POST('/logout', LogoutController::class)->name('logout');

//Buat ngambil token JWT dari redirect setelah login
Route::get('/callback', [SSOController::class, 'handleCallback'])->name('sso.callback');

Route::middleware(['is_admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});