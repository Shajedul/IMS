<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class suppliersController extends Controller
{
   /* public function __construct()
    {
        dd(Auth::user());

    }*/

    public function index()
    {
        $suppliers =Supplier::all();
        //dd(Auth::check());
        return view('supplier.viewSuppliers', compact('suppliers'));
    }
    public function create()
    {
        $supplier = null;
        return view('supplier.addSupplier' , compact('supplier'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);
        $supplier= new Supplier();
        $supplier->name = \request('name');
        $supplier->email = \request('email');
        $supplier->phone = \request('phone');
        $supplier->save();
        return redirect('/suppliers');
    }
    public function edit(Supplier $supplier)
    {
        if (Gate::denies('authorizedAdmin'))
        {
            abort(403 , 'You do not have permission to perform this action');
        }
        return view('supplier.addSupplier' , compact('supplier'));
    }
    public function update(Supplier $supplier , Request $request)
    {
        if (Gate::denies('authorizedAdmin'))
        {
            abort(403 , 'You do not have permission to perform this action');
        }
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);
        //$supplier= new Supplier();
        $supplier->name = \request('name');
        $supplier->email = \request('email');
        $supplier->phone = \request('phone');
        $supplier->save();
        return redirect('/suppliers');
    }
    public function destroy(Supplier $supplier)
    {
        if (Gate::denies('authorizedAdmin'))
        {
            abort(403 , 'You do not have permission to perform this action');
        }
        $supplier->delete();
        return redirect('/suppliers');
    }
}
