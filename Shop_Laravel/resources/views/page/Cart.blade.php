
<?php
        // foreach($items as $item){
        //     echo"<pre>";
        //     print_r($item);
        //     echo"</pre>";

        //     //echo $item[$item->id];
        // }

        $_REQUEST['module'] = 'cart';
?>
@extends('index')
@section('content')
    <div class="col3">
        <div class="col3_top">&nbsp;</div>
        <div class="col3_center">
            <h2 class="heading colr">BedSheets</h2>
            <div class="shoppingcart">
            <ul class="tablehead">
                <li class="remove colr">Remove</li>
                <li class="thumb colr">&nbsp;</li>
                <li class="title colr">Product Name</li>
                <li class="price colr">Unit Price</li>
                <li class="qty colr">QTY</li>
                <li class="total colr">Sub Total</li>
            </ul>
            <form id='update_qty' action="{{route('update_to_cart')}}" method='post'>
            @csrf
            @if($items)

            @foreach($items as $item)
            <ul class="cartlist gray">
                <li class="remove txt"><a onClick="return confirm('Sure?')" href="{{route('remove_from_cart',$item['item']['id'])}}"><img src="source/images/delete.gif" alt="" ></a></li>
                <li class="thumb"><a href="detail.html"><img src="source/images/product//{{$item['item']['img_url']}}" alt="" ></a></li>
                <li class="title txt"><a href="detail.html">{{$item['item']['name']}}</a></li>
                <li class="price txt">{{$item['item']['price']/1000000}} Tr</li>
                <li class="qty"><input name="{{$item['item']['id']}}" type="text" value="{{$item['qty']}}" ></li>
                <li class="total txt">{{$item['item']['price']/1000000}} Tr</li>
            </ul>
            @endforeach
            @endif
            </form>
            <div class="clear"></div>
            <div class="subtotal">
                <a href="listing.html" class="simplebtn"><span>Continue Shopping</span></a>
                <a href="javascript:" onclick= "document.getElementById('update_qty').submit();" class="simplebtn"><span>Update</span></a>
                <a href="#" class="simplebtn"><span>Checkout</span></a>
                <h3 class="colr">{{$totalPrice/1000000}} Tr</h3>
            </div>
            <div class="clear"></div>
            <div class="sections">
                <div class="cartitems">
                    <h6 class="colr">Based on your selection, you may be interested in the following items:</h6>
                    <ul>
                        <li>
                            <div class="thumb">
                                <a href="detail.html"><img src="asset/images/prod_cart.gif" alt="" ></a>
                            </div>
                            <div class="desc">

                                <a href="#" class="title bold">Alexander Christie</a>
                                <p class="bold">$300</p>
                                <a href="#" class="simplebtn"><span>Add to Cart</span></a>
                                <div class="clear"></div><br >
                                <a href="#"><u>Add to Wishlist</u></a><br >
                                <a href="#"><u>Add to Compare</u></a>
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <a href="detail.html"><img src="asset/images/prod_cart.gif" alt="" ></a>
                            </div>
                            <div class="desc">
                                <a href="detail.html" class="title bold">Alexander Christie</a>
                                <p class="bold">$300</p>
                                <a href="cart.html" class="simplebtn"><span>Add to Cart</span></a>
                                <div class="clear"></div><br >
                                <a href="#"><u>Add to Wishlist</u></a><br >
                                <a href="#"><u>Add to Compare</u></a>
                            </div>
                        </li>
                    </ul>
                    <div class="clear"></div>
                    <div class="sec_botm">&nbsp;</div>
                </div>
                <div class="centersec">
                <div class="discount">
                    <h6 class="colr">Discount Codes</h6>
                    <p>Enter your coupon code if you have one.</p>
                    <ul>
                        <li><input name="discount" type="text" class="bar" ></li>
                        <li><a href="#" class="simplebtn"><span>Apply Coupon</span></a></li>
                    </ul>
                    <div class="clear"></div>
                    <div class="sec_botm">&nbsp;</div>
                </div>
                <div class="estimate">
                    <h6 class="colr">Estimate Shipping and Tax</h6>
                <p>Enter your destination to get a shipping estimate.</p>
                    <ul>
                        <li class="bold">Country</li>
                        <li>
                        <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                            <option>item1</option>
                            <option>item2</option>
                            <option>item3</option>
                        </select>
                        </li>
                    </ul>
                    <ul>
                        <li class="bold">State/Province</li>
                        <li>
                        <select name="jumpMenu" id="jumpMenu1" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                            <option>item1</option>
                            <option>item2</option>
                            <option>item3</option>
                        </select>
                        </li>
                    </ul>
                    <ul>
                        <li class="bold">Zip code</li>
                        <li><input name="discount" type="text" class="bar" ></li>
                        <li><a href="#" class="simplebtn"><span>Submit</span></a></li>
                    </ul>
                    <div class="clear"></div>
                    <div class="sec_botm">&nbsp;</div>
                </div>
                </div>
                <div class="grand_total">
                    <ul>
                        <li class="title">Subtotal</li>
                        <li class="price bold">$349.99</li>
                    </ul>
                    <ul>
                        <li class="title"><h5>Grand total</h5></li>
                        <li class="price"><h5>$349.99</h5></li>
                    </ul>
                    <div class="clear"></div>
                    <a href="#" class="proceed right">Proceed to Checkout</a>
                    <div class="clear"></div>
                    <a href="#" class="right">Checkout with Multiple Addresses</a>
                    <div class="clear"></div>
                    <div class="sec_botm">&nbsp;</div>
                </div>
            </div>
            </div>
        </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="col3_botm">&nbsp;</div>
    </div>

@endsection
