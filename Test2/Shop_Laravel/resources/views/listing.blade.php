@extends('index')
@section('content')
<div class="col2_center">
		<h4 class="heading colr">Featured Products</h4>
			<div class="small_banner">
				<a href="#"><img src="source/images/small_banner.gif" alt="" ></a>
			</div>
			<div class="sorting">
				<p class="left colr">4 Item(s)</p>
					<ul class="right">
						<li class="text">
								Sort by Position
								<a href="#" class="colr">Name </a>
									<a href="#" class="colr">Price</a>
							</li>
							<li class="text">Page
									<a href="#" class="colr">{{$Listing->links()}}</a>
							</li>
					</ul>
					<div class="clear"></div>
					<p class="left">View as: <a href="#" class="bold">Grid</a>&nbsp;<a href="#" class="colr">List</a></p>
					<ul class="right">
						<li class="text">
								Sort by Position
								<a href="#" class="colr">Name </a>
									<a href="#" class="colr">Price</a>
							</li>
					</ul>
			</div>
			<div class="listing">
				<h4 class="heading colr">New Products for March 2010</h4>
				<ul> <?php $m=1; ?>
           @if(count($Listing) ==0)
				 <h2>Không có sản phẩm thuộc loại {{$nameListing->name}}</h2>
					 @else
						@foreach($Listing as $l)
						<li   <?php if($m % 4 == 0) echo 'class="last"'; $m++; ?> >
								<a href="{{route('detail',$l['id'])}}" class="thumb"><img src="source/images/product/{{$l['img_url']}}" alt="" ></a>
									<h6 class="colr">{{$l['name']}}</h6>
									{{$Listing['category_id']}}
									<div class="stars">
										<?php
									for($i =0; $i < 5; $i++){
										if($i < $rating){ ?>
										<a href="#" name ="rate"><img src="source/images/star_green.gif" alt="" ></a>
									<?php  }else { ?>
										<a href="#" name ="rate"><img src="source/images/star_grey.gif" alt="" ></a>
								<?php  }}
										?>

											<a href="#">({{$l['view']}}) Reviews</a>
									</div>
									<div class="addwish">
										<a href="#">Add to Wishlist</a>
											<a href="#">Add to Compare</a>
									</div>
									<div class="cart_price">
										<a href="cart.html" class="adcart">Add to Cart</a>
											<p class="price">{{$l['price']}}</p>
									</div>
							</li>

					@endforeach
					@endif
					</ul>
			</div>

@endsection
