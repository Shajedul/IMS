@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="container  w-50 h-50 mb-5">
                <div class="form-group">
                    <label for="product-name">Product Name</label>
                    <input type="text"  name="product_name" class="form-control" id="product-name" placeholder="Product name">
                </div>
                <div class="form-group">
                    <label for="select-product-type">Product Type</label>
                    <select class="form-control" name="select_product_type" id="select-product-type">
                        <option>Crackers</option>
                        <option>Coockies</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="select-unit-type">Unit Type</label>
                    <select class="form-control" name="select_unit_type" id="select-unit-type">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product-quantity">Quantity</label>
                    <input  type="text" name="product_quantity" class="form-control" id="product-quantity">
                </div>
                <div class="form-group">
                    <label for="product-price">Per Unit price</label>
                    <input class="form-control" name="product_price" id="product-price" type="text">
                </div>


                <div>
                    <label for="product-supplier">Supplier Name</label>
                    <select class="form-control" name="product_supplier" id="product-supplier">
                        <option>Arong</option>
                        <option>Pran</option>
                        <option>Aong</option>
                        <option>Aomng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product-description">Description of the product</label>
                    <textarea name="product_description" class="form-control" id="product-description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
