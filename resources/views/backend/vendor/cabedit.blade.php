@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cab Details</h1>
    <h5>All cabs in the database.</h5>

@stop

@section('content')

 	<section>
 
   		<div class="row">
   			 <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-save"></span>Enter Cab Data
                    <div class="pull-right action-buttons">
                        
                    </div>
                </div>
                <div class="panel-body">
                 @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                       
                        {!! Form::model($cab, ['method' => 'PATCH','route' => ['cab.update', $cab->id]]) !!}
                       
                     <div class="row">
                      <div id="cat_from">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cab Owner:</strong>
                              {{ Form::select('owner', $vendors, null, ['class' => 'form-control', 'placeholder' => 'Choose owner', 'id' => 'owner']) }}
                            </div>
                        </div>
   				        <div class="col-xs-12 col-sm-12 col-md-12" id="car_type">
                            <div class="form-group">
                                <strong>Car Type:</strong>
                                {{ Form::select('car_type', $cab_type, $cab->car_type, ['class' => 'form-control', 'placeholder' => 'Choose User Type']) }}
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Visit:</strong>
                                {{ Form::select('visit', ['local guwahati' => 'Local Guwahati', 'outstation assam' => 'Outstation Assam','outstation tripura' => 'Outstation Tripura', 'local tripura' => 'Local Tripura','outstation hills' => 'Outstation Hills', 'guwahati airport' => 'Guwahati Airport','upper assam local' => 'Upper Assam Local', 'upper assam outstation' => 'Upper Assam Outstation', 'upper assam airport' => 'Upper Assam Airport','agartala airport' => 'Agartala Airport', 'agartala local outstation' => 'Agartala Local Outstation','guwahati railway station' => 'Guwahati Railway Station','office dropping and home dropping' => 'Office Dropping and Home Dropping'], $cab->visit, ['class' => 'form-control', 'placeholder' => 'Choose Visit']) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Average Speed:</strong>
                                {!! Form::text('avg_speed', $cab->avg_speed, array('placeholder' => 'Average Speed','class' => 'form-control', 'id' => 'avg_speed')) !!}
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Milage:</strong>
                                {!! Form::text('milage', $cab->milage, array('placeholder' => 'Milage','class' => 'form-control', 'id' => 'milage')) !!}
                            </div>
                        </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Base Price:</strong>
                                {!! Form::text('base_price', $cab->base_price, array('placeholder' => 'Base Price','class' => 'form-control', 'id' => 'base_price')) !!}
                            </div>
                        </div>
                    
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cab Charges / km:</strong>
                                {!! Form::text('charges_per_distance', $cab->charges_per_distance, array('placeholder' => 'Cab Charges / km','class' => 'form-control', 'id' => 'charges_per_distance')) !!}
                            </div>
                        </div>

                        <!--  <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Fuel Price/ ltr:</strong>
                                {!! Form::text('fuelcharges_per_ltr', $cab->fuelcharges_per_ltr, array('placeholder' => 'Fuel Price/ ltr','class' => 'form-control', 'id' => 'fuelcharges_per_ltr')) !!}
                            </div>
                        </div> -->
                       
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center" id="form_sub">
                              <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                  <a href="{{ action('Admin\VendorController@cab') }}"><button type="button" class="btn btn-success btn-xs">Back</button></a>
                                  
                      </div>
                   
                       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                              
                      </div>

                    
                   </div>

              
                    {!! Form::close() !!}

                </div>
                <div class="panel-footer">
                    <div class="row">
                
                    </div>
                </div>
            </div>
        </div> 
		  <div class="col-md-7">
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
                     <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                <thead>               
                <tr>
                  <th>slno</th>
                  <th>Owner</th>
                  <th>Car</th>                 
                  <th>Visit</th>
                 <th>Avg.</th>
                  <th>Milage</th>
                   <th>Charge/km</th>
                   <!--<th>Fuel/l</th>-->

                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(!empty($cabs))
                    @foreach ($cabs as $i => $cab)
                      <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $cab->owner }}</td>
                          <td>{{ $cab->car_type }}</td>
                          <td>{{ $cab->visit }}</td>
                          <td>{{ $cab->avg_speed }}</td>
                          <td>{{ $cab->milage }}</td>
                          <td>{{ $cab->charges_per_distance }}</td>
                           <!-- <td>{{ $cab->fuelcharges_per_ltr }}</td> -->


                         
                          <td>
                              
                             <a href="{{url('/admin/cabdetail/'.$cab->id.'/edit')}}" class="btn btn-info btn-xs btn-detail edit">Edit</a>
                              {!! Form::open(['method' => 'DELETE','route' => ['cab.destroy', $cab->id],'style'=>'display:inline', 'onclick' => 'return confirm("Are You Sure?")']) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                              {!! Form::close() !!}
                             
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
@section('js')
    <script type="text/javascript">
      $('#owner').on('change', function(){
            $.ajax({

            type: "GET",
             url: '/admin/car_type/'+$('#owner').val(),
            success: function (data) {
                console.log(data);
   $('#car_type').html(data);
     
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      })
    </script>
@stop