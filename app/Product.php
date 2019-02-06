<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Product_type;

class Product extends Model
{
    public function product_type()
    {
        return $this->belongsTo(Product_type::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public  function suppliers()
    {
        return $this->belongsTo(Product::class);
    }

}
