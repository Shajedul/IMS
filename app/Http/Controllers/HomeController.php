<?php

namespace App\Http\Controllers;

use App\DashBoard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth:admin,web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dashboard = new DashBoard();
        $totalPrice=$dashboard->todaysTotalSale();
        $sales =$dashboard->lastSales();
        $totalSales =$dashboard->numberOfSale();
        if($totalSales->all()==null)
        {
            $highestSale='N/A';
            $totalSales  ='N/A';
        }
        else
        {
            $highestSale= max(array_column($totalSales->all(), 'total'));
            $totalSales = sizeof($totalSales);
        }

        return view('home' , compact('totalPrice', 'sales', 'totalSales' ,'highestSale'));
    }
}
