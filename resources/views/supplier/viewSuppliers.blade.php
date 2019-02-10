@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <label for="add-new-product">New Supplier</label>
            <a href="/suppliers/create" class="btn btn-info" id="add-new-product">
                +
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->phone}}</td>
                    <td>{{$supplier->email}}</td>
                    <td>
                        <form method="post" action="/suppliers/{{$supplier->id}}">
                            @csrf
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn btn-info">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="/suppliers/{{$supplier->id}}/edit">
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
