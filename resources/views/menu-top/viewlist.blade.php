@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
</style>
@section('content')
<h3 class="page-title">Menu Top</h3>
<div class="row">
	<div class="col-md-6">
		<div class="btn-group ">
			<button id="sample_editable_1_new" class="btn sbold green"> <a href="{{route('menu-top.create')}}">Add New</a>
				<i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="col-md-6">
		<div id="sample_1_filter" class="dataTables_filter pull-right">
			<label>Search:<input type="search" class="form-control input-sm input-small input-inline" style="width: 70%;" placeholder="" aria-controls="sample_1">
			</label>
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
					<th>Parent ID</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($datas as $key => $data)
				<tr>
					<td>{{$key}}</td>
					<td>{{$data->name}}</td>
					<td>
						{{$data->parent_id}}
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
