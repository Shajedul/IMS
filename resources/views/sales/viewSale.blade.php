@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <label for="add-new-product">New Sale</label>
            <a href="/sale/create" class="btn btn-info" id="add-new-product">
                +
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>Sale Id</th>
                <th>Total Shopping Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->id}}</td>
                    <td>{{App\Customer::find($sale->customer_id)->name}}</td>
                    <td>{{$sale->total}}</td>
                    <td>
                        <form method="get" action="/sale/{{$sale->id}}">
                            @csrf
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn btn-info">View details</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
