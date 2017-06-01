@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
	.has-error{
		display: block;
	}
</style>
@section('content-header')
<h1>
	{{ucfirst( substr( Route::currentRouteName(),10 ))}} list-food
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
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="{{ route('list-food.update',$data->id) }}" method="POST" role="form" class="col-md-6" enctype='multipart/form-data'>
	{{csrf_field()}}
	{{method_field('PUT')}}

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Nhập tên món" value="{{$data->name}}" required>
	</div>
	<div class="form-group " style="position: relative;">
		<label for="">Image</label>
		<br>
		<img src="{{ asset($data->image) }}" style="max-width: 100px;"  alt="" id="img_upload">
		<button type="button" id="edit_img">Sửa</button>
		
		
		
	</div>
	<div class="form-group" style="position: relative;"">
		<label for="">Price</label>
		<input  type="text" class="form-control" name="price" placeholder="Nhập giá" required  value="{{$data->price}}" ><p style="position: absolute;top: 32px;
		left: 5px;">$</p>
	</div>
	<div class="form-group">
		<label for="">Description</label>
		<textarea name="description" id="input" class="form-control" rows="3" placeholder="Nhập mô tả" required> {{$data->description}} </textarea>
	</div>
	<div class="form-group">
		<label for="">Category</label>
		<select name="category_id" id="input" class="form-control">
			@foreach ($datas_cate as $key => $cate)
			<option value="{{$cate->id}}" @if ($data->category_id ==$cate->id) Selected  @endif>{{$cate->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Special</label>
		<select name="special" id="input" class="form-control">
			<option value="0" @if ($data->special ==0) Selected  @endif>Normal</option>
			<option value="1" @if ($data->special ==1) Selected  @endif>Special</option>
		</select>
	</div>

	<button type="submit" class="btn btn-primary">Save</button>
	<a href="{{ route('list-food.index') }}" class="btn btn-info">Quay lại</a>
</form>
<script type="text/javascript">
	jQuery(document).ready(function() {

		$(document.body).on('click', '#edit_img', function() {
			event.preventDefault();
			$(this).parent().append('<input type="file" class="form-control" name="image" placeholder="" onchange="readURL(this)" id="input_img_upload"><button type="button" style="position: absolute;right: 0;bottom: 5px;">X</button>');
			$(this).hide();
				$(document.body).on('click', '#input_img_upload~button', function() {
				event.preventDefault();
				$(this).remove();
				$('#input_img_upload').remove();
				$('#edit_img').show('fast');
				$('#img_upload').attr('src','{{ asset($data->image) }}');
			});
		});
		
	});
	

	
	
</script>
@endsection

<script>
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