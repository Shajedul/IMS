<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class suppliersController extends Controller
{
   /* public function __construct()
    {
        dd(Auth::user());

    }*/

    public function index()
    {
            //dd(Auth::check());
            return view('supplier.addSupplier');

    }
}
