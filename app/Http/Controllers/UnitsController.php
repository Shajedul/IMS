<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function store()
    {
        $unit = new Unit();
        $unit->name =\request('new_unit');
        $unit->save();
        return redirect('products/create');

    }
}
