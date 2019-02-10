<?php

namespace App\Http\Controllers;

use App\productType;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function store()
    {
        $type = new productType();
        $type->name =\request('new_type');
        $type->save();
        return redirect('products/create');
    }
}
