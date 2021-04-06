<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Huy</title>
<base href="{{asset('')}}">
<!-- // Stylesheets // -->
<link rel="stylesheet" href="source/css/style.css" type="text/css" >
<link rel="stylesheet" href="source/css/nivo-slider.css" type="text/css" media="screen" >
<link rel="stylesheet" href="source/css/default.advanced.css" type="text/css" >
<link rel="stylesheet" href="source/css/contentslider.css" type="text/css"  >
<link rel="stylesheet" href="source/css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" >
<!-- // Javascript // -->
<script type="text/javascript" src="source/js/jquery.min.js"></script>
<script type="text/javascript" src="source/js/jquery.min14.js"></script>
<script type="text/javascript" src="source/source/js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="source/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="source/js/scroll.js"></script>
<script type="text/javascript" src="source/js/ddaccordion.js"></script>
<script type="text/javascript" src="source/js/acordn.js"></script>
<script type="text/javascript" src="source/js/cufon-yui.js"></script>
<script type="text/javascript" src="source/js/Trebuchet_MS_400-Trebuchet_MS_700-Trebuchet_MS_italic_700-Trebuchet_MS_italic_400.font.js"></script>
<script type="text/javascript" src="source/js/cufon.js"></script>
<script type="text/javascript" src="source/js/contentslider.js"></script>
<script type="text/javascript" src="source/js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="source/js/lightbox.js"></script>
</head>

<body>
<a name="top"></a>
<div id="wrapper_sec">
	<!-- Header -->
	<div id="masthead">
    	<div class="secnd_navi">
        	<ul class="links">
							 @if(Auth::check())
                <li><a href="account.html">Xin chào {{Auth::user()->name}}</a></li>
                <li><a href="account.html">My Account</a></li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="cart.html">My Cart</a></li>
                <li><a href="#">Checkout</a></li>
								<li class="last"><a href="{{route('register')}}">Register</a></li>
                <li class="last"><a href="{{route('logout')}}">Logout</a></li>
								@else
								<li>Default welcome msg!</li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="cart.html">My Cart</a></li>
                <li><a href="#">Checkout</a></li>
                <li class="last"><a href="{{route('register')}}">Register</a></li>
                <li class="last"><a href="{{route('login')}}">Log In</a></li>
								@endif
            </ul>
            <ul class="network">
            	<li>Share with us:</li>
                <li><a href="#"><img src="images/linkdin.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/rss.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/twitter.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/facebook.gif" alt="" ></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    	<div class="logo">
        	<a href="index.html"><img src="images/logo.png" alt="" ></a>
            <h5 class="slogn">The best watches for all</h5>
        </div>
        <ul class="search">
        	<li><input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" ></li>
            <li><a href="#" class="searchbtn">Search for Products</a></li>
        </ul>
        <div class="clear"></div>
        <div class="navigation">
            <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
                <li><a href="index.html">Trang chủ</a></li>
                <li><a href="static.html">Giới thiệu</a></li>
                <li class="dir"><a href="#">Sản phẩm</a>
                    <ul class="bordergr big">
												@foreach($new_department as $d)
                        <li class="dir"><span class="colr navihead bold">	{{$d['name']}}</span>
                            <ul>
																@foreach($new_category as $c)
																@if($d['id'] == $c['department_id'] )
                                <li><a href="{{route('listing',$c['id'])}}">{{$c['name']}}</a></li>
																@endif
                                @endforeach
                            </ul>
                        </li>
                       	@endforeach
                    </ul>
                </li>
                <li><a href="login.html">BedSheets</a></li>
                <li class="dir"><a href="#">Pages</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Pages</span>
                            <ul>
                                <li class="clear"><a href="index.html">Home Page</a></li>
                                <li class="clear"><a href="account.html">Account Page</a></li>
                                <li class="clear"><a href="cart.html">Shopping Cart Page</a></li>
                                <li class="clear"><a href="categories.html">Categories</a></li>
                                <li class="clear"><a href="detail.html">Product Detail Page</a></li>
                                <li class="clear"><a href="listing.html">Listing Page</a></li>
                                <li class="clear"><a href="login.html">Login Page</a></li>
                                <li class="clear"><a href="static.html">Static Page</a></li>
                                <li class="clear"><a href="contact.html">Contact Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
                <li class="dir"><a href="#">Themes</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Themes</span>
                            <ul>
                                <li class="clear"><a href="../blue/index.html">Blue</a></li>
                                <li class="clear"><a href="../green/index.html">Green</a></li>
                                <li class="clear"><a href="../orange/index.html">Orange</a></li>
                                <li class="clear"><a href="index.html">Purple</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="lang">
            	<li>Your Language:</li>
                <li><a href="#"><img src="images/flag1.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/flag2.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/flag3.gif" alt="" ></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
    <!-- Scroolling Products -->
    <div class="content_sec">
    	<!-- Column2 Section -->
        <div class="col2">
        	<div class="col2_top">&nbsp;</div>
                <h2 class="heading colr">Login</h2>
                <div class="login">
                  <form class="" action="{{route('login')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                	<div class="registrd">
                    	<h3>Please Sign In</h3>
                        <p>If you have an account with us, please log in.</p>
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                          {{$err}}
                          @endforeach
                        </div>
                        @endif
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                        @endif
                        <ul class="forms">
                        	<li class="txt">Email Address <span class="req">*</span></li>
                            <li class="inputfield"><input type="text" name="email" class="bar" ></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Password <span class="req">*</span></li>
                            <li class="inputfield"><input type="password" name="password" class="bar" ></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">&nbsp;</li>
                            <li class="simplebtn"><button type="submit">Login</button> <a href="#" class="forgot">Forgot Your Password?</a></li>
                        </ul>
                    </div>
                      </form>
                    <div class="newcus">
                    	<h3>Please Sign In</h3>
                        <p>
                        	By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                        </p>
                        <a href="{{route('register')}}" class="simplebtn"><span>Register</span></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="col3_botm">&nbsp;</div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!-- Footer Section -->
<div id="footer">
    	<div class="foot_inr">
        <div class="foot_top">
        	<div class="foot_logo">
            	<a href="#"><img src="images/footer_logo.png" alt="" ></a>
            </div>
            <div class="botm_navi">
            	<ul>
                	<li><a href="#">Home page</a></li>
                    <li><a href="#">Who we are</a></li>
                    <li><a href="#">Formoda news &amp; blog</a></li>
                    <li><a href="#">Follow us on Twitter</a></li>
                    <li><a href="#">Befriend us on Facebook</a></li>
                </ul>
                <ul>
                	<li><a href="#">Shipping &amp; Returns</a></li>
                    <li><a href="#">Secure Shopping</a></li>
                    <li><a href="#">International Shipping</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Group Sales</a></li>
                </ul>
                <ul>
                	<li><a href="#">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                    <li><a href="#">Wish List</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul>
                	<li>Contact us</li>
                    <li>T: 01230 012312</li>
                    <li>E: <a href="mailto:info@abc.com">info@abc.com</a></li>
                    <li><a href="#">Site map</a></li>
                    <li><a href="#">Terms of use &amp; privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="foot_bot">
        	<div class="emailsignup">
        	<h5>Join Our Mailing List</h5>
            <ul class="inp">
            	<li><input name="newsletter" type="text" class="bar" ></li>
                <li><a href="#" class="signup">Signup</a></li>
            </ul>
            <div class="clear"></div>
        </div>
            <div class="botm_links">
            	<ul>
                	<li class="first"><a href="#">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
                <div class="clear"></div>
                <p>© 2010 DUMY. All Rights Reserved</p>
            </div>
            <div class="copyrights">
        	<p>
            	Registered address: County House, 1 New Road, BTQ5 8LZ. Company No. 6172469<br >
Office address: NewTrends Ltd, The Byre, Berry Pomeroy, Devon, TQ9 6LH
            </p>
        </div>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="topdiv">
        	<a href="#top" class="top">Top</a>
        </div>
        </div>
    </div>
</body>
</html>
