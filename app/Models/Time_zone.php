<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time_zone extends Model
{
    use HasFactory;

    public function userdetails()
    {
        return $this->hasOne(UserDetails::class, 'timezone', 'id');
    }
}
