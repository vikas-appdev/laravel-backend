<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculate;
use Carbon\Carbon;
use App\Employee;
use App\Cab;
use App\User;
use App\Vendor;

class CalculateController extends Controller
{
    public function calc(Request $request)
    {
    	
    	$current = Carbon::now()->toDateTimeString();
    	$data = $request->order;

        $order_status = Employee::findOrFail($data)->complete;
        $prev = Calculate::where('order_id', $data)->orderBy('id', 'DESC')->limit(1)->first();

           	
    	$calc = new Calculate;
    	$calc->order_id = $data;
    	$calc->start_date = $current;
        $calc->open_dist = ($request->open_dist == null)?'0':$request->open_dist;
        if($order_status == 2)
        {

            $calc->previous_balance = number_format((float)$prev->total_charge, 2, '.', '');
        }
        //dd($calc);
        $calc->save();
    	//dd($calc);
    	return response()->json(['success'=> true, 'message'=> 'cab journey started!.']);
    }

    public function getcalData(Request $request)
    {
        $current = Carbon::now();
       // $current = $current->addDays(1);
       
        $data = Calculate::where('order_id', $request->order_id)->orderBy('id', 'DESC')->limit(1)->first();
       
        if(isset($data) && $data != null){
            $starttime = Carbon::parse($data->start_date)->format('Y-m-d');
            $diff = date_diff(date_create($starttime),date_create( $current->format('Y-m-d')));
            $time_travel = $diff->format("%d");
        }
        
        
        $order = Employee::findOrFail($request->order_id);
        //dd($order);
        if($order != null)
        {
            $cabData = Cab::where('owner', $order->vendor)->where('car_type',$order->send_car)->where('visit', $order->visit)->first();
           // dd($cabData);
            if($cabData != null)
            {
                $days = $time_travel + 1;
                $request->close_dist = ($request->close_dist == null)?'0':$request->close_dist;
                $totalDist = $request->close_dist - $data->open_dist;
                $totalDist = number_format((float)$totalDist, 4, '.', '');
                $charge_per_dist = ($days * $cabData->base_price) + ($cabData->charges_per_distance * $totalDist); 
                $charge_per_dist = number_format((float)$charge_per_dist, 2, '.', '');
                $fuel_use = $totalDist/($cabData->milage);
                $fuel_use = number_format((float)$fuel_use, 4, '.', '');
                $fuel_charge = $fuel_use * ($cabData->fuelcharges_per_ltr);
                $fuel_charge = number_format((float)$fuel_charge, 2, '.', '');
                $previous_balance = $data->previous_balance;
                $total_charge = $charge_per_dist + $fuel_charge + $previous_balance;
                $total_charge = number_format((float)$total_charge, 2, '.', '');
                
                 $data->update(['stop_date' => $current,'end_dist'=>$request->close_dist, 'total_dist' => $totalDist, 'total_time' => $time_travel, 'charge' => $charge_per_dist, 'total_fuel' => $fuel_use, 'fuel_charge' => $fuel_charge, 'total_charge' => $total_charge]);
            }
            
        }
        
        // if($data->stop_date == "")
        // {
           
            // $order->update(['complete' => 2]);
        // }

        return response()->json(['data'=> $data]);
    }


    public function startinfo($id)
    {
        $info = Calculate::where('order_id', $id)->first();
        $start_date_time = $info->start_date;
        return response()->json(['data'=> $start_date_time]);
    }

    public function payment($email)
    {
        $user = User::where('email', $email)->first();
         if(!empty($user) && $user->count()>0)
      {
        if($user->employee_id == 'vendor')
        {
            $payments = Employee::where('vendor', $user->name)->where('complete', 1)->orderBy('id', 'DESC')->get();
            foreach ($payments as $key => $payment) {
              $payment->paymentHistory = Calculate::where('order_id', $payment->id)->orderBy('id', 'DESC')->limit(1)->get();
          }
        }else
        {
            $payments = Employee::where('email', $email)->where('complete', 1)->orderBy('id', 'DESC')->get();
              //dd($orders);
              foreach ($payments as $key => $payment) {
                  $payment->paymentHistory = Calculate::where('order_id', $payment->id)->orderBy('id', 'DESC')->limit(1)->get();
              }

        }
      }

      return response()->json(['data' => $payments]);
    }


    public function endjourney($id)
    {

        $order = Employee::findOrFail($id);
        $order->update(['complete' => 1]);
        return response()->json(['success'=> true, 'message'=> 'journey ended successfully!.']);
    }
}
