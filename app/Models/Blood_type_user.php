<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Blood_type_user extends Model
{

    protected $table = 'blood_type_user';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'blood_type_id',
    ];

}
