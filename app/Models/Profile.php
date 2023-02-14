<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'username',
        'mail',
        'cover_image',
        'occupation',
        'about_you',
        'address',
        'twitter_handle',
    ];
}