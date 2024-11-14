<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['name' => 'Makanan']);
        Kategori::create(['name' => 'Minuman']);
        Kategori::create(['name' => 'Cemilan']);
    }
}