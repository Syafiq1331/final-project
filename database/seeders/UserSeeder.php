<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'farm_place_id' => 1,
            ],
            [
                'name' => 'User',
                'email' => 'user@gmai.com',
                'password' => bcrypt('user'),
                'role' => 'user',
                'farm_place_id' => 1,
            ],
        ];

        foreach ($data as $key => $value) {
            \App\Models\User::create($value);
        }
    }
}
