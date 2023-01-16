<?php

namespace App\Models;

use App\Http\Livewire\Admin\Support\SupportService;
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
            'payment_failed'    => 'Payment failed',
            'completed' => 'Completed',
            'reviewed'  => 'Completed and Reviewed',

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
            'payment_failed'    => 'Payment failed',
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


    /* to use this function following relationship should be loaded, example: Order::with('items.service_item.service') */

    public function service()
    {
        return $this->items->pluck('service_item')->flatten()->pluck('service')->where('types_id',1)->first();
    }

    /*
     * An order has one order_item that is the main
     * service rest of them are addons.
     *
     * This function returns that specific order_item.
     *
     */
    public function serviceOrderItem()
    {
        $item = $this->items->first( function( $item ) {
            return $item->service_item->service->types_id == 1;
        });

        return $item;
    }


    /* To use this function following relationship should be loaded, example: Order::with('items.service_item.service') */
    public function addonsOrderItems()
    {
        $items = $this->items->filter(function($order_item){
            return $order_item->service_item->service->types_id == 2; // type id 2 means addon
        })->values();

        return $items;
    }

    public function supportService()
    {
        return $this->hasMany( SupportService::class );
    }


}
