<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Employee;
use App\User;
use Carbon\Carbon;

class VendorController extends Controller
{
    public function vendor(Request $request)
    {
    	$this->validate($request, [
            'order_id' => 'required'         

        ]);
    	$accept_id = Vendor::create($request->all())->id;
    	$accept = Vendor::findOrFail($accept_id);
    	$accept->update(['order_status' => 'accept']);
    	
    	$order = Employee::findOrFail($request->order_id);
    	$order->update(['accept' => 2, 'send_car' => $request->car_type]);
    	return response()->json(['success'=> true, 'message'=> 'order accepted successfully!.']);
    }
    
       public function vendordetail(Request $request)
    {
      $vendor = Vendor::where('order_id', $request->order_id)->first();
      $vendor->update(['car_no' => $request->car_no, 'driver_name' => $request->driver_name, 'driver_no' => $request->driver_no]);

      $order = Employee::findOrFail($request->order_id);
      $order->update(['accept' => 1]);
      return response()->json(['success'=> true, 'message'=> 'order accepted successfully!.']);
    }

    public function rejectOrders(Request $request)
    {
      $this->validate($request, [
            'order_id' => 'required'         

        ]);
      $reject_id = Vendor::create($request->all())->id;
      $reject = Vendor::findOrFail($reject_id);
      $reject->update(['order_status' => 'reject', 'remarks' => $request->remarks]);

      $order = Employee::findOrFail($request->order_id);
      $order->update(['accept' => 3]);
      return response()->json(['success'=> true, 'message'=> 'order rejected!.']);

    }

    
    public function cabList($email)
    {
        //dd($email);
      $orders = Employee::where('email', $email)->where('accept',1)->where('complete','!=',1)->orderBy('created_at', 'DESC')->get();
      //dd($orders);
      foreach ($orders as $key => $order) {
          $order->cabList = Vendor::where('order_id', $order->id)->orderBy('created_at', 'DESC')->get();
      }
      
      //dd($orders);
      return response()->json(['data' => $orders]);
    }

    public function OrderHistory($email)
    {
      $user = User::where('email', $email)->first();
      
      if(!empty($user) && $user->count()>0)
      {
        if($user->employee_id == 'vendor')
        {
         
          $orders = Employee::where('vendor', $user->name)->where("created_at",">", Carbon::now()->subMonths(1))->orderBy('created_at', 'DESC')->get();
          foreach ($orders as $key => $order) {
              $order->orderHistory = Vendor::where('order_id', $order->id)->orderBy('created_at', 'DESC')->get();
          }
        }else
        {
          
          $orders = Employee::where('email', $email)->where("created_at",">", Carbon::now()->subMonths(1))->orderBy('created_at', 'DESC')->get();
          //dd($orders);
          foreach ($orders as $key => $order) {
              $order->orderHistory = Vendor::where('order_id', $order->id)->orderBy('created_at', 'DESC')->get();
          }
        }
      }

     // dd($orders);
      return response()->json(['data' => $orders]);
    }
    
    public function vendorcar($id)
    {
      $vendor = Vendor::where('order_id', $id)->first();
      return $vendor;
    }
}
