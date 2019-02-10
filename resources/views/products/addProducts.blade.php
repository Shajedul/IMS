@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{$product==null?"/products":"/products/".$product->id}}">
            {{csrf_field()}}
            @if(!$product==null)
                @method('PATCH')
            @endif
            <div >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="container  w-50 h-50 mb-5">


                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="text"  name="product_name" class="form-control" id="product-name" placeholder="Product name" required value="{{ $product==null?old('product_name'):$product->name}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="select-product-type">Product Type</label>
                            <select class="form-control" name="product_type" id="select-product-type">
                                @foreach($product_types as $type)
                                    <option value={{$type->id}} {{$product==null?'':$product->product_type_id==$type->id ? 'selected': ''}} >  {{$type->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="add_link" >Add New</label>
                            <a class="btn btn-info" name="" id="add_link">+</a>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="select-unit-type">Unit Type</label>
                            <select class="form-control" name="unit" id="select-unit-type">
                                @foreach($units as $unit)
                                    <option value={{$unit->id}} {{$product==null?'':$product->unit_id==$unit->id ? 'selected': ''}} >{{$unit->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="add_link" >Add New</label>
                            <button class="btn btn-info" name="add_unit" id="addLink" >+</button>
                            {{--<div id="hidden_form">
                                <form id="hidden_unit_form" >
                                    <div class="form-row">
                                        <label for="submit-unit">insert</label>
                                        <input class="form-control" type="text" name="new_unit" id="submit-unit">
                                    </div>
                                </form>
                            </div>--}}
                        </div>
                    </div>


                <div class="form-group">
                        <label for="product-quantity">Quantity</label>
                        <input  type="text" name="quantity" class="form-control" id="product-quantity" required value="{{ $product==null?old('quantity'):$product->quantity}}">
                </div>
                    <div class="form-group">
                        <label for="product-price">Per Unit price</label>
                        <input class="form-control" name="price" id="product-price" type="text" required value="{{ $product==null?old('price'):$product->price}}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product-supplier">Supplier Name</label>
                            <select class="form-control" name="supplier" id="product-supplier }}">
                                @foreach($suppliers as $supplier)
                                    <option value='{{$supplier->id}}'  {{$product==null?'':$product->supplier_id==$supplier->id ? 'selected': ''}} >{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="add_link">Add New</label>
                            <a class="btn btn-info" name="" id="add_link">+</a>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="product-description">Description of the product</label>
                        <textarea name="description" class="form-control" id="product-description" rows="3" >{{ $product==null?old('description'):$product->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>

                </div>
        </form>

 {{--   <script>
        $(document).ready(function(){
            $('#hidden_form').slideUp();
            $('#addLink').click(function(){
                $('#hidden_form').slideToggle();
            });
        });
    </script>--}}
@endsection
