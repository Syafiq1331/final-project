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
                'name' => 'Cilangkap Farm',
                'address' => 'Jl. Cilangkap Raya No. 1, Cilangkap, Jakarta Timur',
            ],
            [
                'name' => 'Cibubur Farm',
                'address' => 'Jl. Cibubur Raya No. 1, Cibubur, Jakarta Timur',
            ],
            [
                'name' => 'Cipayung Farm',
                'address' => 'Jl. Cipayung Raya No. 1, Cipayung, Jakarta Timur',
            ],
            [
                'name' => 'Ciracas Farm',
                'address' => 'Jl. Ciracas Raya No. 1, Ciracas, Jakarta Timur',
            ],
            [
                'name' => 'Cijantung Farm',
                'address' => 'Jl. Cijantung Raya No. 1, Cijantung, Jakarta Timur',
            ]

        ];

        foreach ($FarmPlace as $key => $value) {
            \App\Models\FarmPlace::create($value);
        }
    }
}
