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
    public function storeSale ($request)
    {
        //dd($request['C']);
        $grandTotal = 0;

       $this->customer()->associate(Customer::find($request['Customer_name']));
       foreach ($request['total_price'] as $price)
       {
           $grandTotal=$price+$grandTotal;
       }
       $this->total = $grandTotal;
       $this->save();
       return $this->id;

    }
}
