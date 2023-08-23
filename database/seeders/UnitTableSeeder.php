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
                'name' => 'Kobelco'
            ], [
                'name' => 'Caterpillar'
            ], [
                'name' => 'Hitachi'
            ], [
                'name' => 'Hyundai'
            ]
        ];

        Unit::insert($units);
    }
}
