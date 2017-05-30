@extends('layouts.layout')
<style>
	th{
		width: 150px;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),12 ))}} Order Table
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('order-table.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,11 ))}}</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),12 ))}}</li>
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
			<th>Email</th>
			<td>{{$data->email}}</td>
		</tr>
		<tr>
			<th>Date</th>
			<td>{{date('d/m/Y',strtotime($data->date))}}</td>
		</tr>
		<tr>
			<th>Party Number</th>
			<td>{{$data->partyNumber}}</td>
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
<a href="{{ route('order-table.index') }}" class="btn btn-info">Quay lại</a>
@endsection
