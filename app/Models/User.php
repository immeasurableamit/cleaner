<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'email',
        'password',
        'image',
        'contact_number',
        'status',
        'email_verified_at',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'name',
    ];

    protected $with = ['UserDetails'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function UserDetails()

    {
        return $this->hasOne(UserDetails::class, 'user_id', 'id');
    }

    public function cleanerTeam()
    {
        return $this->hasMany(CleanerTeam::class, 'user_id', 'id');
    }

    public function cleanerHours()
    {
        return $this->hasMany(CleanerHours::class, 'users_id', 'id');
    }


    public static function getDays()
    {
        return ['Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday'];
    }

    public function bankInfo()
    {
        return $this->hasOne(BankInfo::class, 'users_id', 'id');
    }

}
