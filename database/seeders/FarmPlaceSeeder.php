<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $FarmPlace = [
            [
                'name' => 'Farm Place 1',
                'address' => 'Jl. Farm Place 1',
            ],
            [
                'name' => 'Farm Place 2',
                'address' => 'Jl. Farm Place 2',
            ],
            [
                'name' => 'Farm Place 3',
                'address' => 'Jl. Farm Place 3',
            ],
            [
                'name' => 'Farm Place 4',
                'address' => 'Jl. Farm Place 4',
            ],
            [
                'name' => 'Farm Place 5',
                'address' => 'Jl. Farm Place 5',
            ],
        ];

        foreach ($FarmPlace as $key => $value) {
            \App\Models\FarmPlace::create($value);
        }
    }
}
