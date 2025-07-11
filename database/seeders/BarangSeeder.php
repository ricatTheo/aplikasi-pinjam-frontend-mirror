<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $i) {
            Barang::create([
                'nama' => 'Proyektor ' . Str::random(2), // atau $faker->word
                'lokasi' => $faker->streetAddress,
            ]);
        }
    }
}
