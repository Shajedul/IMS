<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
