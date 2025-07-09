<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        foreach (range(1, 5) as $i) {
            Ruangan::create([
                'nama' => 'Ruangan ' . Str::random(2), // atau $faker->word
                'lokasi' => $faker->streetAddress,
                'jumlahKursi' => $faker->numberBetween(10, 100),
            ]);
        }
    }
}
