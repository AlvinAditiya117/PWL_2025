<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Elektronik (ELEC)
            [
                'barang_id' => 1,
                'kategori_id' => 1, // Elektronik
                'barang_kode' => 'ELEC001',
                'barang_nama' => 'Headphone Vivo',
                'harga_beli' => 800000,
                'harga_jual' => 1200000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'ELEC002',
                'barang_nama' => 'Laptop Asus',
                'harga_beli' => 7000000,
                'harga_jual' => 8500000,
            ],

            // Fashion (FASH)
            [
                'barang_id' => 3,
                'kategori_id' => 2, // Fashion
                'barang_kode' => 'FASH001',
                'barang_nama' => 'Kaos Polos',
                'harga_beli' => 50000,
                'harga_jual' => 100000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'FASH002',
                'barang_nama' => 'Jaket Denim',
                'harga_beli' => 150000,
                'harga_jual' => 250000,
            ],

            // Makanan (FOOD)
            [
                'barang_id' => 5,
                'kategori_id' => 3, // Makanan
                'barang_kode' => 'FOOD001',
                'barang_nama' => 'Nasi Goreng',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'FOOD002',
                'barang_nama' => 'Mie Ayam',
                'harga_beli' => 8000,
                'harga_jual' => 12000,
            ],

            // Otomotif (AUTO)
            [
                'barang_id' => 7,
                'kategori_id' => 4, // Otomotif
                'barang_kode' => 'AUTO001',
                'barang_nama' => 'Oli Mesin',
                'harga_beli' => 30000,
                'harga_jual' => 45000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'AUTO002',
                'barang_nama' => 'Ban Motor',
                'harga_beli' => 100000,
                'harga_jual' => 150000,
            ],

            // Rumah Tangga (HOME)
            [
                'barang_id' => 9,
                'kategori_id' => 5, // Rumah Tangga
                'barang_kode' => 'HOME001',
                'barang_nama' => 'Setrika Philips',
                'harga_beli' => 200000,
                'harga_jual' => 300000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'HOME002',
                'barang_nama' => 'Blender Miyako',
                'harga_beli' => 250000,
                'harga_jual' => 350000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
