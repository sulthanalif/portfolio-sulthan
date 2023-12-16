<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Header::create([
            'name' => 'Sulthan',
            'as' => 'Back-end Developer',
            'email' => 'sulthanalif45@gmail.com',
            'image' => 'sulthan.png',
            'is_active' => 1,
        ]);
    }
}
