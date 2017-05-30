@extends('layouts.layout')
<style>
	th{
		width: 150px;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),10 ))}} Food
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('list-food.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,9 ))}}</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),10 ))}}</li>
</ol>
@endsection

@section('content')
<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<td>{{$data->name}}</td>
		</tr>
		<tr>
			<th>Image</th>
			<td><img src="{{ asset($data->image) }}" alt="" style="width: 100px;"></td>
		</tr>
		<tr>
			<th>Price</th>
			<td>${{$data->price}}</td>
		</tr>
		<tr>
			<th>Description</th>
			<td>{{$data->description}}</td>
		</tr>
		<tr>
			<th>Category</th>
			<td>{{$data->category->name}}</td>
		</tr>
		<tr>
			<th>Special</th>
			<td>
				@if ($data->special == 1)
					<span class="badge" style="background:  orange;">special</span>
				@else
					<span class="badge">normal</span>
				@endif
			</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>
				{{date('H:i:s d/m/Y',strtotime($data->created_at))}}
			</td>
		</tr>
		<tr>
			<th>Updated At</th>
			<td>
				{{date('H:i:s d/m/Y',strtotime($data->updated_at))}}
			</td>
		</tr>
	</thead>
</table>
<a href="{{ route('list-food.index') }}" class="btn btn-info">Quay lại</a>
@endsection
