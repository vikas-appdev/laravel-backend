
@extends('adminlte::page')

@section('title', 'ITC ADMIN')

@section('content_header')
    <h1>Journey Report</h1>
    <h5>All Journey in the database.</h5>

@stop

@section('content')

 	<section>
 
   		<div class="row">
    
		  <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Journey Lists
                    <div class="pull-right action-buttons">
                      
                        <div class="btn-group pull-right">

                            <a href="{{url('/admin/export-payment')}}" style="color: white;"><span class="glyphicon glyphicon-download"></span>Export to Excel</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                     <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="example">
                <thead>               
                <tr>
                  <th>slno</th>
                  <th>Order Id</th>
                  <th>Employee Name</th> 
                  <th>Employee Email</th>
                 
                  <th>Pick up Location</th>
                  <th>Destination</th>
                  <th>Car Type</th>
                  <th>Jouney Start Date</th>
                  <th>Jouney Start Time</th>
                  <th>Opening Distance (KM)</th>
                  <th>Jouney Stop Date</th>
                  <th>Jouney Stop Time</th>
                  <th>Days</th>
                  <th>Closing Distance (KM)</th>
               	  <th>Total Distance (km.)</th>                  
                   <th>Fare per Km</th> 
                   <th>Base Fare</th>
                   <!-- <th>Fuel Use</th>
                   <th>Fuel Charge</th> -->
                  <th>Total Fare</th>

                   <th>Payment Date</th> 
                 
                 
                 
                </tr>
                </thead>
                <tbody>
                  @if(!empty($orders))
                     @foreach ($orders as $i => $order)
                      <tr>
                      	<td>{{ ++$i }}</td>
                    	<td>{{ Carbon\Carbon::parse($order->journey->start_date)->format('Ymd') }}{{$order->journey->order_id}}</td>
                     	<td>{{$order->employee_name}}</td>
                        <td>{{$order->email}}</td>

                     	<td>{{$order->pickup}}</td>
                     	<td>{{$order->destination}}</td>
                     	<td>{{$order->send_car}}</td>
                     	<td>{{ Carbon\Carbon::parse($order->journey->start_date)->format('Y-m-d') }}</td>
                      <td>{{ Carbon\Carbon::parse($order->journey->start_date)->format('H:i:s') }}</td>
                     	<td>{{$order->journey->open_dist}}</td>
                     	<td>{{Carbon\Carbon::parse($order->journey->stop_date)->format('Y-m-d')}}</td>
                      <td>{{Carbon\Carbon::parse($order->journey->stop_date)->format('H:i:s')}}</td>
                      <td>{{$order->day}}</td>
                     	<td>{{$order->journey->end_dist}}</td>
                     	<td>{{$order->journey->total_dist}} km</td>
                      
                      <td>₹ {{$order->charges_per_distance}}</td>
                      <td>₹ {{$order->base_price}}</td>
                      <!-- <td> {{$order->journey->total_fuel}} ltr</td>
                      <td>₹ {{$order->journey->fuel_charge}}</td> -->
                     	<td>₹ {{$order->journey->total_charge}}</td>
                     	<th>{{$order->journey->updated_at}}</th>
                      </tr>
                      @endforeach
                    @endif
                </tbody>
                <tfoot>
                <tr>
                  
                </tr>
                </tfoot>
              </table>
                </div>
                <div class="panel-footer">
                    <div class="row">
                
                    </div>
                </div>
            </div>
        </div> 
   		</div>
   	</section>

@stop