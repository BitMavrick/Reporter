<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'owner',
        'main_image',
        'title',
        'introduction',
        'description',
        'secondary_image',
        'video_link',
        'reading_time',
    ];

    public function Blog_tag()
    {
        return $this->belongsToMany(Blog_tag::class);
    }
}