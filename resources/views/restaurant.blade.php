<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restaurant</title>

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Gentium+Book+Basic|Lato|Open+Sans|Yeseva+One" rel="stylesheet">

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
							<li><a href="#" id="about">About</a></li>
							<li><a href="#" id="igredients">Igredients</a></li>
							<li><a href="#" id="menu">Menu</a></li>
							<li><a href="#" id="reviews">Reviews</a></li>
							<li><a href="#" id="reservations">Reservations</a></li>
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
			<div class="col-md-6 grid-item">
				<div class="menu-title text-center">
					<p>Appetisers</p>
					<img src="img/ss-content-hr.png" alt="">
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Tzatsiki</p>
						<p class="price pull-right">$3.99</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Aubergine Salad</p>
						<p class="price pull-right" >$5.50</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Aubergine Salad</p>
						<p class="price pull-right" >$5.25</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				

			</div>
			<div class="col-md-6 grid-item">
				<div class="menu-title text-center">
					<p>Starters</p>
					<img src="img/ss-content-hr.png" alt="">
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Haloumi</p>
						<p class="price pull-right" >$3.99</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Spinach Pie</p>
						<p class="price pull-right" >$5.50</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				

			</div>
			<div class="col-md-6 grid-item">
				<div class="menu-title text-center">
					<p>Salads</p>
					<img src="img/ss-content-hr.png" alt="">
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Olive Special</p>
						<p class="price pull-right">$5.99</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub menu-special">
					<div class="titleNprice">
						<p class="title pull-left">Greek Salad</p>
						<p class="price pull-right">$5.50</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Gusto Salad</p>
						<p class="price pull-right" >$5.25</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Pastitsio</p>
						<p class="price pull-right" >$5.99</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>

				

			</div>
			<div class="col-md-6 grid-item">
				<div class="menu-title text-center">
					<p>Main Dishes</p>
					<img src="img/ss-content-hr.png" alt="">
				</div>
				<div class="menu-sub">
					<div class="titleNprice">
						<p class="title pull-left">Cornish Mackerel</p>
						<p class="price pull-right">$5.99</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub menu-special">
					<div class="titleNprice">
						<p class="title pull-left">Roast Lamb</p>
						<p class="price pull-right" >$5.50</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
				<div class="menu-sub ">
					<div class="titleNprice">
						<p class="title pull-left">Fried Chicken</p>
						<p class="price pull-right" >$5.25</p>
					</div>
					<div class="description">Refreshing traditional cucumber and garlic yoghurt dip.</div>
				</div>
			</div>
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
					<form action="" method="POST" role="form">
						<div class="form-group rs-form">
							<label for="">Name</label>
							<input type="text" class="form-control" name="name" placeholder="your name*" required>
						</div>
						<div class="form-group rs-form">
							<label for="">Email</label>
							<input type="email" class="form-control" name="email" placeholder="your email*" required>
						</div>
						<div class="form-group rs-form">
							<label for="">Date</label>
							<input type="date" class="form-control" name="date" required>
						</div>
						<div class="form-group rs-form">
							<label for="">Party number</label>
							<input type="number" class="form-control" name="part_number" placeholder="Party number">
						</div>

						

						<button type="submit" class="btn btn-orange" style="display: block;margin: 0 auto;">Book now!</button>
					</form>
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
					<div class="About-title">About Us</div>
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
	
</body>
</html>