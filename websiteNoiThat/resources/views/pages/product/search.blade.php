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
                <li>Tìm kiếm</li>
            </ul>
        </div>
    </div>

</div>
<!--//banner -->



<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 my-4">Kết quả tìm kiếm</h3>
            <h5>
                <?php
                    use Illuminate\Support\Facades\Session;

                    $search = Session::get('search');
                    if ($search){
                        echo '<span>'.$search.'</span>';
                        Session::put('search', null);
                    }
                ?>
            </h5>
            
            <p>
                <?php
                    $message = Session::get('message');
                    if ($message){
                        echo '<span>'.$message.'</span>';
                        Session::put('message', null);
                    }
                ?>
            </p>

            <div class="row mt-lg-3 mt-0">
                @foreach($search_pro as $key => $pro)
                <div class="col-md-3 product-men women_two">
                    <div class="product-googles-info googles">
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
        </div>
    </div>
</section>

@endsection