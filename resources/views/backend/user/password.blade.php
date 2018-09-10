@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add User</h1>
   
@stop

@section('content')
 
<div class="row">
 	<div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-save"></span>Info
                <div class="pull-right action-buttons">
                    
                </div>
            </div>
            <div class="panel-body">
            	<div class="col-md-6">
            		<label>User Email: </label>
            		{{$pass->email}}
            	</div>
            	<div class="col-md-6">
            		<label>User Password:</label>
            		{{$pass->token}}
            	</div>
            </div>
        </div>
    </div>
    <a href="{{url('/admin/user')}}" class="btn btn-info">Back</a>
</div>
        


@stop

@section('js')

  @stop