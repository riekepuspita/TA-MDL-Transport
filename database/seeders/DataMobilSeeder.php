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
            'merekMobil' => 'Toyota',
            'modelMobil' => 'Toyota Avanza',
            'tahunMobil' => '2020',
            'kapasitasMobil' => '7',
            'platMobil' => 'B 1234 ABC',
            'deskripsiMobil' => 'Mobil keluarga dengan ruang yang luas dan nyaman',
            'hargaSewa' => '300000',
            'statusMobil' => 'Tersedia'
        ]);
    }
}
