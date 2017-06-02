@extends('layouts.layout')
<style>
	.table{
		margin: 0 auto;
	}
</style>
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
				<th>Order</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datas as $key => $data)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$data->name}}</td>
				<td>
					{{$data->order}}
				</td>
				<td>
					<a href="{{ route('menu-top.show',$data->id) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
					<a href="{{ route('menu-top.edit',$data->id) }}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
					<a href="javascript:;" type="submit" onclick="alertDel({{$data->id}})" class="btn btn-danger">
						<i class="fa fa-trash-o"></i> Delete 
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@if (session('status'))
<script>$.notify("{{session('status')}}", "success");</script></div>
@endif


<script>
 function alertDel(id){

  var path = "{{URL::asset('')}}admin/menu-top/" + id;	
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
