<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecomendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $timetamp = Carbon::now()->toDateString();
        $recomend = [
            [
                'indicator_id' => 1,
                'leveling_index_id' => 1,
                'detail_leveling_index_id' => 1,
                'recommend' => 'Kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah telah ditetapkan, namun belum menyeluruh.',
                'created_at' => $timetamp,
                'updated_at' => $timetamp
            ],
            [
                'indicator_id' => 1,
                'leveling_index_id' => 2,
                'detail_leveling_index_id' => 2,
                'recommend' => 'Kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah telah ditetapkan secara menyeluruh.',
                'created_at' => $timetamp,
                'updated_at' => $timetamp
            ],
            [
                'indicator_id' => 1,
                'leveling_index_id' => 3,
                'detail_leveling_index_id' => 3,
                'recommend' => '1. Kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah yang telah mengatur pengintegrasian antar instansi.
                2. Reviu dan evaluasi Kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah',
                'created_at' => $timetamp,
                'updated_at' => $timetamp
            ],
            [
                'indicator_id' => 1,
                'leveling_index_id' => 4,
                'detail_leveling_index_id' => 4,
                'recommend' => 'Penyempurnaan/Revisi Kebijakan internal Arsitektur SPBE Instansi Pusat/Pemerintah Daerah',
                'created_at' => $timetamp,
                'updated_at' => $timetamp
            ],
            [
                'indicator_id' => 2,
                'leveling_index_id' => 7,
                'detail_leveling_index_id' => 7,
                'recommend' => 'Kebijakan internal yang mendukung pengaturan Peta Rencana SPBE yang mencakup keseluruhan muatan Peta Rencana SPBE',
                'created_at' => $timetamp,
                'updated_at' => $timetamp
            ],
            [
                'indicator_id' => 2,
                'leveling_index_id' => 8,
                'detail_leveling_index_id' => 8,
                'recommend' => 'Arah kebijakan pengaturan penyusunan Peta Rencana SPBE Instansi Pusat/Pemerintah Daerah selaras dengan Peta Rencana SPBE Nasional',
                'created_at' => $timetamp,
                'updated_at' => $timetamp
            ],
            [
                'indicator_id' => 2,
                'leveling_index_id' => 9,
                'detail_leveling_index_id' => 9,
                'recommend' => 'Tindak lanjut hasil reviu dan evaluasi kebijakan Peta Rencana SPBE dengan menetapkan kebijakan baru agar sesuai dengan kebutuhan Instansi Pusat/Pemerintah Daerah ataupun perubahan lingkungan dan teknologi',
                'created_at' => $timetamp,
                'updated_at' => $timetamp
            ],
        ];

        DB::table('recomendations')->insert($recomend);
    }
}
