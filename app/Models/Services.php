<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Types::class, 'types_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(ServicesItems::class, 'services_id', 'id');
    }

    public function servicesItems()
    {
        return $this->hasMany(ServicesItems::class, 'services_id', 'id')->whereStatus('1');
    }





}
