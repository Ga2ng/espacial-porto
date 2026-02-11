<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'Aceh', 'code' => '11'],
            ['name' => 'Sumatera Utara', 'code' => '12'],
            ['name' => 'Sumatera Barat', 'code' => '13'],
            ['name' => 'Riau', 'code' => '14'],
            ['name' => 'Jambi', 'code' => '15'],
            ['name' => 'Sumatera Selatan', 'code' => '16'],
            ['name' => 'Bengkulu', 'code' => '17'],
            ['name' => 'Lampung', 'code' => '18'],
            ['name' => 'Kepulauan Bangka Belitung', 'code' => '19'],
            ['name' => 'Kepulauan Riau', 'code' => '21'],
            ['name' => 'DKI Jakarta', 'code' => '31'],
            ['name' => 'Jawa Barat', 'code' => '32'],
            ['name' => 'Jawa Tengah', 'code' => '33'],
            ['name' => 'DI Yogyakarta', 'code' => '34'],
            ['name' => 'Jawa Timur', 'code' => '35'],
            ['name' => 'Banten', 'code' => '36'],
            ['name' => 'Bali', 'code' => '51'],
            ['name' => 'Nusa Tenggara Barat', 'code' => '52'],
            ['name' => 'Nusa Tenggara Timur', 'code' => '53'],
            ['name' => 'Jawa Tengah', 'code' => '33'],
            ['name' => 'DI Yogyakarta', 'code' => '34'],
            ['name' => 'Jawa Timur', 'code' => '35'],
            ['name' => 'Banten', 'code' => '36'],
            ['name' => 'Bali', 'code' => '51'],
            ['name' => 'Nusa Tenggara Barat', 'code' => '52'],
            ['name' => 'Nusa Tenggara Timur', 'code' => '53'],
            ['name' => 'Kalimantan Barat', 'code' => '61'],
            ['name' => 'Kalimantan Tengah', 'code' => '62'],
            ['name' => 'Kalimantan Selatan', 'code' => '63'],
            ['name' => 'Kalimantan Timur', 'code' => '64'],
            ['name' => 'Kalimantan Utara', 'code' => '65'],
            ['name' => 'Sulawesi Utara', 'code' => '71'],
            ['name' => 'Sulawesi Tengah', 'code' => '72'],
            ['name' => 'Sulawesi Selatan', 'code' => '73'],
            ['name' => 'Sulawesi Tenggara', 'code' => '74'],
            ['name' => 'Gorontalo', 'code' => '75'],
            ['name' => 'Sulawesi Barat', 'code' => '76'],
            ['name' => 'Maluku', 'code' => '81'],
            ['name' => 'Maluku Utara', 'code' => '82'],
            ['name' => 'Papua', 'code' => '91'],
            ['name' => 'Papua Barat', 'code' => '92'],
        ];

        foreach ($provinces as $province) {
            Province::firstOrCreate(
                ['code' => $province['code']],
                ['name' => $province['name']]
            );
        }
    }
}

