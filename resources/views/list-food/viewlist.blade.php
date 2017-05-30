@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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
	<table id="example" class="display" cellspacing="0" width="100%">
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
		<tfoot>
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
		</tfoot>
		<tbody>
			@if($datas)
			@foreach($datas as $key => $data)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$data->name}}</td>
				<td><img src="{{ asset($data->image) }}" alt="" style="width: 100px;"></td>
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
					{{-- <td  class="text-center">
						<a href="{{ route('list-food.show',$data->id) }}" class="btn btn-success">View</a>
						<a href="{{ route('list-food.edit',$data->id) }}" class="btn btn-info">Edit</a>
						<form action="{{ route('list-food.destroy',$data->id) }}" method="post" accept-charset="utf-8" style="display: inline;">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" class="btn btn-danger" onclick="alertDel({{$data->id}})">Delete</button>
						</form>
					</td> --}}
					<td class="text-center"> 
						<a href="{{ route('list-food.show',$data->id) }}" class="btn btn-success">
							<i class="fa fa-eye" aria-hidden="true"></i> Detail 
						</a>
						<a href="{{ route('list-food.edit',$data->id) }}" class="btn btn-info">
							<i class="fa fa-edit"></i> Edit 
						</a>
						{{-- <form action="#" method="DELETE" style="display: initial;"> --}}
						<a href="javascript:;" type="submit" onclick="alertDel({{$data->id}})" class="btn btn-danger">
							<i class="fa fa-trash-o"></i> Delete 
						</a>
						{{-- </form> --}}

					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td colspan="8" class="text-center"> Không có bản ghi nào </td>
				</tr>
				@endif
			</tbody>

		</table>
	@if (session('status'))
	<script>$.notify("{{session('status')}}", "success");</script></div>
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
								$msg = "After 1 second will delete ";
								$.notify($msg, "error");
                	// swal("Deleted!", "", "success");
                    // toastr.success('Xóa thành công!');
                    setTimeout(function () {
                    	location.reload();
                    }, 1000)                   
                }
            },
              // error: function (xhr, ajaxOptions, thrownError) {
              //   toastr.error(thrownError);
              // }
          });


				} else {

					$msg = "Cancelled";
					$.notify($msg, "success");
        	 // swal("Cancelled", "Your imaginary file is safe :)", "error");
            // toastr.info("Thao tác xóa đã bị huỷ bỏ!");
        }
    });
		}   
	</script>
	<script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
	<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">


	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	@endsection

