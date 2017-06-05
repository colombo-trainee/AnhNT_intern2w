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
	{{ucfirst( substr( Route::currentRouteName(),9 ))}} {{ucfirst( substr( Route::currentRouteName(),0,8 ))}}
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('order-table.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,8 ))}}</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),9 ))}}</li>
</ol>
@endsection
@section('content')
<div class="row">
	<table style="margin-left:1%;" class="col-md-4">
		<thead> 
			<tr>
				<th>Name : </th>
				<td>{{$menu->name}}</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Order : </th>
				<td>{{$menu->order}}</td>
			</tr>
			<tr>
				<th>Created At</th>
				<td>
					{{date('H:i:s d/m/Y',strtotime($menu->created_at))}}
				</td>
			</tr>
			<tr>
				<th>Updated At</th>
				<td>
					{{date('H:i:s d/m/Y',strtotime($menu->updated_at))}}
				</td>
			</tr>
		</tbody>
	</table>
</div>
<br>

<table class="table table-hover" border="1px" width="98%">
	<thead>
		<tr>
			<th>Home</th>
			@foreach ($data_all as $data)
			@if ($data->id == $menu->id)
			<th style="background: red">{{$data->name}}</th>
			@else
			<th>{{$data->name}}</th>
			@endif
			@endforeach

		</tr>
	</thead>
</table>
<a href="{{ route('menu-top.index') }}" class="btn btn-info">Quay lại</a>
@endsection