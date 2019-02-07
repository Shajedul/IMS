<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $customers = Customer::all();
        return view('Customers.viewCustomers', compact('customers'));
    }
    public function create()
    {
        return view('Customers.addCustomers');
    }
}
