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
        $customer= null;
        return view('Customers.addCustomers' , compact('customer'));
    }
    public function edit(Customer $customer)
    {
        return view('customers.addCustomers' , compact('customer'));
    }
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->addCustomer($request);
    }
    public function update(Customer $customer)
    {
        $customer->updateCustomer();
    }
    public function destroy(Customer $customer)
    {
        $customer->deleteCustomer();
    }
}
