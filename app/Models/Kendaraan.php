<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $fillable = [
        'nama',
        'lokasi',
    ];

    public function spesifikasi(){
        return $this->belongsToMany(Spesifikasi::class, 'kendaraan_spesifikasi');
    }
}
