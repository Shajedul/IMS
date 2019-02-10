@extends("layouts.app")

@section('content')
   <div class="container h-75 w-75">
       <form action="/sale" method="post">
           @csrf
           <div class="form-group">
               <label for="customername">Choose Customer</label>

               <select class="form-control" id="customername" name="Customer_name">
                   <option value="">Select Customer</option>
                   @foreach($customers as $customer)
                       <option value="{{$customer->id}}">{{$customer->name}}</option>
                   @endforeach
               </select>
           </div>
           <div class="form-group">
               <label for="" class="control-label">Name</label>
               <select name="name" id="name" class="form-control" required>
                   <option value="">Select Product</option>
                   @foreach($products as $product)
                       <option value="{{$product->id}}" unit_price-{{$product->id}}="{{$product->price}}">{{$product->name}}</option>
                   @endforeach
               </select>
           </div>
           <div class="form-group">
               <label for="" class="control-label">Unit Price</label>
               <input type="text" name="unit_price" id="unit_price" class="form-control" required>
           </div>
           <div class="form-group">
               <label for="" class="control-label">Quantity</label>
               <input type="text" name="quantity" id="quantity" class="form-control" required>
           </div>
           <button type="button"  id="add" class="btn btn-info">Add Item to Cart</button>
           <table class="table table-light" id="memo">
               <thead>
               <tr>
                   {{--<th >Product Id</th>--}}
                   <th>Product Name</th>
                   <th>Quantity</th>
                   <th>Unit Price</th>
                   <th>Total Price</th>
                   <th>Action</th>
               </tr>
               </thead>
               <tbody>

               </tbody>
           </table>
           <button type="submit" class="btn btn-info">Checkout item</button>
       </form>
   </div>



    <script>
        $(document).ready(function () {
            $('#name').change(function ($this) {
                var moduleName = "unit_price-"+$(this).val();
                var element = $(this).find('option:selected');
                var myTag = element.attr(moduleName);
                $('#unit_price').val(myTag);
            });
            $('#add').on('click',function () {
                var product_id = $('#name').find('option:selected').val();
                var product_name = $('#name').find('option:selected').text();
                var unit_price = $('#unit_price').val();
                var quantity = $('#quantity').val();
                var total_price = unit_price*quantity;
                var table_row = $('#memo > tbody');
                table_row.append('' +
                    '<tr>'+
                    '<td>' +
                    '<input class="form-control" type="text" name="product_name[]" value="'+product_name+'">' +
                    '<input class="" style="display:none;" type="hidden" name="product_id[]" value="'+product_id+'">' +
                    '</td>'+
                    '<td><input class="form-control" type="text" name="unit_price[]" value="'+unit_price+'"></td>'+
                    '<td><input class="form-control" type="text" name="quantity[]" value="'+quantity+'"></td>'+
                    '<td><input class="form-control" type="text" name="total_price[]" value="'+total_price+'"></td>'+
                    '<td><button class="btn btn-info" type="button">Delete</button> </td>'+

                    '</tr>'
                );

            });
            $('#memo').on('click', 'button[type="button"]', function(e){
                $(this).closest('tr').remove()
            });
        });
    </script>
@endsection
