<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'kode' => 'PA',
                'nama' => 'Pigura',
                'deskripsi' => 'Produk Pigura'
            ],
            [
                'kode' => 'LN',
                'nama' => 'Lukisan',
                'deskripsi' => 'Produk Lukisan'
            ],
            [
                'kode' => 'JM',
                'nama' => 'Jam Dinding',
                'deskripsi' => 'Produk Jam Dinding'
            ],
            [
                'kode' => 'CM',
                'nama' => 'Cermin',
                'deskripsi' => 'Produk Cermin'
            ],
        ]);
    }
}
