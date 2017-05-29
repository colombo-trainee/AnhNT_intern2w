@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
</style>
@section('content-header')
<h1>
	Quản lý List Food
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),  0, 9 ))}}</li>
</ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-6">
		<div class="pull-left">
			<a href="{{route('list-food.create')}}"><button class="btn btn-info"> Add New<i class="fa fa-plus"></i></button></a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="pull-right">
			<label>Search:<input type="search" class="" id="" placeholder="" style="border: 1px solid gray;"></label>
		
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12 table">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Description</th>
					<th>Category</th>
					<th>Special</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($datas as $key => $data)
				<tr>
					<td>{{$key}}</td>
					<td>{{$data->name}}</td>
					<td><img src="{{ asset('img/'.$data->image) }}" alt="" style="width: 100px;"></td>
					<td>${{$data->price}}</td>
					<td>{{$data->description}}</td>
					<td>{{$data->category->name}}</td>
					<td>
						@if ($data->special == 1)
						<span class="badge" style="background:  orange;">special</span>
						@else
						<span class="badge">normal</span>
						@endif

					</td>
					<td>
						<a href="" class="btn btn-success">View</a>
						<a href="" class="btn btn-info">Edit</a>
						<a href="" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
