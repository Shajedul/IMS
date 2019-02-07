<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_type;
use App\productType;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $product= Product::find(1);

        return $product;
    }
    public function store( )
    {

        //dd(Product_type::find(1));
        $product = new Product();
        $product->name = "Butter";
        $product->product_type()->associate(productType::find(1));
        $product->unit()->associate(Unit::find(2));
        $product->price =100;
        $product->supplier()->associate(Supplier::find(1));
        $product->save();
    }
}
