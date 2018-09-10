@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Accepted Cab Orders</h1>
    <h5>All Orders in the database.</h5>

@stop

@section('content')

 	<section>
 
   		<div class="row">
    
		  <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Cab Lists
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
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
                  <th>Request Date</th>  
                  <th>Request Time</th> 
                  <th>Request For</th>  
                  <th>Division</th>    
                  <th>Car Type</th> 
                  <th>Car Destination</th> 
                  <th>Car No.</th> 
                  <th>Driver Name</th>
                  <th>Driver No.</th>       
                  <th>Order Status</th>
                  <th>Order Accepted at</th>
                 
                </tr>
                </thead>
                <tbody>
                 @if(!empty($orders))
                     @foreach ($orders as $i => $order)
                      <tr>
                         <td>{{ ++$i }}</td>
                         <td>{{ $order->employee->vendor }}</td>
                          <td>{{ $order->employee->employee_name }}</td>
                          <td>{{ $order->employee->request_date }}</td>
                          <td>{{ $order->employee->request_time }}</td>
                          <td>@if($order->employee->request_for == null) own @else{{ $order->employee->request_for }}@endif</td>
                          <td>@if($order->employee->division == null) - @else{{ $order->employee->division }}@endif</td>
                          <td>{{ $order->car_type }}</td>
                          <td>{{ $order->car_destination }}</td>
                          <td>{{ $order->car_no }}</td>
                          <td>{{ $order->driver_name }}</td>
                          <td>{{ $order->driver_no }}</td>
                          <td>@if($order->employee->accept == 1)<span style="color: green;">Accept</span>@endif
                            @if($order->employee->accept == 2)<span style="color: red;">Pending..</span>@endif
                            @if($order->employee->accept == 3)<span style="color: red;">Reject</span>@endif</td>
                          <td>{{ $order->created_at }}</td>
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