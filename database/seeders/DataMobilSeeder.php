<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataMobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mobil')->insert([
            'noPolisi' => 'B 1234 ABC',
            'merekMobil' => 'Toyota',
            'modelMobil' => 'Toyota Avanza',
            'kapasitasMobil' => '7',
            'tahunMobil' => '2018',
            'deskripsiMobil' => 'Mobil keluarga dengan ruang yang luas dan nyaman',
            'hargaSewa' => '300000',
            'statusMobil' => 'Tersedia'
        ]);
    }
}
