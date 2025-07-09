<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fasilitas = [
            ['nama' => 'Free Wifi'],
            ['nama' => 'Full AC'],
        ];

        foreach($fasilitas as $fs){
            Fasilitas::create($fs);
        }
    }
}
