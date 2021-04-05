@extends('index')
@section('content')
<div class="col2_center">
        <h4 class="heading colr">Search</h4>
          <div id="prod_scroller">
          <a href="javascript:void(null)" class="prev">&nbsp;</a>
        <div class="anyClass scrol">
              <ul>
                  @foreach($Products as $p)
                  <li>
                    <a href="{{route('detail',$p['id'])}}"><img src="source/images/product/{{$p['img_url']}}" alt="" ></a>
                      <h6 class="colr">{{$p['name']}}</h6>
                      <p class="price bold">{{$p['price']}}</p>
                      <a href="cart.html" class="adcart">Add to Cart</a>
                  </li>
                  @endforeach
              </ul>
    </div>
      <a href="javascript:void(null)" class="next">&nbsp;</a>
  </div>
      <div class="clear"></div>
      <div class="listing">
        <h4 class="heading colr">Tìm thấy {{count($Products)}} sản phẩm</h4>
          <ul> <?php $i=1; ?>
              @foreach($Products as $p)

              <li   <?php if($i % 4 == 0) echo 'class="last"'; $i++; ?> >
                <a href="{{route('detail',$p['id'])}}" class="thumb"><img src="source/images/product/{{$p['img_url']}}" alt="" ></a>
                  <h6 class="colr">{{$p['name']}}</h6>
                  <div class="stars">
                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                      <a href="#"><img src="images/star_green.gif" alt="" ></a>
                      <a href="#"><img src="images/star_green.gif" alt="" ></a>
                      <a href="#"><img src="images/star_green.gif" alt="" ></a>
                      <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                      <a href="#">({{$p['view']}}) Reviews</a>
                  </div>
                  <div class="addwish">
                    <a href="#">Add to Wishlist</a>
                      <a href="#">Add to Compare</a>
                  </div>
                  <div class="cart_price">
                    <a href="{{route('cart',$p['id'])}}" class="adcart">Add to Cart</a>
                      <p class="price">{{$p['price']}}</p>
                  </div>
              </li>
             @endforeach
          </ul>
      </div>
@endsection
