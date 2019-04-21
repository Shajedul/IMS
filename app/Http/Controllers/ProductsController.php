<?php

namespace App\Http\Controllers;

use App\Product;
use App\productType;
use App\Supplier;
use App\Unit;
use function GuzzleHttp\Promise\all;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        //dd($product_type);
        return view('products.viewProduct', compact('products') , $product_type);
    }
    public function create()
    {
        $product =null;
        $product_types = productType::all('id' , 'name');
        //dd($product_types);
        $units = Unit::all('id' , 'name');
        $suppliers = Supplier::all('id' , 'name');
        return view('products.addProducts' , compact('suppliers' , 'units' , 'product_types' , 'product'));

    }
    public function store(Request $request)
    {
        if ($request->has('productName')) {
            $data=Product::sendProductSearchResult($request);
            return response()->json(['products'=> $data], 200);
        }
        $product = new Product();
        $product->addProducts($request);
        return redirect('products');
    }
    
    public function edit(Product $product)
    {
        if (Gate::denies('authorizedAdmin'))
        {
            abort(403 , 'You do not have permission to perform this action');
        }
        $product_types = productType::all('id' , 'name');
        $units = Unit::all('id' , 'name');
        $suppliers = Supplier::all('id' , 'name');
        return view('products.addProducts' , compact('suppliers' , 'units' , 'product_types', 'product'));
    }
    
    public  function update(Product $product , Request $request)
    {
        if (Gate::denies('authorizedAdmin'))
        {
            abort(403 , 'You do not have permission to perform this action');
        }
        //return $request;
        $product->editProduct($product, $request);
        return redirect('/products');
    }
    public function destroy(Product $product)
    {
        if (Gate::denies('authorizedAdmin'))
        {
            abort(403 , 'You do not have permission to perform this action');
        }
        //return $product;
        $product->deleteProduct();
        return redirect('/products');
    }
}
