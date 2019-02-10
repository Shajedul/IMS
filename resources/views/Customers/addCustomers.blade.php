@extends('layouts.app')

@section('content')
    <div class="container">
        <div >
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>

        </div>
        <form method="post" action="{{$customer==null?"/customers":"/customers/".$customer->id}}">
            @csrf
            @if(!$customer==null)
                @method('PATCH')
            @endif
            <div class="container  w-50 h-50 mb-5">

                <div class="form-group">
                    <label for="customer-name">{{'Customer Name'}}</label>
                    <input type="text" value="{{ $customer==null?old('name'):$customer->name}}"  name="name" class="form-control" id="customer-name"  placeholder="Customer Name" required>
                </div>

                <div class="form-group">
                    <label for="customer-phone">customer Phone</label>
                    <input type="text" value="{{ $customer==null?old('phone'):$customer->phone}}" name="phone" class="form-control" id="customer-phone" placeholder="Customer Phone" required>
                </div>

                <div class="form-group">
                    <label for="customer-email">Customer E-mail</label>
                    <input type="email"  name="email" value="{{ $customer==null?old('email'):$customer->email}}" class="form-control" id="customer-email" placeholder="customer Email" required>
                </div>

                <div class="form-group">
                    <label for="customer-address">Customer Address</label>
                    <input type="text"  name="address" value="{{ $customer==null?old('address'):$customer->address}}"class="form-control" id="customer-address" placeholder="customer Address">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
