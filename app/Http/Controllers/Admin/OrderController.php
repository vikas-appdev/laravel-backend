<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vendor;
use App\Employee;

class OrderController extends Controller
{
    public function orders() 
    {
    	$orders = Vendor::where('order_status', 'accept')->orderBy('id', 'DESC')->get();
       // dd($orders);
    	foreach ($orders as $key => $order) {
    		$order->employee = Employee::where('id', $order->order_id)->first(); 
    	}

    	return view('backend.orders.accept', compact('orders'));
    }

    public function rejectOrders()
    {
    	$orders = Vendor::where('order_status', 'reject')->orderBy('id', 'DESC')->get();
    	foreach ($orders as $key => $order) {
    		$order->employee = Employee::where('id', $order->order_id)->first(); 
    	}
    	//dd($orders);
    	return view('backend.orders.reject', compact('orders'));
    }
}
