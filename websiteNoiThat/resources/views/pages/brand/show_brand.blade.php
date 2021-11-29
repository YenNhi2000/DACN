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
                @foreach($brand_name as $key => $name)
                <li>{{$name->brand_name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!--//banner -->


<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3">{{$bra_name->brand_name}}</h3>
            <div class="row">
                <!-- product left -->
                <div class="side-bar col-lg-3">
                    <div class="search-hotel">
                        <form action="{{URL::to('/tim-kiem')}}" method="post">

						    {{ csrf_field() }}

                            <input class="form-control" type="search" name="search" placeholder="Tìm kiếm..." required="">
                            <button class="btn1">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="clearfix"> </div>
                        </form>
                    </div>

                    <!-- price range -->
                    <!-- <div class="range">
                        <h3 class="agileits-sear-head">Price range</h3>
                        <ul class="dropdown-menu6">
                            <li>
                                <div id="slider-range"></div>
                                <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                            </li>
                        </ul>
                    </div> -->
                    <!-- //price range -->

                    <!--thương hiệu -->
                    <div class="left-side">
                        <h3 class="agileits-sear-head">Thương hiệu</h3>
                        <ul>
                            <?php
                                $brand_id = [];
                                $brand_arr = [];
                                
                                if(isset($_GET['brand'])){
                                    $brand_id = $_GET['brand'];
                                }else{
                                    $brand_id = $bra_name->brand_id.",";
                                }
                                $brand_arr = explode(",", $brand_id);
                            ?>
                            @foreach($brand_pro as $key => $bra)
                            <li>
                                <input type="checkbox" class="brand_filter" data-filters="brand" value="{{ $bra->brand_id }}"
                                    name="brand_filter" {{ in_array($bra->brand_id, $brand_arr) ? 'checked' : '' }}>
                                <span>{{$bra->brand_name}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- // thương hiệu -->
                    <!-- loại -->
                    <div class="left-side">
                        <h3 class="agileits-sear-head">Loại sản phẩm</h3>
                        <ul>
                            @foreach($type_pro as $key => $name)
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">{{$name->type_name}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- //loại -->
                    <!-- chất liệu -->
                    <div class="customer-rev left-side">
                        <h3 class="agileits-sear-head">Chất liệu</h3>
                        <ul>
                            @foreach($type_pro as $key => $name)
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">{{$name->type_name}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- //chất liệu -->
                </div>
                <!-- //product left -->
                <!--/product right-->
                <div class="left-ads-display col-lg-9">
                    <div class="wrapper_top_shop">
                        <!-- <div class="row">
                            @foreach($brand_name as $key => $name)
                            <h4 class="tittle-w3layouts my-lg-4 mt-3">{{$name->brand_name}}</h4>
                            @endforeach
                        </div> -->
                        <div class="row">
                            @foreach($brand_by_id as $key => $pro)
                            <div class="col-md-4 product-men women_two shop-gd">
                                <div class="product-googles-info googles">
                                    <form>

                                        @csrf

                                        <div class="men-pro-item">
                                            <div class="men-thumb-item">
                                                <img src="{{URL::to('public/uploads/'.$pro->product_image)}}" class="img-fluid" alt="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" class="link-product-add-cart">Xem nhanh</a>
                                                    </div>
                                                </div>
                                                <!-- <span class="product-new-top">New</span> -->
                                            </div>
                                            <div class="item-info-product">
                                                <div class="info-product-price">
                                                    <div class="grid_meta">
                                                        <div class="product_price">
                                                            <h4>
                                                                <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a>
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
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
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
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--//product right-->
            </div>

            <!--/slide-->
            <div class="slider-img mid-sec">
                <!--//banner-sec-->
                <h3 class="tittle-w3layouts text-left my-lg-4 my-3">Sản phẩm nổi bật</h3>
                <div class="mid-slider">
                    <div class="owl-carousel owl-theme row">
                        @foreach($feature_pro as $key => $pro)
                        <div class="item">
                            <div class="gd-box-info text-center">
                                <div class="product-men women_two bot-gd">
                                    <div class="product-googles-info slide-img googles">
                                        <div class="men-pro-item">
                                            <div class="men-thumb-item">
                                                <img src="{{URL::to('public/uploads/'.$pro->product_image)}}" class="img-fluid" alt="">
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
                                                                <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">{{$pro->product_name}}</a>
                                                            </h4>
                                                            <div class="grid-price mt-2">
                                                                <span class="money">{{number_format($pro->product_price).' '.'VND'}}</span>
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
                                                        <form action="#" method="post">
                                                            <input type="hidden" name="cmd" value="_cart">
                                                            <input type="hidden" name="add" value="1">
                                                            <input type="hidden" name="googles_item" value="Fastrack Aviator">
                                                            <input type="hidden" name="amount" value="325.00">
                                                            <button type="submit" class="googles-cart pgoogles-cart">
                                                                <i class="fa fa-cart-plus"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection