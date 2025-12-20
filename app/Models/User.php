<?php

namespace App\Models;

use App\Models\BloodType;
use App\Models\DonationRequest;
use App\Models\Notification;
use App\Models\Citiy;
use App\Models\Governorate;
use App\Models\ContactUs;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'last_donation_date',
        'phone',
        'password',
        'blood_type_id',
        'city_id',
    ];

    public function bloodTypes()
    {
        return $this->belongsToMany(BloodType::class, 'blood_type_user','user_id','blood_type_id');
    }
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo(Citiy::class, 'city_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function contact_us()
    {
        return $this->hasMany(ContactUs::class);
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class)->withPivot('is_read')->withTimestamps();
    }

    public function governorates()
    {
        return $this->belongsToMany(Governorate::class, 'governorate_user', 'user_id', 'governorate_id');
    }

    public function donation_requests()
    {
        return $this->hasMany(DonationRequest::class);
    }
    /**
     * Specifies the user's FCM tokens
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->getDevicesTokens();
    }
    public function getDevicesTokens():array
    {
        return $this->tokens()->pluck('fcm_token')->toArray();
    }

}
