<?php

namespace App\Http\Controllers;

use App\Product;
use App\productType;
use App\Supplier;
use App\Unit;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index ()
    {
        $products = Product::all();
        $i =0;
        //dd(Unit::find(1));
        //dd($products);
        $product_type[]=null;
        foreach ($products as $product)
        {
            $product_type[$i] = productType::find($product->product_type_id);
            $i++;
        }

        dd($product_type);
        return view('products.viewProducts', compact('products'));
    }
    public function create()
    {
        $product = new Product();
        $product->name = "Butter";
        $product->product_type()->associate(productType::find(1));
        $product->unit()->associate(Unit::find(1));
        $product->price =100;
        $product->supplier()->associate(Supplier::find(1));
        $product->save();
    }
}
