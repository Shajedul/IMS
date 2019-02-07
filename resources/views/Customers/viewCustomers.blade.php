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
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td>
                    <a href="/customers/{{$customer->id}}" class="btn btn btn-info">Delete</a>
                </td>
                <td>
                    <a href="/customers/{{$customer->id}}" class="btn btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
