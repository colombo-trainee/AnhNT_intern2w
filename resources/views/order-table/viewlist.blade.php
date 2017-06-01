@extends('layouts.layout')

@section('content-header')
<h1>
	Quản lý Order Table
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),  0, 11 ))}}</li>
</ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-6">
		<div class="pull-left">
			<a href="{{route('order-table.create')}}"><button class="btn btn-info"> Add New<i class="fa fa-plus"></i></button></a>
		</div> 
	</div>
</div>


<div class="row">
	<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Email</th>
				<th>Date</th>
				<th>Party Number</th>
				<th>Create At</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@if($datas)
			@foreach($datas as $key => $data)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$data->name}}</td>
				<td>{{$data->email}}</td>
				<td>{{date('d/m/Y',strtotime($data->date))}}</td>
				<td class="text-right" >{{$data->partyNumber}}</td>
				<td>{{date('H:i:s d/mY',strtotime($data->created_at))}}</td>
				<td class="text-center"> 
					<a href="{{ route('order-table.show',$data->id) }}" class="btn btn-success">
						<i class="fa fa-eye" aria-hidden="true"></i> Detail 
					</a>
					<a href="{{ route('order-table.edit',$data->id) }}" class="btn btn-info">
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
</div>
@if (session('status'))
<script>$.notify("{{session('status')}}", "success");</script></div>
@endif
<script>
	function alertDel(id){

		var path = "{{URL::asset('')}}admin/order-table/" + id;

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
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
@endsection

