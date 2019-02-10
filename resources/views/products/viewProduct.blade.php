@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <label for="add-new-product">Add New Product</label>
            <a href="/products/create" class="btn btn-info" id="add-new-product">
                    +
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Unit name</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Delete item</th>
                <th>Edit Item</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{App\productType::find($product->product_type_id)->name}}</td>
                    <td>{{App\Unit::find($product->unit_id)->name}}</td>
                    <td>{{\App\Supplier::find($product->supplier_id)->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <form method="post" action="/products/{{$product->id}}">
                            @csrf
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn btn-info">Delete</button>
                        </form>

                    </td>
                    <td>
                        <form method="get" action="/products/{{$product->id}}/edit">
                            @csrf
                            <button type="submit" class="btn btn btn-info">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
