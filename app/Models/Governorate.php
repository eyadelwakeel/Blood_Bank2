<?php

namespace App\Models;

use App\models\Citiy;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public function city()
    {
        return $this->hasMany(Citiy::class, 'governorate_id');
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
