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
  {{ucfirst( substr( Route::currentRouteName(),9 ))}} Menu-top
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Restaurant</a></li>
  <li><a href="{{ route('menu-top.index') }}">{{ucfirst( substr( Route::currentRouteName(),0,8 ))}}</a></li>
  <li class="active">{{ucfirst( substr( Route::currentRouteName(),9 ))}}</li>
</ol>
@endsection
 @section('content')
<form action="{{ route('menu-top.store') }}" method="POST" role="form" class="col-md-6 col-md-offset-3" id="menu-top"> 
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control" required placeholder="Nhập menu"> 
        <p class="alert alert-danger name"></p>
    </div>
    <div class="form-group">
        <label for="">Order</label>
        <input type="number" name="order" id="order" class="form-control" required placeholder="Nhập vị trí menu"> 
        <p class="alert alert-danger order"></p>
    </div>
    
    <button type="submit" class="btn btn-primary ">Submit</button>
</form>

<script>
jQuery.noConflict();
(function( $ ) {

  $('#menu-top').on('submit',function(e){
     
      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var url = "{{route('menu-top.store')}}";

      $.ajax({
          type:'POST',
          url: url,
          data: {
            name : $('.last').text(),
            order : $('#order').val(),

          },

          success:function(data){
              if(!data.error) {
                  toastr.success('Thêm mới thành công !');
                  
                  $('.name').removeClass('has-error');
                  $('.order').removeClass('has-error');
                  setTimeout(function(){
                    location.href = '/admin/menu-top/';
                  },1000)
              } else {
                  toastr.error('Thêm mới thất bại!');
                  if (data.message.name) {
                     $('.name').addClass('has-error').text(data.message.name[0]);
                  }else{
                    $('.name').removeClass('has-error');
                  }
                  if (data.message.order) {
                     $('.order').addClass('has-error').text(data.message.order[0]);
                  }else{
                    $('.order').removeClass('has-error');
                  }
                  
              }
              
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError);
              

            }
      });
  });  
})(jQuery);
</script>
@endsection