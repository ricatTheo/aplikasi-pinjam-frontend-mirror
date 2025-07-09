<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganFasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fasilitas = Fasilitas::all();

        Ruangan::all()->each(function ($ruangan) use ($fasilitas) {
            // Ambil 1 sampai 2 fasilitas secara acak
            $fasilitasAcak = $fasilitas->random(rand(1, 2))->pluck('id')->toArray();
            
            // Attach ke pivot
            $ruangan->fasilitas()->syncWithoutDetaching($fasilitasAcak);
        });
    }
}
