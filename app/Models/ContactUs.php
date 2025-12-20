<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ContactUs extends Model
{

    protected $table = 'contact_us';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}