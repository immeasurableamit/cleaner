<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    const ONE_TIME_SERVICE_TYPE = 1;
    const CUSTOM_SERVICES_TYPE = 3;

    public function services()
    {
        return $this->hasMany(Services::class, 'types_id', 'id')->whereStatus('1');
    }

}
