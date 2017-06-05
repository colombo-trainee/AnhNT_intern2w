@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
</style>

@section('content-header')
<h1>
	Quản lý List Food
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),  0, 9 ))}}</li>
</ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-6">
		<div class="pull-left">
			<a href="{{route('list-food.create')}}"><button class="btn btn-info"> Add New<i class="fa fa-plus"></i></button></a>
		</div>	
	</div>
</div>


<div class="row">
	<table id="example" class="display table-bordered table-striped table table-hover" cellspacing="0" width="100%" >
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>Description</th>
				<th>Category</th>
				<th>Special</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datas as $key => $data)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$data->name}}</td>
				<td><img src="{{ asset($data->image) }}" alt="" style="width: 100px;height: 75px;"></td>
				<td>${{$data->price}}</td>
				<td width="250px">
					@if (strlen($data->description)>30)
					{{substr($data->description,0,80).'...'}}
					@else
					{{$data->description}}
					@endif
				</td>
				<td>{{$data->category->name}}</td>
				<td>
					@if ($data->special == 1)
					<span class="badge" style="background:  orange;">special</span>
					@else
					<span class="badge">normal</span>
					@endif

				</td>
					<td class="text-center"> 
						<a href="{{ route('list-food.show',$data->id) }}" class="btn btn-success">
							<i class="fa fa-eye" aria-hidden="true"></i> Detail 
						</a>
						<a href="{{ route('list-food.edit',$data->id) }}" class="btn btn-info">
							<i class="fa fa-edit"></i> Edit 
						</a>
						<a href="javascript:;" type="submit" onclick="alertDel({{$data->id}})" class="btn btn-danger">
							<i class="fa fa-trash-o"></i> Delete 
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>

		</table>
@if (session('status'))
	<script>
		jQuery.noConflict();
		(function( $ ) {
		  $(function() {
		    toastr.success('{{session('status')}}');
		  });
		})(jQuery);
		
	</script>
@endif
<script>
	function alertDel(id){

		var path = "{{URL::asset('')}}admin/list-food/" + id;

		swal({
			title: "Bạn có chắc muốn xóa?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonText: "Không",
			confirmButtonText: "Có",
		},
		function(isConfirm) {
			if (isConfirm) {  

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: "DELETE",
					url: path,
					success: function(res)
					{
						if(!res.error) {
							toastr.success('Xóa thành công!');
							setTimeout(function () {
								location.reload();
							}, 1000)                   
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
              }
        });

            
        } else {
            toastr.error("Thao tác xóa đã bị huỷ bỏ!");
        }
    });
 }   
</script>

@endsection

