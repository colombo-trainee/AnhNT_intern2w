@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
	.alert{
		display: none;	
	}
	.has-error{
		display: block;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),12	 ))}} {{ucfirst( substr( Route::currentRouteName(),0,11 ))}}
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('order-table.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,11 ))}}</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),12 ))}}</li>
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
<form action="{{ route('order-table.update',$data->id) }}" method="POST" role="form" class="col-md-6" enctype='multipart/form-data'>
	{{csrf_field()}}
	{{method_field('PUT')}}

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Nhập tên" value="{{$data->name}}" required>
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" class="form-control" name="email" placeholder="Nhập emai" value="{{$data->email}}" required>
	</div>
	<div class="form-group">
		<label for="">Date</label>
		<input type="date" class="form-control" name="date" value="{{$data->date}}" required>
	</div>
	<div class="form-group">
		<label for="">Party Number</label>
		<input type="number" class="form-control" name="partyNumber" value="{{$data->partyNumber}}" required>
	</div>
	
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="{{ route('order-table.index') }}" class="btn btn-info">Quay lại</a>
</form>
@endsection
