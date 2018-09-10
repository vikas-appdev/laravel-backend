@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Product Categories</h1>
    <h5>All product categories in the database.</h5>

@stop

@section('content')

 	<section>
   		<div class="row">
   			<a href="{{route('product-category.create')}}" class="btn btn-primary btn-xs pull-right">Add New Product Catgory</a>
   		</div>
   	</section>

@stop