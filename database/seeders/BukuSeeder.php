<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bukus')->insert([
            'judul' => 'Cara Menghilangkan Stress',
            'pengarang' => 'Joko Tingkir',
            'penerbit' => 'Elex Media',
            'tahun_terbit' => '2020',
            'genre_buku' => 'Kesehatan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
