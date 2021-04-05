@extends('index')
@section('content')
<div class="col2_center">
        	<h4 class="heading colr">{{$Detail->name}}</h4>
            <div class="prod_detail">
            	<div class="big_thumb">
                	<div id="slider2">
                        <div class="contentdiv">
                        	<img src="source/images/product/{{$Detail->img_url}}" alt="" >
                            <a rel="example_group" href="source/images/product/{{$Detail->img_url}}" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                    </div>
                    <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" ></a>
                    <div style="float:left; width:189px !important; overflow:hidden;">
                    <div class="anyClass" id="paginate-slider2">
                        <ul>
                            <li><a href="#" class="toc"><img src="source/images/product/{{$Detail->img_url}}" alt="" ></a></li>
                        </ul>
                    </div>
                    </div>
                    <a href="javascript:void(null)" class="nextsmall"><img src="images/next.gif" alt="" ></a>
                    <script type="text/javascript" src="js/cont_slidr.js"></script>
                </div>
                <div class="desc">
                	<div class="quickreview">
                            <a href="#" class="bold black left"><u>Be the first to review this product</u></a>
                            <div class="clear"></div>
                            <p class="avail"><span class="bold">Availability:</span> {{$Detail->qty}}<br><span class="bold">View:</span> {{$productView->view}}</p>
                          <h6 class="black">Quick Overview</h6><br>

                          {{$Detail->desc}}

                    </div>
                    <div class="addtocart">
                    	<h4 class="left price colr bold">{{$Detail->price}}</h4>
                            <div class="clear"></div>
                            <ul class="margn addicons">
                                <li>
                                    <a href="#">Add to Wishlist</a>
                                </li>
                                <li>
                                    <a href="#">Add to Compare</a>
                                </li>
                        	</ul>
                            <div class="clear"></div>
                        <ul class="left qt">
                   	    <li class="bold qty">QTY</li>
                            <li><input name="qty" type="text" class="bar" ></li>
                            <li><a href="cart.html" class="simplebtn"><span>Add To Cart</span></a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="prod_desc">
                	<h4 class="heading colr">Product Description</h4>
                    <p>
                    	{{$Detail->desc}}
                </div>
            </div>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2010</h4>
                <ul><?php $i=1; ?>
									@foreach($tt_Detail as $tt)
                  <li   <?php if($i % 4 == 0) echo 'class="last"'; $i++; ?> >
                    	<a href="{{route('detail',$tt['id'])}}" class="thumb"><img src="source/images/product/{{$tt->img_url}}" alt="" ></a>
                        <h6 class="colr">{{$tt['name']}}</h6>
                        <div class="stars">

                        	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_grey.gif" alt="" ></a>

                            <a href="#">({{$tt['view']}}) Reviews</a>

                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            <p class="price">{{$tt['price']}}</p>
                        </div>
                    </li>
									@endforeach
                </ul>
            </div>
            <div class="tags_big">
            	<h4 class="heading">Product Tags</h4>
                <p>Add Your Tags:</p>
                <span><input name="tags" type="text" class="bar" ></span>
                <div class="clear"></div>
                <span><a href="#" class="simplebtn"><span>Add Tags</span></a></span>
                <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
            </div>


@endsection
