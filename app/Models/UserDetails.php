<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $with = ['State'];

    protected $fillable = [
        'user_id',
        'states_id',
        'about',
        'dob',
        'ssn_or_tax',
        'address',
        'apt_or_unit',
        'city',
        'zip_code',
        'payment_method',
        'timezone',
        'stripe_customer_id',

    ];

    public function State()
    {
        return $this->belongsTo(State::class, 'states_id', 'id');

    } 
  
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function timeZone()
    {
        return $this->belongsTo(Time_zone::class, 'timezone', 'id');
    }

    

}
