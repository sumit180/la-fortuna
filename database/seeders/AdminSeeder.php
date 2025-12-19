<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Sumit Singh',
            'email' => 'sumitsingh180@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
