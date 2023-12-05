<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama_product' => 'MSI Modern 14 C11M - Core i3 1115G4 8GB 512 SSD 14" FHD IPS 100% SRGB',
                'kode_product' => "MSI14C11M",
                'harga_product' => '6674000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_product' => 'ACER ASPIRE 5 SLIM A514 54G - MX350 I3 1115G4 12GB 512SSD 14" W11+OHS ',
                'kode_product' => "ACSPA514",
                'harga_product' => '6729000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_product' => 'LAPTOP MURAH AXIOO MYBOOK Z6 METAL - CORE I3 1215U 16GB 256SSD FHD IPS',
                'kode_product' => "AXOZ6I316",
                'harga_product' => '7649000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_product' => 'LAPTOP INFINIX INBOOK X1 PRO - 17 1065G7 16GB 512SSD IrisXe 14"FHD IPS',
                'kode_product' => "INFXX1716",
                'harga_product' => '7199000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_product' => 'ASUS VIVOBOOK K513EA OLED351 - CORE I3 1115G4 4GB 512SSD W11 15.6" FHD',
                'kode_product' => "ASVBK5I3",
                'harga_product' => '7749000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('products')->insert($products);
    }
}
