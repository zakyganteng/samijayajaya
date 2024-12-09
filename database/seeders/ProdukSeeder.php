<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'namaproduk' => 'Yellow05PA',
                'kodeproduk' => 'Y05PA',
                'harga' => '24000',
                'unit' => 20,
                'kategori_id' => 1
            ],
            [
                'namaproduk' => 'Red07LN',
                'kodeproduk' => 'R07LN',
                'harga' => '42000',
                'unit' => 25,
                'kategori_id' => 2
            ],
            [
                'namaproduk' => 'Grey01JM',
                'kodeproduk' => 'G01JM',
                'harga' => '64000',
                'unit' => 23,
                'kategori_id' => 3
            ],
            [
                'namaproduk' => 'Sunset05CM',
                'kodeproduk' => 'S05CM',
                'harga' => '74000',
                'unit' => 56,
                'kategori_id' => 4
            ],
            [
                'namaproduk' => 'Blue44LN',
                'kodeproduk' => 'B44LN',
                'harga' => '4200',
                'unit' => 12,
                'kategori_id' => 3
            ],
            
        ]);
    }
}
