@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Unit name</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Edit item</th>
                <th>Delete Item</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{App\productType::find($product->product_type_id)->name}}</td>
                    <td>{{App\Unit::find($product->unit_id)->name}}</td>
                    <td>{{App\Supplier::find($product->supplier_id)->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="/customers/{{$product->id}}" class="btn btn btn-info">Delete</a>
                    </td>
                    <td>
                        <a href="/customers/{{$product->id}}" class="btn btn btn-info">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Unit name</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Edit item</th>
                <th>Delete Item</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{App\productType::find($product->product_type_id)->name}}</td>
                    <td>{{App\Unit::find($product->unit_id)->name}}</td>
                    <td>{{App\Supplier::find($product->supplier_id)->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="/customers/{{$product->id}}" class="btn btn btn-info">Delete</a>
                    </td>
                    <td>
                        <a href="/customers/{{$product->id}}" class="btn btn btn-info">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
