<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'portfolios';

    protected $fillable = [
        'title', 'description', 'image'
    ];
}
