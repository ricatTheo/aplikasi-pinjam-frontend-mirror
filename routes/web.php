<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Autentikasi');
})->name('Autentikasi');
Route::get('/Ruangan', function () {
    return view('Ruangan');
})->name('RuanganAku');

Route::get('/Kendaraan',function(){
    return view('Kendaraan');
})->name('KendaraanAku');

Route::get('/Barang',function(){
    return view('Barang');
})->name('BarangAku');
