@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product}}</td>
                    <td>{{$product}}</td>
                    <td>{{$product}}</td>
                    <td>{{$product}}</td>
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
