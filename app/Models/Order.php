<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Transaction;

class Order extends Model
{
    use HasFactory;

    

    protected $guarded = [];
    protected $appends = ['name'];


    protected $commissionPercentage = 2; // for owner

    protected $casts = [
	    'cleaning_datetime' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cleaner()
    {
        return $this->belongsTo(User::class, 'cleaner_id', 'id');
    }

    public function service_item()
    {
        return $this->belongsTo(ServicesItems::class);
    }

 
    public function items()
    {
        return $this->hasMany( OrderItem::class );
    }

    public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function totalInCents()
    {
        return $this->total * 100;
    }

    public function ownerCommission()
    {
        return $this->total / 100 * $this->commissionPercentage;
    }

    public function cleanerFee()
    {
        return $this->total - $this->ownerCommission();
    }

    public function userTransaction()
    {
        return $this->hasOne( Transaction::class, 'user_id', 'user_id' );        
    }

    public function cleanerTransaction()
    {
        return $this->hasOne( Transaction::class, 'user_id', 'cleaner_id' );        
    }
}
