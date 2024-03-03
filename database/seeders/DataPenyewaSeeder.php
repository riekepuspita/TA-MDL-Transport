<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataPenyewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'noNIK' => '1564327856482367',
            'username' => 'Rama',
            'alamat' => 'Kediri',
            'noHP'=> '08533245368',
            'email' => 'rama@gmail.com',
            'password' => bcrypt('87654321'),
        ]);
    }
}
