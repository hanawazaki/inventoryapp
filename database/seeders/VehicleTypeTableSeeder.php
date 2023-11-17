<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle = [
            [
                'name' => 'Tracked Excavator',
                'image' => null,
                'unit_id' => 1
            ],
            [
                'name' => 'Bulldozer',
                'image' => null,
                'unit_id' => 1
            ],
            [
                'name' => 'Double Cabin',
                'image' => null,
                'unit_id' => 2
            ],
            [
                'name' => 'Truck',
                'image' => null,
                'unit_id' => 3
            ]
        ];

        VehicleType::insert($vehicle);
    }
}
