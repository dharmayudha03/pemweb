<?php

namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now()->toDateString();
        $subject = array(
            array('name' => 'Kabupaten Maros', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Kabupaten Luwu', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Kabupaten Bulukumba', 'created_at' => $timestamp, 'updated_at' => $timestamp),
            array('name' => 'Kabupaten Sinjai', 'created_at' => $timestamp, 'updated_at' => $timestamp),
        );
        
        DB::table('subjects')->insert($subject);
        
    }
}