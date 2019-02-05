<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Add Products</title>
</head>
<body>
<div class="container mb-3 text-center">
    <h1 >Add Products</h1>
</div>
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
        <input name="product_quantity" class="form-control" id="product-quantity">
    </div>

    <div class="form-group">
        <label for="product-description">Description of the product</label>
        <textarea name="product_description" class="form-control" id="product-description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Add Product</button>
    </div>
</div>
</form>






<script src="js/app.js" charset="utf-8"></script>
</body>
</html>
