@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
	.alert-danger{
		display: none;
	}
	.has-error{
		display: block;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),9 ))}} {{ucfirst( substr( Route::currentRouteName(),0,8 ))}}
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('menu-top.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,8 ))}}</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),9 ))}}</li>
</ol>
@endsection

@section('content')
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
<form action="{{ route('menu-top.update',$data->id) }}" method="POST" role="form" class="col-md-6" enctype='multipart/form-data' id="EditMenu">
	{{csrf_field()}}
	{{method_field('PUT')}}
	
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên menu" value="{{$data->name}}" required>
		<p class="alert alert-danger name"></p>
	</div>
	<div class="form-group">
		<label for="">Order</label>
		<input type="number" class="form-control" id="order" name="order" placeholder="Nhập vị trí của menu" value="{{$data->order}}" required>
		<p class="alert alert-danger order"></p>
	</div>
	<button type="submit" class="btn btn-primary submit" >Save</button>
	<a href="{{ route('menu-top.index') }}" class="btn btn-info">Quay lại</a>
</form>

@endsection