@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),9 ))}} Category
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li><a href="{{ route('category.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,8 ))}}</a></li>
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
<form action="{{ route('category.store') }}" method="POST" role="form" class="col-md-6" enctype='multipart/form-data'>
	{{csrf_field()}}


	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Nhập loại món ăn" value="{{old('name')}}" required>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
	<button type="reset" class="btn btn-default" style="background: gray">Reset</button>
	<a href="{{ route('category.index') }}" class="btn btn-info">Quay lại</a>
</form>

@endsection
