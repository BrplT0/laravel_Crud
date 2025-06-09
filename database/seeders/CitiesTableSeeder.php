<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'New York'],
            ['name' => 'London'],
            ['name' => 'Paris'],
            ['name' => 'Tokyo'],
            ['name' => 'Berlin'],
        ];

        DB::table('cities')->insert($cities);
    }
} 