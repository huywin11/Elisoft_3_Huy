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
                            <p class="avail"><span class="bold">Availability:</span> {{$Detail->qty}}<br><span class="bold">View:</span> {{$Detail->view}}</p>
                            <ul class="list-inline" title="Average Rating">
                            <?php
                          for($count =0; $count < 5; $count++)
                          {
                            if($count < $rating){
                             $img ="source/images/star_green.gif";
                            }else
                            {
                               $img ="source/images/star_grey.gif";
                            }?>
                        <li title="Đánh giá sao"
                        id="{{$Detail->id}}-{{$count}}"
                        data-index="{{$count}}"
                        data-product_id="{{$Detail->id}}"
                        data-rating="{{$rating}}"
                        class="rating"> <img src="{{$img}}" >  </li>
                        <?php }
                            ?>
                          </ul><br><br>

                          <h6 class="black">Quick Overview</h6><br>

                          <p><?=$Detail->desc;?></p>

                    </div>
                    <div class="addtocart">
                    	<h4 class="left price colr bold">{{($Detail->price)/1000000}} Tr</h4>
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
                        <form method = 'get' id = "form_add_cart"action="">
                          <li><input id = "val_qty" name="{{$Detail->id}}" type="number" class="bar" value="1" min="1"  ></li>
                          <li><a href="#" class="simplebtn"><span>Add To Cart</span></a></li>
                         </form>
                         <script>
                             $( "#val_qty" ).change(function() {
                               {{route('add_to_cart',['id'=>$Detail,'qty'=>$Detail->qty])}}
                             var qty = ($("#val_qty").val());
                             if(qty <= 0){
                                 alert("So luong phai lon hon 0");
                                 location.reload();
                             }

                             $('a.simplebtn').attr('href',"cat/add/<?=$Detail->id?>/"+qty);

                             });
                         </script>
                        </ul>
                    </div>

                    <div class="clear"></div>
                </div>
                <!-- <form>
                  @csrf
                  <input type"hidden" name="comment_product_id" class="comment_product_id" value="{{$Detail->id}}">
                  <div id="comment_show"></div>

                </form> -->

                <div class="comment">
                <p><b> Viết đánh giá của bạn </b></p>
                <form action ="#" id="form_comment" method="post">
                  {{csrf_field()}}
                  <span>
                    <input type="text" placeholder="Tên bình luận" class="comment_name"/>
                    <!-- <input type="email" placeholder="Email Address"/> -->
                  </span>
                  <textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
                    <div id="notify_comment"></div>
                  <button type="button" class="btn btn-default pull-right send-comment">
                    Gửi bình luận
                  </button>
                </form>
              </div>
                <div class="prod_desc">
                	<h4 class="heading colr">Product Comments</h4>
                    <p>

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
                        	<a href="#"><img src="source/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="source/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="source/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="source/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="source/images/star_grey.gif" alt="" ></a>
                            <a href="#">({{$tt['view']}}) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="{{route('add_to_cart',['id'=>$tt,'qty'=>$tt->qty])}}" class="adcart">Add to Cart</a>
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

<script type="text/javascript">
//comment
$(document).ready(function(){
  load_comment();
  function load_comment(){
    var product_id = $('.comment_product_id').val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url:"{{url('/load-comment')}}",
      method:"POST",
      data:{product_id:product_id,_token:_token},
      success:function(data)
      {
        $('#comment_show').html(data);
      }
    });
  }
  $('.send-comment').click(function(){

    var product_id =<?php echo $Detail->id;?>;

    var comment_name = $('.comment_name').val();
    var comment_content = $('.comment_content').val();
    var _token = $('input[name="_token"]').val();
    //alert(_token);
    $.ajax({
      url:"{{route('ajax')}}",
      method:"post",
      data:{"product_id":product_id,"comment_name":comment_name,"comment_content":comment_content, "_token":_token},
      success:function(response){
        alert(data);
        // $('#notify_comment').html('<p class="test test-success">Thêm bình luận thành công</p>');
        // load_comment();
        // $('#notify_comment').fadeOut(2000);
        // $('.comment_name').val('');
        // $('#comment_content').val('');
      }
    });
  });
});


// đánh giá sao
function remove_background(id)
{
  for(var count = 1; count <=5;count++)
  {
    $('#'+id+'-'+count).css('color','#ccc');
  }
}
$(document).on('mouseenter','.rating',function(){

  var index = $(this).data("index");
  var product_id = $(this).data('product_id');
  remove_background(id);
  for(var count =1;count<=index;count++)
  {
    $('#'+id+'-'+count).css('color','#ffcc00');
  }
});
$(document).on('mouseleave','.rating',function(){
  var index = $(this).data("index");
  var product_id=$(this).data('product_id');
  var rating = $(this).data('rating');
  remove_background(id);
  for(var count=1;count<=rating; count++)
  {
    $('#'+id+'-'+count).css('color','#ffcc00');
  }
});
$(document).on('click','.rating',function()
{
  var index = $(this).data("index");
  var product_id =$(this).data('product_id');
  var _token = $('input[name="_token"]').val();
  $ajax({
    url:"{{route('insert_rating')}}",
    method:"POST",
    data:{index:index,product_id:product_id,_token:_token},
    success:function(data)
    {
      if(data=='done')
      {
        alert("Bạn đã đánh giá "+index+"Trên 5");
      }
      else
      {
      alert("Lỗi đáng giá");
      }
    }
  });
});
</script>
@endsection
