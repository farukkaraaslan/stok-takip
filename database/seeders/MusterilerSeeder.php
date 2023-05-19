<?php

namespace Database\Seeders;

use App\Models\Musteriler;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusterilerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'tc_no' => '12345678900',
                'adi' => 'Hasan',
                'soyadi' => 'Bağlan',
                'fatura_no'=>123456,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        Musteriler::query()->insert($data);
    }
}
