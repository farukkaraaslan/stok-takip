<?php

namespace Database\Seeders;

use App\Models\Urunler;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrunlerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'adi' => 'MSI Laptop',
                'adet' => 20,
                'fiyat' => 20,
                'kategori_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [

                'adi' => 'LCW Tshirt',
                'adet' => 20,
                'fiyat' => 20,
                'kategori_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        Urunler::query()->insert($data);
    }
}
