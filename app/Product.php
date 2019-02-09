<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Product_type;
use Illuminate\Http\Request;

class Product extends Model
{
    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public  function supplier()
    {
        return $this->belongsTo(Product::class);
    }
    public function addProducts($request)
    {
        //$product = new Product();
        echo $request;
    }

}
