<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Penjualan oleh Admin (user_id: 1)
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'pembeli' => 'Budi Santoso',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => Carbon::now()->subDays(10),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 1,
                'pembeli' => 'Dewi Lestari',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => Carbon::now()->subDays(8),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 1,
                'pembeli' => 'Hendra Wijaya',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => Carbon::now()->subDays(5),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 1,
                'pembeli' => 'Lina Susanti',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => Carbon::now()->subDays(3),
            ],

            // Penjualan oleh Manager (user_id: 2)
            [
                'penjualan_id' => 5,
                'user_id' => 2,
                'pembeli' => 'Siti Aminah',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => Carbon::now()->subDays(9),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 2,
                'pembeli' => 'Andi Pratama',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => Carbon::now()->subDays(6),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 2,
                'pembeli' => 'Ratna Dewi',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => Carbon::now()->subDays(4),
            ],

            // Penjualan oleh Staff/Kasir (user_id: 3)
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Rudi Hartono',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => Carbon::now()->subDays(7),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Maya Sari',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => Carbon::now()->subDays(5),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Dedi Kurniawan',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => Carbon::now()->subDays(2),
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
