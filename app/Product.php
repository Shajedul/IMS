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
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        $product = new Product();
        $product->name = $request['product_name'];
        $product->product_type()->associate(productType::find($request['product_type']));
        $product->unit()->associate(Unit::find(($request['unit'])));
        $product->price = $request['price'];
        $product->supplier()->associate(Supplier::find($request['supplier']));
        $product->quantity = $request['quantity'];
        $product->description = $request['description'];
        //dd($product);
        $product->save();
        return redirect('/products/create');

    }
    public function editProduct($product , $request)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        //$product = new Product();
        $product->name = $request['product_name'];
        $product->product_type()->associate(productType::find($request['product_type']));
        $product->unit()->associate(Unit::find(($request['unit'])));
        $product->price = $request['price'];
        $product->supplier()->associate(Supplier::find($request['supplier']));
        $product->quantity = $request['quantity'];
        $product->description = $request['description'];
        //dd($product);
        $product->save();
        return redirect('/products/create');

    }
    public function deleteProduct()
    {
        $this->delete();
    }

}
