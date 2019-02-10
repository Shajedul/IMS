<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Invoice extends Model
{
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function storeInvoice($request , $sale_id)
    {
        //$invoice = new Invoice();
        $i=0;
       // dd($request['quantity'][$i]);
        //dd($request->product_id);
        $loop_size=sizeof($request->product_id);
        for ($i=0; $i<$loop_size;$i++)
        {
            $invoice =new Invoice();
            $invoice->sale()->associate(Sale::find($sale_id));
            $invoice->product()->associate(Product::find($request['product_id'][$i]));
            $invoice->quantity = $request['quantity'][$i];
            $invoice->totalPrice = $request['total_price'][$i];
            $invoice->user()->associate(User::find(Auth::id()));
            $invoice->save();
        }
       /* foreach ( as $product)
        {

           $i++;
        }*/
    }
}
