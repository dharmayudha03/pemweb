<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Aktifitas;
use App\Models\BeratBadan;
use App\Models\PolaMakan;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $aktivitasList = ['Lari', 'Bersepeda', 'Renang', 'Angkat Beban', 'Yoga', 'Senam'];
        $makananList = ['Salad Sayur', 'Ikan Panggang', 'Oatmeal dengan Buah', 'Smoothie Hijau', 'Tahu dan Tempe', 'Sup Ayam'];

        Role::firstOrCreate(['name' => 'Pasien']);

        User::factory(10)->create()->each(function ($user) use ($aktivitasList, $makananList) {
            $user->assignRole('Pasien');

            Aktifitas::create([
                'user_id' => $user->id,
                'jenis_aktivitas' => $aktivitasList[array_rand($aktivitasList)],
                'durasi' => rand(30, 90),
                'jarak' => rand(3, 10),
                'kalori' => rand(200, 600)
            ]);

            BeratBadan::create([
                'user_id' => $user->id,
                'berat' => rand(50, 100),
                'tanggal' => now()
            ]);

            PolaMakan::create([
                'user_id' => $user->id,
                'makanan' => $makananList[array_rand($makananList)],
                'kalori' => rand(300, 800),
                'waktu_makan' => now()
            ]);
        });

        $user = User::factory()->create([
            'name' => 'Dharmayudha',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $user->assignRole('super_admin');
    }
}
