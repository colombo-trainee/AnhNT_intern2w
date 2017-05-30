@extends('layouts.layout')
<style>
	th{
		width: 150px;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),9 ))}} Category
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('list-food.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,8 ))}}</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),9 ))}}</li>
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
			<th>Product</th>
			<td>
				@foreach ($dataFood as $dtF)
					@if ($dtF->category_id == $data->id)
						{{$dtF->name.' '}}
					@endif
				@endforeach
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
<a href="{{ route('category.index') }}" class="btn btn-info">Quay lại</a>
@endsection
