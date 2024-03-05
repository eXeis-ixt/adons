<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','image', 'slug', 'des', 'icon_class', 'short_des', 'status', 'keywords', 'meta_description'
    ];

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->short_des), 70);
    }

}
