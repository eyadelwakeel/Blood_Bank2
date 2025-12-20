<?php

namespace Governorate_user;

use Illuminate\Database\Eloquent\Model;

class Governorate_user extends Model
{

    protected $table = 'governorate_user';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'governorate_id',
    ];

}
