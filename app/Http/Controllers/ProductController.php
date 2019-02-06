<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $product= Product::find(1);

        return $product;
    }
    public function store(Request $request , )
    {

    }
}
