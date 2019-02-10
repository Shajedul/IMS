<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function sale()
    {
        return $this->hasMany('sale');
    }
    public function addCustomer($request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);
        $customer = new Customer();
        $customer->name = \request('name');
        $customer->email = \request('email');
        $customer->phone = \request('phone');
        $customer->address = \request('address');
        $customer->save();
    }
    public function updateCustomer()
    {
        $this->name = \request('name');
        $this->email = \request('email');
        $this->phone = \request('phone');
        $this->address = \request('address');
        $this->save();
    }
    public function deleteCustomer()
    {
        $this->delete();
    }
}
