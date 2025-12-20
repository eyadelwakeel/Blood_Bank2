<?php

namespace App\Models;

use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BloodType extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public function bloodTypeUsers()
    {
        return $this->hasMany(User::class, 'blood_type_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'blood_type_user','blood_type_id','user_id');
    }

    public function donation_request()
    {
        return $this->belongsTo(DonationRequest::class);
    }

}
