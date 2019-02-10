@extends("layouts.app")

@section('content')
    <div>
        <form>
            <div class="container h-50 w-50">
                <div class="form-group">
                    <label for="customername">choose Customer</label>
                    <select class="form-control" id="customername" name="Customer_name">
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="productname">choose Product</label>
                    <select class="form-control" id="productname" name="product_name">
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label  for="productquantity">Quantity</label>
                    <input class="form-control allownumericwithdecimal" id="productquantity" placeholder="Enter Quantity">
                </div>

                <div class="form-group">
                    <label  for="total-price">Total Price</label>
                    <output class="form-control" id="total-price" name="totalPrice">{{'0'}}</output>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-dark" onclick="addToCart()">Add Item</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container w-auto h-auto overflow-auto">
        <table class="table">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Per Unit Price</th>
                <th>Total Price</th>
            </tr>
            </thead>
        </table>
    </div>


    <script>

        function addToCart()
        {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var cid=document.getElementById("customername").value;
            var pid=document.getElementById('productname').value;
            var qty=document.getElementById('productquantity').value;
            //var =document.getElementById(id+"_price").value;
            $.ajax({
                type:'post',
                url:'/sale/ajax',
                data:{
                    _token : CSRF_TOKEN,
                    cust_id : cid,
                    pro_id : pid,
                    quantity : qty
                },
                success:function(response) {
                    //document.write('successful');
                }
            });

        }
        $(document).ready(function () {
            //called when key is pressed in textbox
            $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
                //this.value = this.value.replace(/[^0-9\.]/g,'');
                $(this).val($(this).val().replace(/[^0-9\.]/g,''));
                if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
