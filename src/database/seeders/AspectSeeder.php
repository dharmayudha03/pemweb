<?php

namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now()->toDateString();
        $aspect = array(
            array('name' => 'Kebijakan Internal Tata Kelola SPBE', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Perencanaan Strategis SPBE', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Teknologi Informasi dan Komunikasi', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Penyelenggara SPBE', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Penerapan Manajemen SPBE', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Pelaksanaan Audit TIK', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Layanan Administrasi Pemerintahan Berbasis Elektronik', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Layanan Publik Berbasis Elektronik', 'created_at' => $timestamp, 'updated_at' => $timestamp),

        );
        
        DB::table('aspects')->insert($aspect);
    }
}