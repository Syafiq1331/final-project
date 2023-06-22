<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisLahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisLahan = [
            [
                'jenis' => 'Sawah',
                'desc' => 'Lahan yang digunakan untuk menanam padi',
            ],
        ];

        foreach ($jenisLahan as $jenis) {
            \App\Models\JenisLahan::create($jenis);
        }

        $this->command->info('Berhasil menambahkan data jenis lahan');
    }
}
