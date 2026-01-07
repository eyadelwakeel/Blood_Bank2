<?php

namespace App\Models;

use App\models\City;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }

    public function user()
    {
        return $this->belongsToMany('User', 'user_id');
    }

    // public function donation_request()
    // {
    //     return $this->belongsTo('Donation_requests', 'governorate_id');
    // }

}
