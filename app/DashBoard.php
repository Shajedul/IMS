<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/12/2019
 * Time: 2:29 AM
 */

namespace App;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashBoard
{
    public function todaysTotalSale()
    {
        $invoices = DB::table('invoices')->whereDate('created_at',Carbon::today()->toDateString())->get();
        //return $invoices;
        $totalPrice=0;
        foreach ($invoices as $invoice)
        {
            $totalPrice = $invoice->totalPrice + $totalPrice;
        }
        return $totalPrice;
    }
    public function lastSales()
    {
        $sales= Sale::orderBy('id' ,'desc')->take(3)->get();
   /*     for ($i=0;$i<3;$i++)
        {
            $sales = $allSales[$i];
        }*/
        //$sales = Sale::max('total');
        return $sales;
    }
    public function numberOfSale()
    {
        $totalSales = DB::table('sales')->whereDate('created_at',Carbon::today()->toDateString())->get();
        //dd(sizeof($totalSales));
        return $totalSales;
    }
}
