<?php

namespace App\Models;

use App\models\BloodType;
use App\models\Citiy;
use App\models\Governorate;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'age',
        'blood_type_id',
        'longitude',
        'latitude',
        'city_id',
        'phone',
        'notes',
        'hospital_name',
        'bags_number',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo(Citiy::class, 'city_id');
    }

    // public function governorate()
    // {
    //     return $this->hasOneThrough(Governorate::class, Citiy::class, 'id', 'id', 'city_id', 'governorate_id');
    // }

    public function notifications()
    {
        //        return $this->belongsTo(Notification::class, 'donation_request_id');
        // return $this->hasOne(Notification::class, 'donation_request_id');
        return $this->hasMany(Notification::class, 'donation_request_id');
    }

}
