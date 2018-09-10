<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calculate;
use App\Employee;
use Excel;
use App\Cab;

class PaymentController extends Controller
{
    public function index()
    {
        $orders = Employee::where('complete', 1)->orderBy('id', 'DESC')->get();
        foreach ($orders as $key => $order) {
            $order->payment = Calculate::where('order_id', $order->id)->orderBy('id','DESC')->limit(1)->first();
        }
    	// $payments = Calculate::orderBy('id', 'DESC')->get();
    	// foreach ($payments as $key => $payment) {
    	// 	$payment->employee = Employee::where('id', $payment->order_id)->first();
    	// }


    	return view('backend.payment.index', compact('orders'));
    }

    public function viewDetails($id)
    {
    	$payments = Calculate::where('order_id',$id)->get();
        foreach ($payments as $key => $payment) {
          $order = Employee::findOrFail($payment->order_id);
          $payment->cabData = Cab::where('owner', $order->vendor)->where('car_type',$order->send_car)->where('visit', $order->visit)->first();
        }
        //dd($payments);
    	return view('backend.payment.detail', compact('payments'));
    }

    public function export()
    {

        $payments = Calculate::select('order_id','start_date', 'stop_date', 'total_dist', 'total_time', 'charge', 'total_fuel','fuel_charge', 'total_charge')->orderBy('id', 'DESC')->get();

        foreach ($payments as $key => $payment) {
            $payment->employee_name = Employee::where('id', $payment->order_id)->first()->employee_name;
            $payment->email = Employee::where('id', $payment->order_id)->first()->email;
            $payment->vendor = Employee::where('id', $payment->order_id)->first()->vendor;

                      
        }


        Excel::create('items', function($excel) use($payments) {
          $excel->sheet('ExportFile', function($sheet) use($payments) {
              $sheet->fromArray($payments, null, 'A1', false, false);
          });
      })->export('xlsx');
    }
}
