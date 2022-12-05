<?php

namespace Database\Seeders;

use App\Models\buku;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i <= 10; $i++) {
            DB::table('bukus')->insert([
                'file_name' => 'Web Development eBook Cover Design - Mediamodifier.png',
                'judul' => $faker->word(3),
                'pengarang' => $faker->name(),
                'penerbit' => $faker->company(),
                'tahun_terbit' => $faker->numberBetween(2010,2022),
                'genre_buku' => $faker->word(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
