@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Payment History</h1>
    <h5>All Payment in the database.</h5>

@stop

@section('content')

 	<section>
 
   		<div class="row">
    
		  <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Payment Lists
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
                  <th>Vendor Name</th>
                  <th>Employee Name</th>
                  
                  <th>Request For</th>  
                  
                 
                  <th>Car Destination</th>
               
               
                  <th>Total Fare</th> 
                   <th>Payment Date</th> 
                  <th>Action</th>
                 
                 
                </tr>
                </thead>
                <tbody>
                  @if(!empty($orders))
                     @foreach ($orders as $i => $order)
                      <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $order->vendor }}</td>
                          <td>{{ $order->employee_name }}</td>
                          
                         
                          <td>@if($order->request_for == null) own @else{{ $order->request_for }}@endif</td>
                         
                          
                          <td>{{ $order->destination }}</td>
                         
                          
                          
                         
                            <td><span style="color: red">₹ {{ $order->payment->total_charge }} </span></td>
                            <td>{{ $order->payment->updated_at }} </td>
                          <td>
                            <a href="{{url('/admin/payment/'.$order->id)}}" class="btn btn-xs btn-success">View Details</a>
                          </td>
                       
                         
                         
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