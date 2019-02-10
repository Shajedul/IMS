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
        <form method="post" action="{{$supplier==null?"/suppliers":"/suppliers/".$supplier->id}}">
            @csrf
            @if(!$supplier==null)
                @method('PATCH')
            @endif
            <div class="container  w-50 h-50 mb-5">

                <div class="form-group">
                    <label for="customer-name">Supplier name</label>
                    <input type="text" value="{{ $supplier==null?old('name'):$supplier->name}}"  name="name" class="form-control" id="customer-name"  placeholder="Name" required>
                </div>

                <div class="form-group">
                    <label for="customer-phone">Supplier Phone</label>
                    <input type="text" value="{{ $supplier==null?old('phone'):$supplier->phone}}" name="phone" class="form-control" id="customer-phone" placeholder="Phone" required>
                </div>

                <div class="form-group">
                    <label for="customer-email">Supplier E-mail</label>
                    <input type="email"  name="email" value="{{ $supplier==null?old('email'):$supplier->email}}" class="form-control" id="customer-email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
