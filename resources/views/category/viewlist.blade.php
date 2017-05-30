@extends('layouts.layout')

@section('content-header')
<h1>
	Quản lý Category
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
	<li class="active">{{ucfirst( substr( Route::currentRouteName(),  0, 8 ))}}</li>
</ol>
@endsection

@section('content')
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-6">
		<div class="pull-left">
			<a href="{{route('category.create')}}"><button class="btn btn-info"> Add New<i class="fa fa-plus"></i></button></a>
		</div>
		
	</div>
	<div class="col-md-6">
        <form method="GET" action="">
            {{csrf_field()}}
            <input id="search" type="text" class="search-class form-control typeahead" name="search"  placeholder="Nhập Thông Tin Tìm Kiếm">
        </form>
    </div>
</div>


<div class="row">
	<div class="col-md-12 table">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Name</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@if($datas)
				@foreach($datas as $key => $data)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$data->name}}</td>
					<td class="text-center"> 
						<a href="{{ route('category.show',$data->id) }}" class="btn btn-success">
							<i class="fa fa-eye" aria-hidden="true"></i> Detail 
						</a>
						<a href="{{ route('category.edit',$data->id) }}" class="btn btn-info">
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
</div>
@if (session('status'))
<script>$.notify("{{session('status')}}", "success");</script></div>
@endif
<script>
	function alertDel(id){

		var path = "{{URL::asset('')}}admin/category/" + id;

		swal({
			title: "Nếu bạn xóa sẽ xóa tất cả list-food liên quan?",
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
                	
                    setTimeout(function () {
                    	location.reload();
                    }, 1000)                   
                }
            },
              
          });


			} else {

				$msg = "Cancelled";
				$.notify($msg, "success");
        
        }
    });
	}   
</script>
<script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
<script type="text/javascript">
	$(document).ready(function() {
		$('.table').DataTable();
	} );
</script>

{{-- <script type="text/javascript">
	$(document).ready(function(){
		$("#search").autocomplete({
			source: "{{ route('search_food') }}",
			focus: function( event, ui ) {
            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
            return false;
        },
        select: function( event, ui ) {
        	window.location.href = ui.item.url;
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image1"><img src="' + item.image + '" ></div><div class="label1"><h4><b>' + item.name + '</b></h4>'+item.special+'</div></div></a>';
			return $( "<li></li>" )
			.data( "item.autocomplete", item )
			.append(inner_html)
			.appendTo( ul );
		};
	});
</script> --}}
@endsection

