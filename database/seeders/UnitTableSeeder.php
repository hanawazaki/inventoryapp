<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Komatsu'],
            [
                'name' => 'Toyota'
            ], [
                'name' => 'Hino'
            ]
        ];

        Unit::insert($units);
    }
}
