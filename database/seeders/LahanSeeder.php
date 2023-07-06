<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Lahan 1',
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'image' => 'https://i.pinimg.com/originals/0a/0e/6a/0a0e6a0b2b5b5b0b0b0b0b0b0b0b0b0b.jpg',
                'plantTime' => '2021-01-01',
                'harvestTime' => '2021-01-01',
                'farm_place_id' => 1,
                'jenisLahan_id' => 1,
            ],
        ];

        foreach ($data as $key => $value) {
            \App\Models\Lahan::create($value);
        }
    }
}
