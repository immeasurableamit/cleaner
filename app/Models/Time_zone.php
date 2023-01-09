<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserDetails;

class Time_zone extends Model
{
    use HasFactory;

    protected $table = 'time_zones';

    public function userdetails()
    {
        return $this->hasOne(UserDetails::class, 'timezone', 'id');
    }
}
