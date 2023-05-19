<?php

namespace Database\Seeders;

use App\Models\Satis;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'musteri_id' => 1,
                'urun_id' =>1,
                'fiyat'=>20,
                'adet'=>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
       Satis::query()->insert($data);
    }
}
