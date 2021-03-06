<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product_type()
    {
        return $this->belongsTo(productType::class);
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
    public function invoice()
    {
        return $this->hasMany(Product::class);
    }
    public static function sendProductSearchResult($request)
    {
        $products[]=null;
        if ($request['productName']==null)
        {
            //dd('i have been accessed');
            $searchedProducts = Product::all();
        }
        else
        {
            $searchedProducts = Product::where('name', 'LIKE',  '%' .$request['productName']. '%')->get();

        }
/*        if ($searchedProducts==null)
        {
            return $products[]=null;
        }*/
        $i =0;
        foreach ($searchedProducts as $product)
        {
            $products[$i] =[
                'id' => $product->id,
                'name' => $product->name,
                'productType' => productType::find($product->product_type_id)->name,
                'unit' => Unit::find($product->unit_id)->name,
                'supplier' => Supplier::find($product->supplier_id)->name,
                'price' => $product->price,
                'stock' =>$product->quantity
            ];
            $i++;

        }
        return $products;

    }

}
