@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <label for="add-new-product">Add New Product</label>
            <a href="/products/create" class="btn btn-info" id="add-new-product">
                +
            </a>
        </div>
        <div class="form-group w-25">
            <input class="form-control" type="text" name="name" id="search" placeholder="search for products">
        </div>
        <table class="table" id="product_table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Unit name</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Delete item</th>
                <th>Edit Item</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{App\productType::find($product->product_type_id)->name}}</td>
                    <td>{{App\Unit::find($product->unit_id)->name}}</td>
                    <td>{{\App\Supplier::find($product->supplier_id)->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <form method="post" action="/products/{{$product->id}}">
                            @csrf
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn btn-info">Delete</button>
                        </form>

                    </td>
                    <td>
                        <form method="get" action="/products/{{$product->id}}/edit">
                            <button type="submit" class="btn btn btn-info">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            var table = document.getElementById('product_table');
            var table_row = $('#product_table > tbody');


            $('#search').keyup(function(){

                var name = $("#search").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: '/products',
                        type: 'post',
                        data: { _token: CSRF_TOKEN,
                            productName : name
                        },
                        dataType: 'JSON',
                        success: function (data)
                        {
                             new Noty({
                                type: 'success',
                                layout:'topRight',
                                text: 'Found the following products'
                            }).show()
                            $('#product_table tbody tr').hide();
                            for(let i=0 ;i< data.products.length; i++)
                            {
                                //console.log(data.products[i].name);

                                table_row.append
                                (
                                    '' +
                                    '<tr>'+
                                    '<td>'+data.products[i].name+'</td>'+
                                    '<td>'+data.products[i].productType+'</td>'+
                                    '<td>'+ data.products[i].unit +'</td>'+
                                    '<td>'+ data.products[i].supplier +'</td>'+
                                    '<td>'+ data.products[i].price +'</td>'+

                                    '<td>'+
                                    '<form method="post" action="/products/'+data.products[i].id+'">'+
                                    '@csrf'+
                                    '{{method_field('delete')}}'+
                                    '<button type="submit" class="btn btn btn-info">Delete</button>'+
                                    '</form>'+
                                    '</td>'+

                                    '<td>'+
                                    '<form method="get" action="/products/' +data.products[i].id + '/edit">'+
                                    '<button type="submit" class="btn btn btn-info">Edit</button>'+
                                    '</form>'+
                                    '</td>'+
                                    '<tr>'
                                )
                            }


                        }
                    });







            })
        })
    </script>
@endsection
