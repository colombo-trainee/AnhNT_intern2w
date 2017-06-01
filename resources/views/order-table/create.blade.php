@extends('layouts.layout')
<style type="text/css"> 
    .alert-danger{
            display: none;
        }
    .has-error{
        display: block;
    }
</style>
@section('content-header')
<h1>
    {{ucfirst( substr( Route::currentRouteName(),12 ))}} Order-table
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
    <li><a href="{{ route('order-table.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,11 ))}}</a></li>
    <li class="active">{{ucfirst( substr( Route::currentRouteName(),12 ))}}</li>
</ol>
@endsection
@section('content')
<form action="{{ route('order-table.store') }}" method="POST" role="form" class="col-md-6 " id="order-table"> 
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control" required  placeholder="Nhập tên"> 
        <p class="alert-danger name"></p>
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="email" class="form-control" required  placeholder="Nhập email"> 
        <p class="alert-danger email"></p>
    </div>
    <div class="form-group">
        <label for="">Date</label>
        <input type="date" name="date" id="date" class="form-control" required > 
        <p class="alert-danger date"></p>
    </div>
    <div class="form-group">
        <label for="">partyNumber</label>
        <input type="number" name="partyNumber" id="partyNumber" class="form-control" placeholder="Nhập số người tham gia"> 
        <p class="alert-danger partyNumber"></p>
    </div>
    

    
    <button type="submit" class="btn btn-primary ">Submit</button>
</form>
<script type="text/javascript">
$('#order-table').on('submit',function(e){

      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var url = "{{route('order-table.store')}}";

      $.ajax({
          type:'POST',
          url: url,
          data: {
            name : $("#name").val(),
            email : $("#email").val(),
            date : $('#date').val(),
            partyNumber : $('#partyNumber').val(),
          },

          success:function(data){
              if(!data.error) {
                  toastr.success('Thêm mới thành công !');
                  $('.name').removeClass('has-error');
                  $('.email').removeClass('has-error');
                  $('.date').removeClass('has-error');
                  $('.partyNumber').removeClass('has-error');
                  setTimeout(function(){
                    location.href = '/admin/order-table/ ';
                  },1000)
              } else {
                  toastr.error('Thêm mới thất bại!');
                  if (data.message.name) {
                     $('.name').addClass('has-error').text(data.message.name[0]);
                  }else{
                    $('.name').removeClass('has-error');
                  }
                  if (data.message.email) {
                     $('.email').addClass('has-error').text(data.message.email[0]);
                  }else{
                    $('.email').removeClass('has-error');
                  }
                  if (data.message.date) {
                     $('.date').addClass('has-error').text(data.message.date[0]);
                  }else{
                    $('.date').removeClass('has-error');
                  }
                  if (data.message.partyNumber) {
                     $('.partyNumber').addClass('has-error').text(data.message.partyNumber[0]);
                  }else{
                    $('.partyNumber').removeClass('has-error');
                  }
                  
              }
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError);
              

            }
      });
  });  
  
</script>
@endsection