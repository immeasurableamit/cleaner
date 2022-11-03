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
        'payment_method'

    ];


    public function State()
    {
        return $this->hasOne(State::class, 'id', 'states_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }
    public function cleanerTeam()
    {
        return $this->hasOne(CleanerTeam::class, 'user_id', 'id');
    }
    
}
