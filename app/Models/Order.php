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


    protected $commissionPercentage = 20; // for owner

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

     public function state()
    {
        return $this->belongsTo(State::class);

    }

    public function review()
    {
        return $this->hasOne(Review::class);
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
        return $this->belongsTo( Transaction::class, 'user_transaction_id');
    }

    public function cleanerTransaction()
    {
        return $this->belongsTo( Transaction::class, 'cleaner_transaction_id' );
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

public function favourite()
{
    return $this->belongsTo(Favourite::class, 'cleaner_id', 'id');
}

    public function statusForCleaner()
    {
        $statuses = [
            'pending'   => 'Accept order',
            'accepted'  => 'Collect payment',
            'rejected'  => 'Refused',
            'cancelled' => 'Cancelled',
            'cancelled_by_customer' => 'Customer cancelled',
            'payment_collected' => 'Payment collected',
            'completed' => 'Completed',
            'reviewed'  => 'Completed and Reviewed'

        ];

        return $statuses[ $this->status ];
    }

    public function statusForCustomer()
    {
        $statuses = [
            'pending'   => 'Pending',
            'accepted'  => 'Accepted',
            'rejected'  => 'Cancelled by cleaner',
            'cancelled' => 'Cancelled by cleaner',
            'cancelled_by_customer' => 'Cancelled by you',
            'payment_collected' => 'Accepted',
            'completed' => 'Completed',
            'reviewed'  => 'Completed'
        ];

        return $statuses[ $this->status ];
    }

     public function statusForAdmin()
    {
        $statuses = [
            'pending'   => 'Pending',
            'accepted'  => 'Accepted',
            'rejected'  => 'Cancelled by cleaner',
            'cancelled' => 'Cancelled by cleaner',
            'cancelled_by_customer' => 'Cancelled by customer',
            'payment_collected' => 'Accepted',
            'completed' => 'Completed',
            'reviewed'  => 'Completed'
        ];

        return $statuses[ $this->status ];
    }

    public function service()
    {
        return $this->items->pluck('service_item')->flatten()->pluck('service')->where('types_id',1)->first();
    }
}
