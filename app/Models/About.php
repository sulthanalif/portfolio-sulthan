<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory,UuidTrait;

    protected $table = 'abouts';

    protected $fillable = [
        'title', 'description', 'full_name', 'birth', 'email', 'image', 'is_active'
    ];
}
