<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
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

    ];


    public function State()
    {
        return $this->hasOne(State::class, 'id', 'states_id');

    } 
  
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }
<<<<<<< HEAD
=======

>>>>>>> a2142e41ed4df0ffec36a272ee6a2b4b3110b5af
    
    public function time_zone()
    {
        return $this->belongsTo(Time_zone::class, 'timezone', 'id');
    }

    

}
