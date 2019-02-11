@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <label for="add-new-product">New Sale</label>
            <a href="/sale/create" class="btn btn-info" id="add-new-product">
                +
            </a>
        </div>
        <h1 class="form-group">Sale ID: {{$sale->id}} </h1>
        <h1 class="form-group">Customer Name: {{App\Customer::find($sale->customer_id)->name}} </h1>
        <table class="table">
            <thead>
            <tr>
                <th>Product name</th>
                <th>Product price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{App\Product::find($invoice->product_id)->name}}</td>
                    <td>{{App\Product::find($invoice->product_id)->price}}</td>
                    <td>{{$invoice->quantity}}</td>
                    <td>{{$invoice->totalPrice}}</td>
                    <td>{{$invoice->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
