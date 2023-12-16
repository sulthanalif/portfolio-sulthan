<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory,UuidTrait;

    protected $table = 'contacts';

    protected $fillable = [
        'title', 'number', 'email', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'cr'
    ];
}
