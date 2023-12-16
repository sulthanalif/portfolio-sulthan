<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'title' => 'Kontak Saya',
            'number' => '+62 8212-0711-662',
            'email' => 'sulthanalif45@gmail.com',
            'instagram' => 'https://www.instagram.com/sulthanalif.h/',
            'linkedin' => 'https://www.linkedin.com/in/sulthanalifh/',
            'cr' => 'Sulthan Portfolio',
            'is_active' => 1
        ]);
    }
}
