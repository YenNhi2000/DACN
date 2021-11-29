<!DOCTYPE html>
<html>

<head>
	<title>Website nội thất</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- Seo -->
	<link rel="canonical" href="{{$url_canonical}}">
	<!-- //Seo -->

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="{{asset('public/frontend/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/frontend/css/login_overlay.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/frontend/css/style6.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{asset('public/frontend/css/shop.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.css')}}" type="text/css" media="all">
	<link href="{{asset('public/frontend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/frontend/css/fontawesome-all.css')}}" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
	<!-- Details -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/jquery-ui1.css')}}">
	<link href="{{asset('public/frontend/css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{asset('public/frontend/css/flexslider.css')}}" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/lightgallery.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/lightslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/prettify.css')}}">
	
	<!-- Cart -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/checkout.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/sweetalert.css')}}">

</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					<h6> Liên hệ </h6>
					<ul>
						<li>
							<i class="fa fa-phone"></i> </li>
						<li class="number-phone mt-3">0123456789</li>
					</ul>
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="{{URL::to('/')}}"> N&T </a>
					</h1>
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
					<ul class="cart-inner-info">
						<li class="button-log">
							<?php

								use Illuminate\Support\Facades\Session;

								$name = Session::get('customer_name');
								if ($name){
							?>

								<a class="btn-open" href="#">
									<span class="fa fa-user" aria-hidden="true"></span>
								</a>

								<div class="overlay-login text-left">
									<button type="button" class="overlay-close1">
										<i class="fa fa-times" aria-hidden="true"></i>
									</button>
									<div class="wrap">
										<h5 class="text-center mb-4">Thông tin cá nhân</h5>
										<div class="login p-5 bg-dark mx-auto mw-100">
											<div class="form-group">
												<label class="mb-2">Họ tên: 
													<span>
														<?php
															echo $name;
														?>
													</span>
												</label>
											</div>
											<div class="form-group">
												<label class="mb-2">Số điện thoại: <span></span></label>
											</div>
											<div class="form-group">
												<label class="mb-2">Email: <span></span></label>
											</div>
										</div>

										<ul class="list-login">
											<li> <a href="#"> Lịch sử đơn hàng </a> </li>
											<li> <a href="{{URL::to('/doi-mat-khau')}}"> Đổi mật khẩu </a> </li>
											<li> <a href="{{URL::to('/dang-xuat')}}"> Đăng xuất </a> </li>
										</ul>
									</div>
								</div>
							<?php
								}else{
							?>
								<a class="btn-open" href="{{url('/dang-nhap')}}">
									<span class="fa fa-user" aria-hidden="true"></span>
								</a>
							<?php
								}
							?>

						</li>
						<li class="galssescart galssescart2 cart cart box_1">
							@if (session()->has('customer_name'))
								<a href="{{URL::to('/gio-hang')}}" class="top_googles_cart">
									Giỏ hàng
									<i class="fa fa-cart-arrow-down"></i>
								</a>
							@else
								<a href="{{URL::to('/dang-nhap')}}" class="top_googles_cart">
									Giỏ hàng
									<i class="fa fa-cart-arrow-down"></i>
								</a>
							@endif
							
						</li>
					</ul>
				</div>
			</div>
			<div class="search">
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button">
						<i class="fa fa-search"></i>
					</button>
				</div>
				<!-- open/close -->
				<div class="overlay overlay-door">
					<button type="button" class="overlay-close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="post" class="d-flex">

						{{ csrf_field() }}

						<input class="form-control" type="search" name="keywords" id="keywords" placeholder="Tìm kiếm..." required="">
						
						<div id="search_ajax"></div>

						<button type="submit" class="btn btn-primary submit">
							<i class="fa fa-search"></i>
						</button>
					</form>
				</div>
				<!-- open/close -->
			</div>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="{{URL::to('/')}}">Trang chủ
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Giới thiệu</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">	<!-- class="dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
								Sản phẩm
							</a> 
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										@foreach($cat_pro as $key => $cat)
										<div class="col-md-4 media-list span4 text-left cate">
											<a href="{{URL::to('/danh-muc-san-pham/'.$cat->category_slug)}}">{{$cat->category_name}} </a>
										</div>
										@endforeach
									</div>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Liên hệ</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- //header -->
	</div>

				@yield('content')

	<!-- about -->
	<!--footer -->
	<footer class="py-lg-5 py-3">
		<div class="container-fluid px-lg-5 px-3">
			<div class="row footer-top-w3layouts">
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Thông tin liên hệ</h3>
					</div>
					<div class="contact-info">
						<h4>Địa chỉ :</h4>
						<p>Tân Hiệp, Phú Giáo, Bình Dương</p>
						<div class="phone">
							<h4>Liên hệ :</h4>
							<p>Điện thoại : (+84) 333 599 035</p>
							<p>Email :
								<a href="mailto:info@example.com">yennhi310703@gmail.com</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Giờ mở cửa</h3>
					</div>
					<div class="footer-text">
						<p>Thứ 2 - thứ 7: 8:30 - 20:00</p>
						<p>Chủ nhật: 8:30 - 19:00</p>
						<ul class="footer-social text-left mt-lg-4 mt-3">

							<li class="mx-2">
								<a href="#">
									<span class="fa fa-facebook-f"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fa fa-twitter"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fa fa-google-plus-g"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fa fa-linkedin-in"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fa fa-rss"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fa fa-vk"></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Links</h3>
					</div>
					<ul class="links">
						<li>
							<a href="{{url('/')}}">Trang chủ</a>
						</li>
						<li>
							<a href="#">Giới thiệu</a>
						</li>
						<!-- <li>
							<a href="404.html">Error</a>
						</li> -->
						<li>
							<a href="#">Sản phẩm</a>
						</li>
						<li>
							<a href="#">Liên hệ</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 footer-grid-w3ls">
					<div class="footer-title">
						<h3>Đăng ký nhận ưu đãi</h3>
					</div>
					<div class="footer-text">
						<p>Đăng ký để nhận được tin tức và cập nhật mới nhất từ chúng tôi.</p>
						<form action="#" method="post">
							<input class="form-control" type="email" name="Email" placeholder="Nhập email..." required="">
							<button class="btn1">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</button>
							<div class="clearfix"> </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- //footer -->

	<!--jQuery-->
	<script src="{{asset('public/frontend/js/jquery-2.2.3.min.js')}}"></script>

<!-- Details -->

	<!-- single -->
	<script src="{{asset('public/frontend/js/imagezoom.js')}}"></script>
	<!-- single -->

	<!-- script for responsive tabs -->
	<script src="{{asset('public/frontend/js/easy-responsive-tabs.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!-- FlexSlider -->
	<script src="{{asset('public/frontend/js/jquery.flexslider.js')}}"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider1').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/prettify.js')}}"></script>
	<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#imageGallery').lightSlider({
				gallery:true,
				item:1,
				loop:true,
				thumbItem:9,
				slideMargin:0,
				enableDrag: false,
				currentPagerPosition:'left',
				onSliderLoad: function(el) {
					el.lightGallery({
						selector: '#imageGallery .lslide'
					});
				}   
			});  
		});
	</script> -->
<!-- //Details -->

	<!-- Search -->
	<script type="text/javascript">
		$('#keywords').keyup(function(){
			var query = $(this).val();
			if (query != ''){
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{url('/autocomplete-ajax')}}",
					method: "post",
					data: {query:query, _token:_token},
					success:function(data){
						$('#search_ajax').fadeIn();
						$('#search_ajax').html(data);		
					}
				});
			}else{
				$('#search_ajax').fadeOut();
			}
		});

		$(document).on('click', '.li-search', function(){
			$('#keywords').val($(this).text());
			$('#search_ajax').fadeOut();
		});
	</script>
	<!-- //Search -->

	<!-- Xem nhanh -->
	<script type="text/javascript">
		$('.xemnhanh').click(function(){
			var product_id = $(this).data('id_pro');
			var _token = $('input[name="_token"]').val();
			
			$.ajax({
				url:"{{url('/quickview')}}",	
				method: "post",
				dataType:"JSON",
				data:{product_id:product_id, _token:_token},
				success:function(data){
					$('#pro_quickview_title').html(data.product_name);
					$('#pro_quickview_id').html(data.product_id);
					$('#pro_quickview_price').html(data.product_price);
					$('#pro_quickview_image').html(data.product_image);
					$('#pro_quickview_desc').html(data.product_desc);
					$('#pro_quickview_content').html(data.product_content);
				}
			});
		});
	</script>
	<!-- //Xem nhanh -->

	<!-- Chatbot Mess -->
	<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "109651088202681");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
	
	<!-- Alert -->
	<script>
		$('div.alert').delay(3000).slideUp();
	</script>
	
	<!-- newsletter modal -->
	<!-- Modal -->
	<!-- Modal -->
	<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center p-5 mx-auto mw-100">
					<h6>Join our newsletter and get</h6>
					<h3>50% Off for your first Pair of Eye wear</h3>
					<div class="login newsletter">
						<form action="#" method="post">
							<div class="form-group">
								<label class="mb-2">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="" required="">
							</div>
							<button type="submit" class="btn btn-primary submit mb-4">Get 50% Off</button>
						</form>
						<p class="text-center">
							<a href="#">No thanks I want to pay full Price</a>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$("#myModal").modal();
		});
	</script> -->
	<!-- // modal -->

	<!--search jQuery-->
	<script src="{{asset('public/frontend/js/modernizr-2.6.2.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/classie-search.js')}}"></script>
	<script src="{{asset('public/frontend/js/demo1-search.js')}}"></script>
	<!--//search jQuery-->

	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->

	<script src="{{asset('public/frontend/js/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->

	<!-- price range (top products) -->
	<script src="{{asset('public/frontend/js/jquery-ui.js')}}"></script>
	<script>
		//<![CDATA[ 
		// $(window).load(function () {
		// 	$("#slider-range").slider({
		// 		range: true,
		// 		min: 0,
		// 		max: 9000,
		// 		values: [50, 6000],
		// 		slide: function (event, ui) {
		// 			$("#amount").val(ui.values[0] + "VND - " + ui.values[1] + "VND");
		// 		}
		// 	});
		// 	$("#amount").val($("#slider-range").slider("values", 0) + "VND - " + $("#slider-range").slider("values", 1) + "VND");

		// }); //]]>

		$(document).ready(function(){
			$("#slider-range").slider({
				orientation: "horizontal",
				range: true,
				min: 10000,
				max: 20000000,
				step:10,
				values: [ 10000, 21000000 ],
				slide: function( event, ui ) {
					$("#amount").val( ui.values[ 0 ] + "đ - " + ui.values[ 1 ] + "đ" );
					$("#start_price").val( ui.values[ 0 ] );
					$("#end_price").val( ui.values[ 1 ] );
				}
			});
			$("#amount").val( $("#slider-range").slider("values", 0 ) + "đ - " + 
				$("#slider-range").slider("values", 1 ) + "đ" );
		});
	</script>
	<!-- //price range (top products) -->

	<!-- Checked -->
	<script type="text/javascript">	
		// Check brand	
		$('.brand_filter').click(function(){
			var brand = [], tempArray = [];
			$.each($("[data-filters='brand']:checked"), function(){
				tempArray.push($(this).val());
			});
			tempArray.reverse();
			if(tempArray.length !== 0){
				brand += '?brand=' + tempArray.toString();
			}
			window.location.href = brand
		});

		// Check type
		$('.type_filter').click(function(){
			var type = [], tempArray = [];
			$.each($("[data-filters='type']:checked"), function(){
				tempArray.push($(this).val());
			});
			tempArray.reverse();
			if(tempArray.length !== 0){
				type += '?type=' + tempArray.toString();
			}
			window.location.href = type
		});
	</script>
	<!-- //Checked -->

	<!-- Sort -->
	<script type="text/javascript">
        $(document).ready(function(){

            $('#sort').on('change',function(){

                var url = $(this).val(); 
                // alert(url);
				if (url) { 
					window.location = url;
				}
                return false;
            });

        }); 
	</script>
	<!-- //Sort -->
	
	<!-- Count-down -->
	<script src="{{asset('public/frontend/js/simplyCountdown.js')}}"></script>
	<link href="{{asset('public/frontend/css/simplyCountdown.css')}}" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--// Count-down -->
	
<!-- Cart -->
	<!-- <script src="{{asset('public/frontend/js/minicart.js')}}"></script> -->
	<!-- <script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script> -->

	<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>

	<script type="text/javascript">
	// Add Cart
		$(document).ready(function(){
			$('.googles-cart').click(function(){
				var id = $(this).data('id_product');
				var cart_pro_id = $('.cart_product_id_' + id).val();
				var cart_pro_name = $('.cart_product_name_' + id).val();
				var cart_pro_image = $('.cart_product_image_' + id).val();
				var cart_pro_price = $('.cart_product_price_' + id).val();
				var cart_pro_qty = $('.cart_product_qty_' + id).val();
				var _token = $('input[name="_token"]').val();
				
				$.ajax({
					url: "{{url('/add-cart')}}",
					method: 'post',
					data: {cart_pro_id:cart_pro_id, cart_pro_name:cart_pro_name, cart_pro_image:cart_pro_image,
						cart_pro_price:cart_pro_price, cart_pro_qty:cart_pro_qty, _token:_token}, 
					success:function(data){
						swal("Thêm sản phẩm vào giỏ hàng thành công!", "", "success")
					}
				});
			});
		});

	//Delete product
		
		$(document).ready(function(){
			$('.close1').click(function(){
				var pro_id = $(this).data('del_pro');
				
				$.ajax({
					url:"{{url('/delete-pro')}}",
					method:"get",
					data:{pro_id:pro_id},
					success:function(data){
						$('.alert-success').html(data);
						window.location.href = "{{url('/gio-hang')}}";
					},
					error:function(data){
						$('.alert-danger').html(data);
						window.location.href = "{{url('/gio-hang')}}";
					}
				});
			});
		});

	// quantity
		function formatNumber(nStr, decSeperate, groupSeperate) {
            nStr += '';
            x = nStr.split(decSeperate);
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
            }
            return x1 + x2;
        }

		$('.value-plus').click(function () {
			var divUpd = $('.value').val(),
				new_qty = parseInt(divUpd, 10) + 1;
			$('.value').val(new_qty);

			var id = $(this).data('pro_id');
			var _token = $('input[name="_token"]').val();
			
			$.ajax({
				url: "{{url('/update-cart')}}",
				method: 'post',
				data: {id:id, new_qty:new_qty, _token:_token}, 
				success:function(data){
					$('.alert-success').html(data);
					window.location.href = "{{url('/gio-hang')}}";
				},
			});
		});

		$('.value-minus').click(function () {
			var divUpd = $('.value').val(),
				new_qty = parseInt(divUpd, 10) - 1;
			$('.value').val(new_qty);

			var id = $(this).data('pro_id');
			var _token = $('input[name="_token"]').val();
			
			$.ajax({
				url: "{{url('/update-cart')}}",
				method: 'post',
				data: {id:id, new_qty:new_qty, _token:_token}, 
				success:function(data){
					$('.alert-success').html(data);
					window.location.href = "{{url('/gio-hang')}}";
				},
			});
		});

		// $('.value-minus').on('click', function () {
		// 	var divUpd = $(this).parent().find('.value'),
		// 		new_qty = parseInt(divUpd.val(), 10) - 1;
		// 	if (newVal >= 1) {
		// 		divUpd.val(new_qty);

		// 		var id = $(this).data('cart_id');			
		// 		var price = $('.price_cart_' + id).val();
		// 		$('.subtotal_' + id).text(formatNumber((price * newVal), ',', '.'));
		// 	}
		// });

	// Delete product
		// $(document).ready(function (c) {
		// 	$('.close1').on('click', function (c) {
		// 		var pro_id = $(this).data('del_pro');
		// 		var j = 0;
		// 		$('.rem_' + pro_id).fadeOut('slow', function (c) {
		// 			$('.rem_' + pro_id).remove();
		// 		});
		// 	});
		// });
	</script>
<!-- //Cart -->

<!-- Payment -->
	<script type="text/javascript">
	// Add Order
		$(document).ready(function(){
			$('.send_order').click(function(){
				// var order_coupon = $('.order_coupon').val();
				var shipping_id = $('.shipping_id').val();
				var order_coupon = $('.order_coupon').val();
				var order_total = $('.order_total').val();
				var payment_method = $('.payment_method').val();
				var _token = $('input[name="_token"]').val();

				if(payment_method == 0)
					alert("Bạn chưa chọn phương thức thanh toán");
				else{
					$.ajax({
						url: "{{url('/confirm-order')}}",
						method: 'post',
						data: {shipping_id:shipping_id, order_coupon:order_coupon, order_total:order_total, 
							payment_method:payment_method, _token:_token}, 
						success:function(data){
							alert('Đặt hàng thành công');
							// $('.text').html(data);
						// 	swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
						}
					});
				}

				
				// swal({
                //   title: "Xác nhận đơn hàng",
                //   text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                //   type: "warning",
                //   showCancelButton: true,
                //   confirmButtonClass: "btn-danger",
                //   confirmButtonText: "Cảm ơn, Mua hàng",

                //     cancelButtonText: "Đóng,chưa mua",
                //     closeOnConfirm: false,
                //     closeOnCancel: false
                // },
                // function(isConfirm){
                //      if (isConfirm) {
                //         var shipping_email = $('.shipping_email').val();
                //         var shipping_name = $('.shipping_name').val();
                //         var shipping_address = $('.shipping_address').val();
                //         var shipping_phone = $('.shipping_phone').val();
                //         var shipping_notes = $('.shipping_notes').val();
                //         var shipping_method = $('.payment_select').val();
                      
                //         var order_fee = $('.order_fee').val();
                //         var order_coupon = $('.order_coupon').val();
                //         var _token = $('input[name="_token"]').val();

                //         $.ajax({
                //             url: "{{url('/confirm-order')}}",
                //             method: 'POST',
                //             data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                //             success:function(){
                //                swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                //             }
                //         });

                //         window.setTimeout(function(){ 
                //              window.location.href = "{{url('/history')}}";
                //         } ,3000);

                //       } else {
                //         swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                //       }
              
                // });
			});
		});
	</script>
<!-- //Payment -->


	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->
  	<script src="{{asset('public/frontend/js/move-top.js')}}"></script>
    <script src="{{asset('public/frontend/js/easing.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            var defaults = {
                    containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

	<script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
	<!-- js file -->
</body>

</html>