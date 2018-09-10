<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calculate;
use App\Employee;
use Carbon;
use App\Cab;

class JourneyController extends Controller
{
    public function journey()
    {

    	// $journies = Calculate::orderBy('id', 'DESC')->get();
    	// foreach ($journies as $key => $journey) {
    	// 	$journey_complete = Employee::where('complete', 1)->first();
    	// 	if($journey_complete->count() > 0)
    	// 	{
    	// 		$journey->employee = Employee::where('id',$journey->order_id)->first();
    	// 	}
    	// }
      	$orders = Employee::where('complete', 1)->orderBy('id', 'DESC')->get();
    	foreach ($orders as $key => $order) {
    		$order->journey = Calculate::where('order_id', $order->id)->first();
            $stop_date = Carbon\Carbon::parse($order->journey->stop_date)->format('Y-m-d');
            $diff = date_diff(date_create($stop_date),date_create( Carbon\Carbon::parse($order->journey->start_date)->format('Y-m-d')));
            $order->day = $diff->format("%d");            
            $order->day = $order->day +1;

             $cabData = Cab::where('owner', $order->vendor)->where('car_type',$order->send_car)->where('visit', $order->visit)->first();

             if($cabData != null)
            {
                 $order->base_price = $cabData->base_price;
                 $order->charges_per_distance = $cabData->charges_per_distance;

            }
            
    	}
    	//dd($orders);
    	return view('backend.journey.index', compact('orders'));
    }
}
