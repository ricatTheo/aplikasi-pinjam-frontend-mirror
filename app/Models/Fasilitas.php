<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'Fasilitas';
    protected $fillable = [
        'nama'
    ];

    public function ruangan(){
        return $this->belongsToMany(Ruangan::class, 'ruangan_fasilitas');
    }
}
