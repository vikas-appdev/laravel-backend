<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Cablist;

class EmployeeController extends Controller
{
    public function employee(Request $request)
    {
    	$this->validate($request, [
            'vendor' => 'required',
            'car_type' => 'required',
            'request_date' => 'required', 
           'request_time' => 'required',
           'location' => 'required',
           'visit' => 'required',
           'destination' => 'required',
           'email' => 'required',
           'employee_name' => 'required'
        ]);
      //dd($request->all());
      $emp_id = Employee::create($request->all())->id;
      $emp = Employee::findOrFail($emp_id);
      $username = User::where('email', $request->email)->first();
      $emp->update(['employee_name' => $username->name]);
      return response()->json(['success'=> true, 'message'=> 'car request submitted successfully!.']);
    }

    public function orderList($email)
    {
      $vendor = User::where('email', $email)->where('employee_id', 'vendor')->first();
     // dd($vendor);
      $orders = Employee::where('vendor', $vendor->name)->where('accept','!=',1)->orderBy('created_at', 'DESC')->get();
      
      $no_order = $orders->count();
      return response()->json(['data' => $orders]);
    }

    public function cabno($email)
    {
      $orders = Employee::where('email', $email)->where('accept',1)->where('complete','!=',1)->get();
      $no_order = $orders->count();

      return response()->json(['data' => $no_order]);
    }

    public function orderno($email)
    {
      $vendor = User::where('email', $email)->where('employee_id', 'vendor')->first();
      $orders = Employee::where('vendor', $vendor->name)->where('accept', 0)->orderBy('created_at', 'DESC')->get();
      $no_order = $orders->count();
      return response()->json(['data' => $no_order]);
    }

    public function cablist($email)
    {
      $vendor = User::where('email', $email)->where('employee_id', 'vendor')->first();
      $cablist = Cablist::where('vendor', $vendor->name)->get();
      return $cablist;
    }
    
     public function vendorlist()
    {
      //dd('a');
      $vendorlist = User::where('employee_id', 'vendor')->get();

      return $vendorlist;
    }
}
