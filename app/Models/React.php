<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    use HasFactory;

    protected $table = 'reacts';

    protected $fillable = [
        'blog_id',
        'user_username',
    ];
}