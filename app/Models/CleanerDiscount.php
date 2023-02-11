<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanerDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'discounts_id',
        'discount',
    ];

    public function cleaner()
    {
        return $this->belongsTo( User::class, 'user_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo( Services::class, 'services_id', 'id');
    }
}
