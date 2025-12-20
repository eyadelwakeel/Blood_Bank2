<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DonationRequest;
use App\Models\User;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'message',
        'donation_request_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'notification_user', 'notification_id', 'user_id');
    }

    public function donation_request()
    {

        return $this->belongsTo(DonationRequest::class, 'donation_request_id');
    }

}
