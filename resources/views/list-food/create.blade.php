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
	<form action="{{ route('list-food.store') }}" method="POST" role="form" class="col-md-6" enctype='multipart/form-data'>
		{{csrf_field()}}
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Nhập tên món" required>
		</div>
		<div class="form-group">
			<label for="">Image</label>
			<input type="file" class="form-control"  name="image" placeholder="" onchange="readURL(this)" required>
			<img src="" style="max-width: 100px;"  alt="" id="img_upload">
		</div>
		<div class="form-group">
			<label for="">Price</label>
			<input type="number" class="form-control" name="price" placeholder="Nhập giá">
		</div>
		<div class="form-group">
			<label for="">Description</label>
			<textarea name="description" id="input" class="form-control" rows="3" placeholder="Nhập mô tả"></textarea>
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

		<button type="submit" class="btn btn-primary">Submit</button>
		<button type="reset" class="btn btn-default">Reset</button>
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