<div class="container">
	<ul>
		<?php $menu1= App\Models\menuTop::where('parent_id',0)->get(); ?>
		@foreach ($menu1 as $item1)
		<li><a href="{!! url('the-loai/'.$item1['id'].'/'.$item1['slug_name'])!!}">{!! $item1['name'] !!}</a>
			<div>
				<ul>
					<?php $menu2= App\Models\menuTop::where('parent_id',$item1['id'])->get(); ?>
					@foreach ($menu2 as $item2)
					<li><a href="{!! url('the-loai/'.$item2['id'].'/'.$item2['slug_name'])!!}">{!! $item2['name'] !!}</a>
						<div>
							<ul>
							<?php $menu3= App\Models\menuTop::where('parent_id',$item2['id'])->get(); ?>
								@foreach ($menu3 as $item3)
								<li><a href="{!! url('the-loai/'.$item2['id'].'/'.$item2['slug_name'])!!}">{!! $item2['name'] !!}</a>
									@endforeach
								</ul>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</li>
			@endforeach
		</ul>
	</div>