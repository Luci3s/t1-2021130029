<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book')->insert([
        	'isbn' => '9786028519939',
        	'judul' => 'Belajar PBWL',
        	'halaman' => 25,
        	'kategori' => 'Pelajaran',
            'penerbit' => 'Gramedia',
            'created_at' => '2023-10-14 13:36:02',
            'updated_at' => '2023-10-14 13:36:02'
        ]);
    }
}
