@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@section('content-header')
<h1>
	Quản lý Menu Top
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),  0, 8 ))}}</li>
</ol>
@endsection
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="btn-group ">
			<a href="{{route('menu-top.create')}}" style="color: white;" ><button class="btn btn-info" style="margin-bottom: 10px;"> Add New
				<i class="fa fa-plus"></i>
			</button>
			</a>
		</div>
	</div>
</div>
<div class="row">
	<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Parent ID</th>
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Parent ID</th>
				<th>Action</th>
			</tr>
		</tfoot>
		<tbody>
			@foreach($datas as $key => $data)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$data->name}}</td>
				<td>
					{{$data->parent_id}}
				</td>
				<td>
					<a href="{{ route('menu-top.show',$data->id) }}" class="btn btn-success">View</a>
					<a href="{{ route('menu-top.edit',$data->id) }}" class="btn btn-info">Edit</a>
					<a href="{{ route('menu-top.destroy',$data->id) }}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@if (session('status'))
	<script>$.notify("{{session('status')}}", "success");</script></div>
@endif
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@endsection
