@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add product category</h1>
   
@stop

@section('content')
	<script src="/templateEditor/ckeditor/ckeditor.js"></script>  

         <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-save"></span>Enter product category 
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
                       {!! Form::open(array('action' => 'ProductCategoryController@store','method'=>'POST', 'files' => true)) !!}
                       
                     <div class="row">
                      <div id="cat_from">
   				        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Category Name','class' => 'form-control', 'id' => 'name')) !!}
                            </div>
                        </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Slug(URL):</strong>
                                {!! Form::text('slug', null, array('placeholder' => 'Slug','class' => 'form-control', 'id' => 'slug')) !!}
                                Will be automatically generated from your name, if left empty.
                            </div>
                        </div>
                      	<div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Parent Category:</strong>
                                {{ Form::select('parent', ['NIL'], null, ['class' => 'form-control', 'placeholder' => 'Choose Parent Category']) }}
                            </div>
                        </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Meta Title:</strong>
                                {!! Form::text('metatitle', null, array('placeholder' => 'Meta Title','class' => 'form-control', 'id' => 'metatitle')) !!}
                            </div>
                        </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Meta Keywords:</strong>
                                {!! Form::text('keywords', null, array('placeholder' => 'Meta Keywords','class' => 'form-control', 'id' => 'keywords')) !!}
                            </div>
                        </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Meta Description:</strong>
                                {!! Form::text('metadesc', null, array('placeholder' => 'Meta Description','class' => 'form-control', 'id' => 'metadesc')) !!}
                            </div>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                      <strong>Category Description:</strong>
                                      
                                       <textarea id="editor1" name="events" class="ckeditor" style="height: 50%;"></textarea>  
                                  </div>
                              </div> 

                        
                      
            
                 

                       
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center" id="form_sub">
                              <button type="submit" class="btn btn-primary btn-xs">Publish</button>
                                  <a href="{{ action('ProductCategoryController@index') }}"><button type="button" class="btn btn-success btn-xs">Back</button></a>
                                  <button type="button" class="btn btn-warning btn-xs update">Hide</button>
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


@stop

@section('js')
<script type="text/javascript">  
     CKEDITOR.replace( 'editor1' );  
  </script>
  @stop