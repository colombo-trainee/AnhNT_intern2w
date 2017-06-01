@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
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
@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}x</li>
				@endforeach
			</ul>
		</div>
	@endif
<form action="{{ route('list-food.store') }}" method="POST" role="form" class="col-md-6" enctype='multipart/form-data'>
	{{csrf_field()}}


	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Nhập tên món" value="{{old('name')}}" required>
	</div>
	<div class="form-group">
		<label for="">Image</label>
		<input type="file" class="form-control"  name="image" placeholder="" onchange="readURL(this)" required >
		<img src="" style="max-width: 100px;"  alt="" id="img_upload">
	</div>
	<div class="form-group">
		<label for="">Price</label>
		<input type="text" class="form-control" name="price" placeholder="Nhập giá" required  value="{{old('price')}}" >
	</div>
	<div class="form-group">
		<label for="">Description</label>
		<textarea name="description" id="input" class="form-control" rows="3" placeholder="Nhập mô tả" required> {{old('description')}} </textarea>
	</div>
	<div class="form-group">
		<label for="">Category</label>
		<select name="category_id" id="input" class="form-control">
			@foreach ($datas as $key => $data)
			<option value="{{$data->id}}">{{$data->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Special</label>
		<select name="special" id="input" class="form-control">
			<option value="0">Normal</option>
			<option value="1">Special</option>
		</select>
	</div>

	<button type="submit" class="btn btn-primary">Save</button>
	<button type="reset" class="btn btn-default" style="background: gray">Reset</button>
	<a href="{{ route('list-food.index') }}" class="btn btn-info">Quay lại</a>
</form>

@endsection

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#img_upload').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>