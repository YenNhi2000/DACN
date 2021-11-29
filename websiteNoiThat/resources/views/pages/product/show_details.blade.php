@extends('layout')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- banner -->
<div class="banner_inner">
    <div class="services-breadcrumb">
        <div class="inner_breadcrumb">
            <ul class="short">
                <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <i>|</i>
                </li>
                @foreach($pro_name as $key => $name)
                <li>{{$name->product_name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- //banner -->


<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop pt-lg-4 pt-3">
            @foreach($details_pro as $key => $pro)
            <div class="row mt-lg-3 mt-0">
                <div class="col-lg-4 single-right-left ">
                    <div class="grid images_3_of_2">
                        <div class="flexslider1"> 
                            <ul class="slides">
                                @foreach($gallery as $key => $gal)
                                    <li data-thumb="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}">
                                        <div class="thumb-image"> 
                                            <img width="100%" src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" 
                                                data-imagezoom="true" class="img-fluid" alt="{{ $gal->gallery_name }}"> 
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                    <h1>{{ $pro->product_name }}</h1>
                    <form>

                        @csrf
                        
                        <input type="hidden" value="{{ $pro->product_id }}" class="cart_product_id_{{$pro->product_id}}">
                        <input type="hidden" value="{{ $pro->product_name }}" class="cart_product_name_{{$pro->product_id}}">
                        <input type="hidden" value="{{ $pro->product_image }}" class="cart_product_image_{{$pro->product_id}}">

                        
                        <div class="rating1">
                            <small>Mã SP:<span>{{ $pro->product_id }}</span></small>
                        </div>

                        @if($pro->product_price == 0)
                            <p>
                                <span class="item_price">{{number_format($pro->price_cost).' '.'VND'}}</span>
                            </p>
                            <input type="hidden" value="{{ $pro->price_cost }}" class="cart_product_price_{{$pro->product_id}}">
                        @elseif($pro->product_price <= $pro->price_cost)
                            <p>
                                <span class="item_price">{{number_format($pro->product_price).' '.'VND'}}</span>
                                <del>{{number_format($pro->price_cost).' '.'VND'}}</del>
                            </p>
                            <input type="hidden" value="{{ $pro->product_price }}" class="cart_product_price_{{$pro->product_id}}">
                        @endif

                        <div class="color-quality row g-3">
                            <div class="color-quality-right col-auto">
                                <h5>Số lượng :</h5>
                            </div>
                            <div class="color-quality-right col-auto">
                                <input type="number" name="qty" min="1" value="1" class="cart_product_qty_{{ $pro->product_id }}"/>
                            </div>
                        </div>
                        <div class="occasional">
                            <div>
                                <label><span>Danh mục: </span>{{ $pro->category_name }}</label>
                            </div>
                            <div>
                                <label><span>Thương hiệu: </span>{{ $pro->brand_name }}</label>
                            </div>
                            <div>
                                <label><span>Loại sản phẩm: </span>{{ $pro->type_name }}</label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="occasion-cart">
                            <div class="googles single-item singlepage">
                                <button type="button" class="googles-cart pgoogles-cart" data-id_product="{{$pro->product_id}}"> <!-- id_product giống data('id_product') -->
                                    Thêm vào giỏ hàng
                                </button>
                                <!-- <button type="button" class="googles-cart pgoogles-cart" data-id_product="{{$pro->product_id}}">
                                    Mua ngay
                                </button> -->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
                <!--/tabs-->
                <div class="responsive_tabs">
                    <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                            <li>Mô tả</li>
                            <li>Hướng dẫn bảo quản</li>
                            <li>Đánh giá</li>
                        </ul>
                        <div class="resp-tabs-container">
                            <!--/tab_one-->
                            <div class="tab1">
                                <div class="single_page">
                                    <p>{!!$pro->product_desc!!}</p>
                                </div>
                            </div>
                            <!--//tab_one-->
                            <div class="tab2">                                
                                <div class="single_page">
                                    <p>{!!$pro->product_content!!}</p>
                                </div>
                            </div>
                            <div class="tab3">
                                <div class="single_page">
                                    <div class="bootstrap-tab-text-grids">
                                        <div class="bootstrap-tab-text-grid">
                                            <div class="bootstrap-tab-text-grid-left">
                                                <img src="images/team1.jpg" alt=" " class="img-fluid">
                                            </div>
                                            <div class="bootstrap-tab-text-grid-right">
                                                <ul>
                                                    <li><a href="#">Admin</a></li>
                                                    <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam,
                                                    quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis
                                                    autem vel eum iure reprehenderit.</p>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="add-review">
                                            <h4>add a review</h4>
                                            <form action="#" method="post">
                                                    <input class="form-control" type="text" name="Name" placeholder="Enter your email..." required="">
                                                <input class="form-control" type="email" name="Email" placeholder="Enter your email..." required="">
                                                <textarea name="Message" required=""></textarea>
                                                <input type="submit" value="SEND">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//tabs-->
            </div>
            @endforeach
        </div>
    </div>
    
    <div class="container-fluid">
        <!--/slide-->
        <div class="slider-img mid-sec mt-lg-5 mt-2 px-lg-5 px-3">
            <!--//banner-sec-->
            <h3 class="tittle-w3layouts text-left my-lg-4 my-3">Sản phẩm tương tự</h3>
            <div class="mid-slider">
                <div class="owl-carousel owl-theme row">
                    @foreach($related_pro as $key => $pro)
                    <div class="item">
                        <div class="gd-box-info text-center">
                            <div class="product-men women_two bot-gd">
                                <div class="product-googles-info slide-img googles">
                                    <form>
                                        @csrf

                                        <div class="men-pro-item">
                                            <div class="men-thumb-item">
                                                <img src="{{URL::to('public/uploads/products/'.$pro->product_image)}}" class="img-fluid" alt="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" class="link-product-add-cart">Xem nhanh</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info-product">

                                                <div class="info-product-price">
                                                    <div class="grid_meta">
                                                        <div class="product_price">
                                                            <h4>
                                                                <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_slug)}}">{{$pro->product_name}}</a>
                                                            </h4>
                                                            <div class="grid-price mt-2">
                                                                @if($pro->product_price == 0)
                                                                    <span class="money">{{number_format($pro->price_cost).' '.'VND'}}</span>
                                                                    <input type="hidden" value="{{ $pro->price_cost }}" class="cart_product_price_{{$pro->product_id}}">
                                                                @elseif($pro->product_price <= $pro->price_cost)
                                                                    <span class="money">{{number_format($pro->product_price).' '.'VND'}}</span>
                                                                    <input type="hidden" value="{{ $pro->product_price }}" class="cart_product_price_{{$pro->product_id}}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <ul class="stars">
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="googles single-item hvr-outline-out">
                                                        <input type="hidden" value="{{ $pro->product_id }}" class="cart_product_id_{{$pro->product_id}}">
                                                        <input type="hidden" value="{{ $pro->product_name }}" class="cart_product_name_{{$pro->product_id}}">
                                                        <input type="hidden" value="{{ $pro->product_image }}" class="cart_product_image_{{$pro->product_id}}">
                                                        <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">
                                                        <button type="button" class="googles-cart pgoogles-cart" data-id_product="{{$pro->product_id}}">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection