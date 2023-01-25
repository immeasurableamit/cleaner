<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax',
        'tax_type',
        'transaction_fees',
        'transaction_fee_type',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'stripe_key',
        'stripe_secret_key',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',

    ];
}
