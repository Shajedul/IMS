@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="container  w-50 h-50 mb-5">

                <div class="form-group">
                    <label for="supplier-name">Supplier Name</label>
                    <input type="text"  name="user_name" class="form-control" id="user-mane" placeholder="User Name">
                </div>

                <div class="form-group">
                    <label for="supplier-name">Supplier Phone</label>
                    <input type="phone"  name="supplier_phone" class="form-control" id="supplier-phone" placeholder="Supplier Phone">
                </div>

                <div class="form-group">
                    <label for="supplier-name">Suplier E-mail</label>
                    <input type="email"  name="supplier_email" class="form-control" id="supplier-email" placeholder="Supplier Email">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
