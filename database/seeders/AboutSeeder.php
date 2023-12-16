<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Tentang Saya',
            'description' => 'Saya memiliki keahlian mengerjakan pemrograman web dengan baik. Berpengalaman selama 2 tahun
            menggunakan framework Laravel untuk mengerjakan beberapa jenis website, mulai dari perorangan hingga
            perusahaan. Kemampuan saya saat ini dapat membatu saya untuk berkembang di lingkungan manapun.',
            'full_name' => 'Sulthan Alif Hayatyo',
            'birth' => Carbon::createFromFormat('Y-m-d', '2001-01-09'),
            'email' => 'sulthanalif45@gmail.com',
            'image' => 'true-agency.jpg',
            'is_active' => 1
        ]);
    }
}
