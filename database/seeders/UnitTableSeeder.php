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
            ['name' => 'unit 001'],
            [
                'name' => 'unit 002'
            ], [
                'name' => 'unit 003'
            ], [
                'name' => 'unit 004'
            ], [
                'name' => 'unit 005'
            ]
        ];

        Unit::insert($units);
    }
}
