@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Payment Breakdown Detail</h1>
    <h5>Payment Detail in the database.</h5>

@stop

@section('content')

 	<section>
 
   		<div class="row">
     @if(!empty($payments))
        @foreach ($payments as $i => $payment)
		  <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  Total Journey Fare: ₹ {{$payment->total_charge}} 
                </div>
                <div class="panel-body">
                   
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>
                                Journey Start
                            </label>
                        </div>
                        <div class="col-md-6">
                            {{$payment->start_date}}
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label>
                            Journey end
                        </label>
                    </div>
                    <div class="col-md-6">
                        {{$payment->stop_date}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label>
                            Total Distance
                        </label>
                    </div>
                    <div class="col-md-6">
                        {{$payment->total_dist}} Km.
                    </div>
                </div>
                <div class="col-md-12">
                       <div class="col-md-6">
                        <label>
                            Total Time
                        </label>
                    </div>
                    <div class="col-md-6">
                        {{$payment->total_time}} mins.
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label>
                           Base fare
                        </label>
                    </div>
                    <div class="col-md-6">

                        
                       ₹ {{$payment->cabData->base_price}}
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="col-md-6">
                        <label>
                           Charge per fare
                        </label>
                    </div>
                    <div class="col-md-6">

                        
                       ₹ {{$payment->cabData->charges_per_distance}}
                    </div>
                </div>
                      <div class="col-md-12">
                    <div class="col-md-6">
                        <label>
                           fare = Base fare + chargeper km
                        </label>
                    </div>
                    <div class="col-md-6">

                        ₹ {{$payment->charge}} 
                     
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label>
                           Fuel use
                        </label>
                    </div>
                    <div class="col-md-6">
                         {{$payment->total_fuel}} ltr. 
                    </div>
                </div>
                <div class="col-md-12">
                     <div class="col-md-6">
                        <label>
                           Fuel Charge
                        </label>
                    </div>
                    <div class="col-md-6">
                        ₹ {{$payment->fuel_charge}} 
                    </div>
                </div>
        
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label>
                           Total fare
                        </label>
                    </div>
                    <div class="col-md-6">
                        ₹ {{$payment->total_charge}} 
                    </div>
                </div>
               
                </div>
            </div>
        </div>
         @endforeach
                @endif
    </div>

    <a href="{{url('/admin/payment')}}" class="btn btn-success">Back</a>
</section>

@stop