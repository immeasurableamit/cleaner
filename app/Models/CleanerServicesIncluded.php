<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanerServicesIncluded extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo( Services::class, 'service_id', 'id' );
    }

    public function cleaner()
    {
        return $this->belongsTo(User::class, 'cleaner_id', 'id');
    }
}
