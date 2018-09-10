<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cab;
use App\Cablist;
use App\User;

class VendorController extends Controller
{
    public function cab()
    {
        $vendors = User::where('employee_id', 'vendor')->pluck('name', 'name');
    	$cabs = Cab::all();
        $cab_type = Cablist::where('vendor', 'fasttrack')->pluck('cab_type', 'id');
    	return view('backend.vendor.cab', compact('cabs', 'cab_type', 'vendors'));
    }

    public function cabdetail(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'content' => 'required', 
        //     'image'  => ' image | mimes:jpeg,jpg,png, | max:1000',
        //     'slug'  => 'unique:title',
          
        // ]);
    	$cab_id = Cab::create($request->all())->id;
        $cab=Cab::findOrFail($cab_id);        
        $cab_type = Cablist::where('id', $cab->cab_type)->first();

        $cab->update(['car_type' => $cab_type->cab_type]);
      
    	return redirect()->action('Admin\VendorController@cab');
    }

    public function edit($id)
    {
    	$vendors = User::where('employee_id', 'vendor')->pluck('name', 'name');
    	$cab = Cab::findOrFail($id);
    	$cab_type = Cablist::where('vendor', $cab->owner)->pluck('cab_type', 'cab_type');
    	$cabs = Cab::all();
    	return view('backend.vendor.cabedit', compact('cab', 'cabs', 'cab_type', 'vendors'));
    }

    public function update(Request $request, $id)
    {
    	//dd($request->all());
        $cab = Cab::findOrFail($id);
        $cab->fill($request->only('id', 'owner', 'cab_type', 'visit', 'avg_speed', 'milage', 'base_price','charges_per_distance', 'fuelcharges_per_ltr'));
         $cab_type = Cablist::where('id', $cab->cab_type)->first();

        $cab->car_type = $cab_type->cab_type;
        $cab->save();
        return redirect()->action('Admin\VendorController@cab');
    }

    public function destroy($id)
    {
        $cab = Cab::findOrFail($id);
        $cab->delete();

        return redirect()->back();
    }

    public function cablist()
    {
        $cablists = Cablist::all();
        $vendors = User::where('employee_id', 'vendor')->pluck('name', 'name');
        return view('backend.vendor.cablist', compact('cablists', 'vendors'));
    }

    public function cablistdetail(Request $request)
    {
        $this->validate($request, [
            'vendor' => 'required',
            'cab_type' => 'required'
        ]);

        Cablist::create($request->all());
        return redirect()->action('Admin\VendorController@cablist');
    }

    public function cablistedit($id)
    {
        
        $cablist = Cablist::findOrFail($id);
        $cablists = Cablist::all();
        $vendors = User::where('employee_id', 'vendor')->pluck('name', 'name');
        return view('backend.vendor.cablistedit', compact('cablist', 'cablists','vendors'));
    }

    public function cablistupdate(Request $request, $id)
    {
        $cablist = Cablist::findOrFail($id);
        $cablist->fill($request->only('id', 'vendor', 'cab_type'));
        $cablist->save();
        return redirect()->action('Admin\VendorController@cablist');
    }
    
    public function car_type($owner)
    {
        $cab_type = Cablist::where('vendor', $owner)->pluck('cab_type', 'id');
        
        return view('backend.vendor.ajax_cars', compact('cab_type'));
    }
     public function cablistdestroy($id)
    {
        //dd($id);
        $cablist = Cablist::findOrFail($id);
        $cablist->delete();

        return redirect()->back();
    }
}
