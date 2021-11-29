@extends('layout')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-- banner -->
<div class="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="carousel-caption text-center">
                    <!-- <h3>Men’s eyewear
                        <span>Cool summer sale 50% off</span>
                    </h3> -->
                    <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Xem ngay</a>
                </div>
            </div>
            <div class="carousel-item item2">
                <div class="carousel-caption text-center">
                    <!-- <h3>Women’s eyewear
                        <span>Want to Look Your Best?</span>
                    </h3> -->
                    <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Xem ngay</a>

                </div>
            </div>
            <div class="carousel-item item3">
                <div class="carousel-caption text-center">
                    <!-- <h3>Men’s eyewear
                        <span>Cool summer sale 50% off</span>
                    </h3> -->
                    <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Xem ngay</a>

                </div>
            </div>
            <div class="carousel-item item4">
                <div class="carousel-caption text-center">
                    <h3>Giường cao cấp
                        <span>Giấc ngủ tuyệt vời</span>
                    </h3>
                    <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Xem ngay</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--//banner -->
</div>
<!--//banner-sec-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 my-4">Sản phẩm mới</h3>
            <div class="row mt-lg-3 mt-0">
                @foreach($new_product as $key => $pro)
                <div class="col-md-3 product-men women_two">
                    <div class="product-googles-info googles">
                        <form>
                            @csrf

                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="{{URL::to('public/uploads/products/'.$pro->product_image)}}" class="img-fluid" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <input type="button" class="link-product-add-cart xemnhanh" value="Xem nhanh"
                                                data-toggle="modal" data-target="#xemnhanh" data-id_pro="{{ $pro->product_id }}"/>
                                            <!-- <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" class="link-product-add-cart">Xem nhanh</a> -->
                                        </div>
                                    </div>
                                    <!-- <span class="product-new-top">New</span> -->
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
                                        <form>

                                            @csrf

                                            <div class="men-pro-item">
                                                <div class="men-thumb-item">
                                                    <img src="{{URL::to('public/uploads/products/'.$pro->product_image)}}" class="img-fluid" alt="">
                                                    <div class="men-cart-pro">
                                                        <div class="inner-men-cart-pro">
                                                            <input type="button" class="link-product-add-cart" data-toggle="modal" data-target="#myModal" value="Xem nhanh"/>
                                                            <!-- <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" class="link-product-add-cart">Xem nhanh</a> -->
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

            <div id="xemnhanh" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <span id="pro_quickview_title"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <span id="pro_quickview_image"></span>
                            </div>
                            <div class="col-md-7">
                                <small>Mã SP: <span id="pro_quickview_id"></span></small>
                                <span>
                                    <h2>Giá sản phẩm: 
                                        <span id="pro_quickview_price"></span>
                                    </h2><br/>
                                    <label>Số lượng:</label>
                                    <input type="number" name="qty" min="1" class="cart_product_qty" value="1" />
                                    <input type="hidden" name="proid_hidden" value="" />
                                </span><hr/>
                                <p class="quickview">Mô tả sản phẩm:</p>
                                <fieldset>
                                    <span id="pro_quickview_desc"></span>
                                    <span id="pro_quickview_content"></span>
                                </fieldset>
                                <input type="button" value="Mua ngay" class="" data-id_pro="">
                            </div>
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Xem sản phẩm</button>
                    </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection