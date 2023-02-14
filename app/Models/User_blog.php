<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_blog extends Model
{
    use HasFactory;

    protected $table = 'blog_user';

    protected $fillable = [
        'blog_id',
        'user_username',
    ];
}