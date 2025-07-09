<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $fillable = [
        'nama',
        'lokasi',
        'jumlahKursi',
    ];

    public function fasilitas(){
        return $this->belongsToMany(Fasilitas::class, 'ruangan_fasilitas');
    }
}
 