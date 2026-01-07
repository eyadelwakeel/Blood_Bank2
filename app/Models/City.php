<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;
use App\Models\DonationRequest;

class City extends Model
{

    protected $table = 'cities';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'governorate_id',
    ];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'city_id');
    }

    public function donation_requests()
    {
        return $this->hasMany(DonationRequest::class, 'city_id');
    }

}
