@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="container  w-50 h-50 mb-5">

                <div class="form-group">
                    <label for="customer-name">{{'Customer Name'}}</label>
                    <input type="text"  name="customer_name" class="form-control" id="customer-name" placeholder="Customer Name">
                </div>

                <div class="form-group">
                    <label for="customer-phone">customer Phone</label>
                    <input type="text"  name="customer_phone" class="form-control" id="customer-phone" placeholder="Customer Phone">
                </div>

                <div class="form-group">
                    <label for="customer-email">Customer E-mail</label>
                    <input type="email"  name="customer_email" class="form-control" id="customer-email" placeholder="customer Email">
                </div>

                <div class="form-group">
                    <label for="customer-address">Customer E-mail</label>
                    <input type="text"  name="customer_address" class="form-control" id="customer-address" placeholder="customer Email">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
