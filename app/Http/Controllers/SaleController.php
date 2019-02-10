<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Product;
use App\Sale;
use App\Unit;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.viewSale' , compact('sales'));

    }
    public function show(Sale $sale)
    {
        $invoices= Invoice::all()->where('sale_id',$sale->id);
        //dd($invoices);
        return view('sales.show', compact('invoices', 'sale'));
    }
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view ('sales.sale' , compact('customers' , 'products') );
    }
    public  function store(Request $request)
    {
/*        if (\request()->has('cust_id'))
        {
            $unit = new Unit();
            $unit->name = $request['quantity'];
            $unit->save();
        }*/
        $sale = new Sale();
        $invoice = new Invoice();
        $sale_id =$sale->storeSale($request);
        $invoice->storeInvoice($request,$sale_id);
        //dd($request->all());
    }
}
