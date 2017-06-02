<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Restaurant</title>

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic|Lato|Open+Sans|Yeseva+One" rel="stylesheet">
	<style type="text/css" media="screen">
		.alert-danger{
			display: none;
			font-size: 12px;
			position: absolute;
			bottom: -28px;
			width: 100%;
		}
		.rs-form{
			position: relative;
		}
		.has-error{
			display: block;
		}
		.modal th{
			background-color: #c9a131;
      		color: white;
		}
		.modal{
			border-radius: 0px;
		}
	</style>
	<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/masonry.pkgd.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/notify.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
	<header id="header" class="">
		<div class="navbar-top">
			<div class="top-head">
				<div class="col-md-3 logo">
					<a href="#"><img src="img/logo.png"  alt=""></a>
				</div>
				<div class="menu-top pull-right">
					<nav class="navbar-custom">
						<ul>
							<li><a href="#" id="home">Home</a></li>
							@foreach ($datasMenuT as $menuT)
							<li><a href="#" id="{{ $menuT->slug_name }}">{{ $menuT->name }}</a></li>
							@endforeach
							<li class="social">
								<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="content-top text-center">
			<div class="slogan">
				<p>the right ingredients for the right food</p>
			</div>
			<img src="img/hr-bg-slide.png" alt="">
			<div class="content-button">
				<a href="#" class="btn btn-lg" style="background: rgba(0, 0, 0, 0.64);" id="BookATable">BOOK A TABLE</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#" class="btn btn-lg" id="SeeMenu">SEE THE MENU</a>
			</div>
		</div>
	</header><!-- /header -->

	<div class="container">
		<section class="about row">
			<div class="col-md-4 col-md-offset-1 text-center about-left">
				<div class="about-name">Just the right food</div>
				<img src="img/ss-content-hr.png" alt="" style="max-width: 40%;">
				<div class="about-content">If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food, delicious Lambda cakes,  muffins, and gourmet coffees make us hard to resist! Stop in today and check us out!</div>
				<img src="img/ss-about2.png" alt="" class="about-img1">
			</div>
			<div class="col-md-6 about-img text-center">
				<img src="img/ss-about1.png" alt="">
			</div>
		</section>
	</div>
	<!-- /about -->
	<section class="igredients">
		<div class="container">
			<div class="col-md-6 col-md-offset-6 ingredients-col text-center">
				<div class="ingredient-name">Fine ingredients</div>
				<img src="img/ss-ingre-hr.png" alt="">
				<div class="ingredient-content" >If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food, delicious Lambda cakes,  muffins, and gourmet coffees make us hard to resist! 
					<p>Stop in today and check us out!</p>
				</div>
				<div class="ingredient-img text-center">
					<div class="img3 pull-left"><img src="img/ss-ingre1.png" alt=""></div>
					<div class="img3 pull-left"><img src="img/ss-ingre2.png" alt=""></div>
					<div class="img3 pull-left"><img src="img/ss-ingre3.png" alt=""></div>
				</div>
			</div>
		</div>
	</section>
	<!-- /ingredients -->
	<div class="container">
		<section class="menu row grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 50% }'>
			@foreach ($datasCate as $dataCate)
			<div class="col-md-6 grid-item">
				<div class="menu-title text-center">
					<p>{{$dataCate->name}}</p>
					<img src="img/ss-content-hr.png" alt="">
				</div>
				@foreach ($datasMenuF as $dataF)
					@if ($dataCate->id == $dataF->category_id)
					<div class="menu-sub {{$dataF->special == 1 ? 'menu-special' : ''}}">
						<div class="titleNprice">
							<p class="title pull-left">
								{{$dataF->name}}
							</p>
							<p class="price pull-right">${{$dataF->price}}</p>
						</div>
						<div class="description">{{$dataF->description}}</div>
					</div>
					@endif
				@endforeach
				
			</div>
			@endforeach
		</section>
	</div>
	<!-- /menu -->
	<section class="reviews">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 review-col text-center">
				<div class="review-name">Guest Reviews</div>
				<img src="img/ss-ingre-hr.png" alt="">
				<div class="review-content text-center" ><span style="font-family: Georgia;font-size: 75px;position: absolute;color: gray;top: 139px;left: 45px;">“</span>If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food, delicious Lambda cakes,  muffins, and gourmet coffees make us hard to resist! 
					<p>Stop in today and check us out!</p>
				</div>
				<p class="review-src">- food inc, New York</p>
			</div>
		</div>
	</section>
	<!-- /review -->
	<div class="container">
		<section class="reservations row">
			<div class="col-md-6 reservations-img">
				<div class="img2"><img src="img/ss-reser1.png" alt=""></div>
				<div class="img2"><img src="img/ss-reser2.png" alt=""></div>
			</div>

			<div class="col-md-6 reservations-TF">
				<div class="reservations-text text-center">
					<div class="reservations-name">Just the right food</div>
					<img src="img/ss-content-hr.png" alt="" style="max-width: 40%;">
					<div class="reservations-content">
						If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food. <br>
						Delicious Lambda cakes,  muffins, and gourmet coffees make us hard to resist! Stop in today and check us out! Perfect materials and freshly baked food.
					</div>
				</div>
				<div class="reservations-form">
					<form id="order_table" action="" method="POST" role="form">
						{{csrf_field()}}
						<div class="form-group rs-form">
							<label for="">Name</label>
							<input type="text" id="name" class="form-control" name="name" placeholder="your name*" required>
							<p class="alert-danger text-center name"></p>
						</div>
						<div class="form-group rs-form">
							<label for="">Email</label>
							<input type="email" id="email" class="form-control" name="email" placeholder="your email*" required>
							<p class="alert-danger text-center email"></p>
						</div>
						<div class="form-group rs-form">
							<label for="">Date</label>
							<input type="date" id="date" class="form-control" name="date" required>
							<p class="alert-danger text-center date "></p>
						</div>
						<div class="form-group rs-form">
							<label for="">Party number</label>
							<input type="number" id="partyNumber" min="1" max="20" class="form-control" name="partyNumber" placeholder="How many people?">
							<p class="alert-danger text-center partyNumber"></p>
						</div>

						<button type="submit" class="btn btn-orange" id="submit" style="display: block;margin: 0 auto;">Book now!</button>
					</form>
					<div class="modal fade in" id="myModal" role="dialog">
						    <div class="modal-dialog">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close btn btn-danger" data-dismiss="modal" style="background: red;">Close</button>
						          <h1 class="modal-title title_reservations">Confirm</h1>
						        </div>
						        <div class="modal-body">
						          	<table class="table table-striped table-bordered table-hover table-checkable">
								         <thead>
								            <tr>
								               <th class="stl-column color-column col-sm-3"><label>Tiêu đề</label></th>
								               <th class="stl-column color-column"><label>Nội dung</label></th> 
								            </tr>
								         </thead>
								         <tbody>
								            <tr>
								               <th><label>Tên khách hàng</label></th>
								               <td class="al_name"></td>
								            </tr>
								            <tr>
								               <th><label>Email</label></th>
								               <td class="al_email"></td>
								            </tr>
								            <tr>
								               <th><label>Ngày đặt</label></th>
								               <td class="al_date"></td>
								            </tr>
								            <tr>
								               <th><label>Số người</label></th>
								               <td class="al_partyNumber"></td>
								            </tr>
								         </tbody>
							     	</table>
						        </div>
						        <div class="modal-footer">
						          <h2 class="text-center">Welcome !</h2>
						        </div>
						      </div>
						      
    						</div>
				</div>
			</div>
		</section>
	</div>
	<!-- /reservations -->
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 AboutUs text-center">
					<div class="About-title">About Us</div>
					<img src="img/ss-ingre-hr.png" alt="">
					<div class="About-des">
						Lambda's new and expanded Chelsea location represents a truly authentic Greek patisserie, featuring breakfasts of fresh croissants and steaming bowls of café.
						Lamda the best restaurant in town
					</div>
				</div>
				<div class="col-md-4 AboutUs text-center">
					<div class="About-title">Opening Hours</div>
					<img src="img/ss-ingre-hr.png" alt="">
					<div class="About-des">
						<div class="timework">
							<span>Mon-Thu:</span> 7:00am-8:00pm <br>
							<span>Fri-Sun:</span> 7:00am-10:00pm
						</div>
						<div class="logo-pay">
							<a href="#"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 AboutUs text-center">
					<div class="About-title">Our Location</div>
					<img src="img/ss-ingre-hr.png" alt="">
					<div class="About-des">
						<div class="addwork">
							19th Paradise Street Sitia <br>
							128 Meserole Avenue
						</div>
						<div class="logo-social">
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></i></a>
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</footer>



	<script type="text/javascript" src="js/main.js"></script>
	@if (session('fail'))
	<script>
		$.notify("{{session('fail')}}", "error");
		$('html, body').animate({ scrollTop: $('.reservations').offset().top }, 1000);
	</script>

	@endif
	@if (session('status'))
	<script>$.notify("{{session('status')}}", "success",{ position:"top center" });</script>
	@endif

	{{-- Toastr --}}
	<script src="{{asset('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/toastr.min.js')}}" type="text/javascript"></script>
	
	
	<script type="text/javascript">
		$('.close').click(function() {
			$('.modal').hide();
			
		});
	$('#order_table').on('submit',function(e){
			$('.al_name').text($("#name").val());
			$('.al_email').text($("#email").val());
			$('.al_date').text($("#date").val());
			$('.al_partyNumber').text($("#partyNumber").val());
			e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
      // var tuition_policy =tinymce.get('tuition_policy').getContent();
      var url = "{{route('order-table.store')}}";

      $.ajax({
      	type:'POST',
      	url: url,
      	data: {
      		name : $("#name").val(),
      		email : $("#email").val(),
      		date : $("#date").val(),
      		partyNumber : $("#partyNumber").val(),

      	},

      	success:function(dataE){
      		if(!dataE.error) {
      			toastr.success('Đặt bàn thành công !, Xin cảm ơn quý khách');
      			$('#submit').prop('disabled',true);
      			$('.date').removeClass('has-error');
      			$('.name').removeClass('has-error');
      			$('.email').removeClass('has-error');
      			$('.partyNumber').removeClass('has-error');
      			$('.modal').show();

      		} else {
      			toastr.error('Đặt bàn thất bại!, Vui lòng kiểm tra lại thông tin');
      			$('#submit').prop('disabled',false);
      			if (dataE.message.date) {
      				$('.date').addClass('has-error').text(dataE.message.date[0]);
      			}else{
      				$('.date').removeClass('has-error');
      			}
      			if (dataE.message.name) {
      				$('.name').addClass('has-error').text(dataE.message.name[0]);
      			}else{
      				$('.name').removeClass('has-error');
      			}
      			if (dataE.message.email) {
      				$('.email').addClass('has-error').text(dataE.message.email[0]);
      			}else{
      				$('.email').removeClass('has-error');
      			}
      			if (dataE.message.partyNumber) {
      				$('.partyNumber').addClass('has-error').text(dataE.message.partyNumber[0]);
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
</body>
</html>