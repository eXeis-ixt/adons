<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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
    'status',
    'keywords', 'meta_description'];


    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->title), 40);
    }
//     protected $casts = [
//         'created_at' => 'datetime',
//     ];
//  public function scopePublished($query)
//     {
//         $query->where('created_at', '<=', Carbon::now());
//     }

}
