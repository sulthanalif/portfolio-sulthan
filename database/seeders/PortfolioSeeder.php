<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'title' => 'Aplikasi Web SPK dengan metode SAW',
            'description' => 'Aplikasi ini saya buat karena penasaran dengan mata kuliah SPK, dibuat menggunakan framework Laravel',
            'image' => 'spk.png',
            'is_active' => 1
        ]);
    }
}
