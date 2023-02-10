<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanerServices extends Model
{
    use HasFactory;


    public function servicesItems()
    {
        return $this->belongsTo(ServicesItems::class, 'services_items_id', 'id');
    }

    public function priceForSqFt($sqFt)
    {
        if (empty( $sqFt ) ) return 0;

        return $this->price * $sqFt;
    }

    public function durationForSqFt($sqFt)
    {
        if (empty( $sqFt ) ) return 0;
        return $this->duration;        
        //return $this->duration * $sqFt;
    }
}
