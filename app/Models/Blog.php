<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'slug',
    'category_id',
    'author',
    'image',
    'content',
    'status',];


//     protected $casts = [
//         'created_at' => 'datetime',
//     ];
//  public function scopePublished($query)
//     {
//         $query->where('created_at', '<=', Carbon::now());
//     }

}
