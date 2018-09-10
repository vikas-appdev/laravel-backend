@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Users Details</h1>
    <h5>All users in the database.</h5>

@stop

@section('content')

 	<section>
 
   		<div class="row">
   			 <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-save"></span>Create User
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
                       {!! Form::open(array('action' => 'Admin\UserController@store','method'=>'POST', 'files' => true)) !!}
                       
                     <div class="row">
                      <div id="cat_from">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>User Type:</strong>
                                {{ Form::select('employee_id', ['vendor' => 'Vendor', 'employee' => 'Employee'], null, ['class' => 'form-control', 'placeholder' => 'Choose User Type']) }}
                            </div>
                        </div>
   				        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'User Name','class' => 'form-control', 'id' => 'name')) !!}
                            </div>
                        </div>
                  
                    
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Username/Email:</strong>
                                {!! Form::text('email', null, array('placeholder' => 'Username/Email','class' => 'form-control', 'id' => 'email')) !!}
                            </div>
                        </div>
                    
               

                        
                      
            
                 

                       
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center" id="form_sub">
                              <button type="submit" class="btn btn-primary btn-xs">Create</button>
                                  <a href="{{ action('ProductCategoryController@index') }}"><button type="button" class="btn btn-success btn-xs">Back</button></a>
                                  
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
                    <span class="glyphicon glyphicon-list"></span>Users Lists
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
                  <th>Name</th>
                  <th>Email/Username</th>                 
                  <th>User Type</th>
                 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                     @foreach ($users as $i => $user)
                      <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->employee_id }}</td>
                         
                          <td>
                              
                             <a href="{{url('/admin/user/'.$user->id.'/edit')}}" class="btn btn-xs btn-info">Edit</a>

                              {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline', 'onclick' => 'return confirm("Are You Sure?")']) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                              {!! Form::close() !!}
                              <a href="{{url('/admin/user/genpass/'.$user->id)}}" class="btn btn-success btn-xs">Generate Password</a>
                             
                          </td>
                      </tr>
                      @endforeach
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