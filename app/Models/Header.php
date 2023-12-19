<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'headers';

    protected $fillable = [
        'name',
        'as',
        'email',
        'image',
    ];
}
