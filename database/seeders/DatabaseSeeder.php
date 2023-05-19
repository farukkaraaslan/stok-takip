<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Satis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(
            [
                KategorilerSeeder::class,
                UrunlerSeeder::class,
                MusterilerSeeder::class,
                SatisSeeder::class
            ]
        );
    }
}
