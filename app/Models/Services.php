<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;


    public function items()
    {
        return $this->hasMany(ServicesItems::class, 'services_id', 'id');
    }

}
