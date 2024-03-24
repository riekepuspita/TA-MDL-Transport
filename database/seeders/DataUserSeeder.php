<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'namaUser' => 'Andika',
            'email' => 'andika@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'superadmin'
        ]);
    }
}
