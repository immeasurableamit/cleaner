<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    const SUCCESS_STATUS = 'success';
    const FAILED_STATUS  = 'failed';

    public function transactionable()
    {
        return $this->morphTo();
    }
}
