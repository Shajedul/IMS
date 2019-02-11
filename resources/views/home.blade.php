@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <table>
                            <thead>
                            <tr>
                                <th>Total Sale today</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    {{$totalPrice}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        <div>
                            <h4>Today's best Sale: {{$highestSale}} Taka</h4>
                        </div>
                        <div>
                            <h4>Number of Sale today: {{$totalSales}}</h4>
                        </div>
                        <h2 style="padding: 30px;">Last 3 Sale</h2>

                    <div>
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


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
