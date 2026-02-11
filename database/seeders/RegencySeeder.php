<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Regency;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Catatan:
     * - Untuk contoh awal, kita hanya mengisi beberapa kabupaten/kota.
     * - Anda dapat menambahkan seluruh daftar kabupaten/kota Indonesia dengan
     *   menambahkan data baru ke array $regencies di bawah ini sesuai kebutuhan.
     */
    public function run(): void
    {
        $byProvince = [
            '11' => [
                ['code' => '1101', 'name' => 'Kabupaten Simeulue'],
                ['code' => '1102', 'name' => 'Kabupaten Aceh Singkil'],
                ['code' => '1171', 'name' => 'Kota Banda Aceh'],
            ],
            '31' => [
                ['code' => '3171', 'name' => 'Kota Jakarta Pusat'],
                ['code' => '3172', 'name' => 'Kota Jakarta Utara'],
                ['code' => '3173', 'name' => 'Kota Jakarta Barat'],
                ['code' => '3174', 'name' => 'Kota Jakarta Selatan'],
                ['code' => '3175', 'name' => 'Kota Jakarta Timur'],
            ],
            '32' => [
                ['code' => '3273', 'name' => 'Kota Bandung'],
                ['code' => '3271', 'name' => 'Kota Bogor'],
                ['code' => '3201', 'name' => 'Kabupaten Bogor'],
                ['code' => '3204', 'name' => 'Kabupaten Bandung'],
            ],
            '34' => [
                ['code' => '3471', 'name' => 'Kota Yogyakarta'],
                ['code' => '3401', 'name' => 'Kabupaten Bantul'],
                ['code' => '3402', 'name' => 'Kabupaten Sleman'],
            ],
        ];

        foreach ($byProvince as $provinceCode => $regencyList) {
            $province = Province::where('code', $provinceCode)->first();
            if (! $province) {
                continue;
            }

            foreach ($regencyList as $regency) {
                Regency::firstOrCreate(
                    ['code' => $regency['code']],
                    [
                        'province_id' => $province->id,
                        'name' => $regency['name'],
                    ]
                );
            }
        }
    }
}

