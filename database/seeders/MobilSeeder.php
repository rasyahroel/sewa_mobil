<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'merek' => 'Toyota',
                'model' => 'Avanza',
                'nomor_plat' => 'B 1234 AB',
                'tarif_sewa' => 200000,
            ],
            [
                'merek' => 'Honda',
                'model' => 'Jazz',
                'nomor_plat' => 'B 5678 CD',
                'tarif_sewa' => 250000,
            ],
            // Tambahkan data dummy mobil lainnya sesuai kebutuhan
        ];

        Mobil::insert($data);
    }
}
