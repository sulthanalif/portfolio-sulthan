<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function getHeader()
    {
        return Header::where('is_active', 1)->first();
    }

    public function getAbout()
    {
        return About::where('is_active', 1)->first();
    }

    public function getContact()
    {
        return Contact::where('is_active', 1)->first();
    }

    // public function getSkill()
    // {
    //     return Skill::get();
    // }

    public function getPortfolio()
    {
        return Portfolio::get();
    }
}
