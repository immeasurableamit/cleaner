<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public    $timestamps = true;

    public function service_item()
    {
        return $this->belongsTo(ServicesItems::class, 'service_item_id', 'id');
    }

    public function cleaner_service()
    {
        return $this->belongsTo( CleanerServices::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
