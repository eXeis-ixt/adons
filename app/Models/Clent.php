<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clent extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'image',
        'status',
    ];
}
