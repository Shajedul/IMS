<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Unit;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {

    }
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view ('sales.sale' , compact('customers' , 'products') );
    }
    public  function addToCart(Request $request)
    {
        if (\request()->has('cust_id'))
        {
            $unit = new Unit();
            $unit->name = $request['quantity'];
            $unit->save();
        }
    }
}
