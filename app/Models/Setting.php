<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;

     protected $fillable = [
        'phone',
        'email',
        'fb_url',
        'x_url',
        'app_store_url',
        'youtube_url',
        'about_app',
    ];
}