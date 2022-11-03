<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanerTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'insured',
        'address',
        'ssn_or_tax',
     
    ];


    protected $appends = [
        'name'
    ];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


   
}
