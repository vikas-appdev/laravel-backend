@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cab List</h1>
    <h5>All cabs list in the database.</h5>

@stop

@section('content')

 	<section>
 
   		<div class="row">
   			 <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-save"></span>Enter Cab Type
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
                      
                       {!! Form::model($cablist, ['method' => 'PATCH','route' => ['cablist.update', $cablist->id]]) !!}
                       
                     <div class="row">
                      <div id="cat_from">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cab Owner:</strong>
                                {{ Form::select('vendor', $vendors, null, ['class' => 'form-control', 'placeholder' => 'Choose owner', 'id' => 'vendor']) }}
                            </div>
                        </div>
   				        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cab Type:</strong>
                   
                                {!! Form::text('cab_type', $cablist->cab_type, array('placeholder' => 'Cab Type','class' => 'form-control', 'id' => 'cab_type')) !!}
                            </div>
     
                     
                       
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
        </div> 
		  <div class="col-md-6">
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
               

                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @if(!empty($cablists))
                    @foreach ($cablists as $i => $cab)
                      <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $cab->vendor }}</td>
                          <td>{{ $cab->cab_type }}</td>
                          <td>
                              
                             <a href="{{url('/admin/cablist/'.$cab->id.'/edit')}}" class="btn btn-info btn-xs btn-detail edit">Edit</a>
                             
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