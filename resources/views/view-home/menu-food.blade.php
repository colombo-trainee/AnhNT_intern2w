@extends('restaurant')

@section('menu-food')
<section class="menu row grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 50% }'>
	@foreach ($datas as $data)
	<div class="col-md-6 grid-item">
		<div class="menu-title text-center">
			<p>{{$data->category->name}}</p>
			<img src="img/ss-content-hr.png" alt="">
		</div>
		<div class="menu-sub {{$data->special == 1 ? 'menu-special' : ''}}">
			<div class="titleNprice">
				<p class="title pull-left">
					{{$data->name}}
				</p>
				<p class="price pull-right">{{$data->price}}</p>
			</div>
			<div class="description">{{$data->description}}</div>
		</div>
		

	</div>
	@endforeach
</section>
@endsection