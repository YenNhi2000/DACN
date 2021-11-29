@extends('layout')
@section('content')

<!-- banner -->
<div class="banner_inner">
    <div class="services-breadcrumb">
        <div class="inner_breadcrumb">
            <ul class="short">
                <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <i>|</i>
                </li>
                <li>Giỏ hàng</li>
            </ul>
        </div>
    </div>

</div>
<!--//banner -->


<!--checkout-->
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3">Giỏ hàng</h3>

            @if (Session::get('cart') == true)
                
            <div class="checkout-right">

                @if (session()->has('messageCart'))
                    <div class="alert alert-success">
                        {{ session()->get('messageCart') }}
                    </div>
                @elseif(session()->has('errorCart'))
                    <div class="alert alert-danger">
                        {{ session()->get('errorCart') }}
                    </div>
                @endif

               <form>

                        @csrf

                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $total = 0;
                                    $count = 0;
                                ?>

                            @foreach(Session::get('cart') as $key => $value)
                                
                                <?php
                                    $subtotal = $value['product_price'] * $value['product_qty'];
                                    $total += $subtotal;
                                    $count++;
                                ?>

                            <tr class="rem1">
                                <td class="invert"><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td class="invert-image">
                                    <img src="{{asset('public/uploads/products/'.$value['product_image'])}}" alt="{{$value['product_name']}}" class="img-responsive">
                                    {{$value['product_name']}}
                                </td>
                                <td class="invert">
                                    {{number_format($value['product_price'],0,',','.')}}đ
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <button type="button" class="entry value-minus" data-pro_id="{{$value['session_id']}}"></button>
                                            <input class="entry value" value="{{$value['product_qty']}}" />
                                            <button type="button" class="entry value-plus active" data-pro_id="{{$value['session_id']}}"></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert"><span>{{number_format($subtotal,0,',','.')}}</span>đ</td>

                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1" data-del_pro="{{$value['session_id']}}"> </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="checkout-left row">
                <div class="col-md-4 checkout-left-basket">
                    <div class="action-cart"> 
                        <button type="button" class="btn-cart">Chọn tất cả</button>
                        <a href="{{url('/delete-all')}}">Xóa</a>
                        @if(Session::get('coupon'))
                            <a href="{{url('/delete-coupon')}}">Xóa coupon</a>
                        @endif
                    </div>
                    <div class="continue-shopping"><a href="{{url('/')}}"><i class="fa fa-chevron-left"></i>Tiếp tục mua sắm</a></div>
                </div>
                <div class="col-md-8 checkout-form">
                    <div class="row coupon-form">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 coupon"><i class="fa fa-ticket"></i>Mã Voucher</div>
                        <div class="col-sm-4">
                            <button type="button" class="choose-coupon" data-toggle="modal" data-target="#modalCoupon">
                                Nhập mã
                            </button>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                        <div id="modalCoupon" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-top">
                                        <h3 class="modal-title">Nhập mã Voucher</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-update">
                                            <form action="{{URL::to('/check-coupon')}}" method="post" class="creditly-card-form agileinfo_form">

                                                {{ csrf_field() }}

                                                <section class="creditly-wrapper wrapper">
                                                    <div class="information-wrapper">
                                                        <div class="first-row form-group">
                                                            <div class="row apply-coupon">
                                                                <div class="col-9">
                                                                    <input type="text" name="coupon" class="billing-address-name form-control" placeholder="Mã Voucher">
                                                                </div>
                                                                <div class="col-3">
                                                                    <button type="submit" class="apply">
                                                                        Áp dụng
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <!-- <div class="add-address">
                                                    <button type="button" class="btn-cancel" data-dismiss="modal">Trở lại</button>
                                                    <button type="submit" class="btn-add">OK</button>
                                                </div> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="checkout-right-basket">
                        <span>Tổng thanh toán ({{$count}} sản phẩm): {{number_format($total, 0, ',', '.')}}đ</span>
                        <a href="{{url('/thanh-toan')}}">Mua hàng</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            @else 
                <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span><br>
                <span>Mua hàng <a href="{{url('/')}}">tại đây</a></span>
            @endif
            
        </div>
    </div>
</section>
<!--//checkout-->

@endsection