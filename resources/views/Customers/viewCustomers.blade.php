@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <label for="add-new-product">Add New Customer</label>
            <a href="/customers/create" class="btn btn-info" id="add-new-product">
                +
            </a>
        </div>
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
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    <form method="post" action="/customers/{{$customer->id}}">
                        @csrf
                        {{method_field('delete')}}
                        <button type="submit" class="btn btn btn-info">Delete</button>
                    </form>
                </td>
                <td>
                    <form method="get" action="/customers/{{$customer->id}}/edit">
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
