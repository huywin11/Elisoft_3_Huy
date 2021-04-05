@extends('index')
@section('content')
<div class="col2_center">
        <h4 class="heading colr">Featured Products</h4>
          <div id="prod_scroller">
          <a href="javascript:void(null)" class="prev">&nbsp;</a>
        <div class="anyClass scrol">
              <ul>
                  @foreach($new_product as $p)
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
        <h4 class="heading colr">New Products for <?php echo date('F Y');?></h4>
          <ul> <?php $m=0; ?>
              @foreach($new_product as $p)

              <li   <?php if($m % 4 == 0) echo 'class="last"'; $m++; ?> >
                <a href="{{route('detail',$p['id'])}}" class="thumb"><img src="source/images/product/{{$p['img_url']}}" alt="" ></a>
                  <h6 class="colr">{{$p['name']}}</h6>
                  <div class="stars">
                    <form action="" method="POST">
                      <?php
                    for($i =0; $i < 5; $i++){
                      if($i < $p['rating']){ ?>
                      <a href="#" name ="rate"><img src="source/images/star_green.gif" alt="" ></a>
                    <?php  }else { ?>
                      <a href="#" name ="rate"><img src="source/images/star_grey.gif" alt="" ></a>
                  <?php  }}
                      ?>


                      <a href="#">({{$p['view']}}) Reviews</a>
                        </form>
                  </div>
                  <div class="addwish">
                    <a href="#">Add to Wishlist</a>
                      <a href="#">Add to Compare</a>
                  </div>
                  <div class="cart_price">
                    <a href="{{route('add_to_cart',['id'=>$p,'qty'=>$p->qty])}}" class="adcart">Add to Cart</a>
                      <p class="price">{{$p['price']}}</p>
                  </div>
              </li>
             @endforeach
          </ul>
      </div>
@endsection
