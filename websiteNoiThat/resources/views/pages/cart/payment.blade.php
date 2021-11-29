@extends('layout')
@section('content')

<div class="banner_inner">
    <div class="services-breadcrumb">
        <div class="inner_breadcrumb">

            <ul class="short">
                <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <i>|</i>
                </li>
                <li>Thanh toán</li>
            </ul>
        </div>
    </div>
</div>

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3">Thanh toán</h3>
            <div id="horizontalTab">
                <div class="checkout-left row">
                    <div class="col-sm-12 address_form">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4><i class="fa fa-map-marker"></i>Địa chỉ nhận hàng</h4>
                            </div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <button type="button" class="submit check_out" data-toggle="modal" data-target="#modalAddress">
                                    <i class="fa fa-plus"></i>Thêm địa chỉ mới
                                </button>
                            </div>
                        </div>

                        <div id="modalAddress" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-top">
                                        <h3 class="modal-title">Địa chỉ mới</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-update">
                                            <form action="{{URL::to('/save-shipping')}}" method="post" class="creditly-card-form agileinfo_form">

                                                {{ csrf_field() }}

                                                @if(session()->has('customer_id'))
                                                    <input type="hidden" name="customer_id" class="customer_id" value="{{ session()->get('customer_id') }}"/>
                                                @endif

                                                <section class="creditly-wrapper wrapper">
                                                    <div class="information-wrapper">
                                                        <div class="first-row form-group">
                                                            <div class="controls">
                                                                <input class="billing-address-name form-control" type="text" name="name" placeholder="Họ và tên">
                                                            </div>
                                                            <div class="card_number_grids">
                                                                <div class="card_number_grid_left">
                                                                    <div class="controls">
                                                                        <input class="form-control" type="text" name="phone" placeholder="Số điện thoại">
                                                                    </div>
                                                                </div>
                                                                <div class="card_number_grid_right">
                                                                    <div class="controls">
                                                                        <input class="form-control" type="text" name="address" placeholder="Địa chỉ">
                                                                    </div>
                                                                </div>
                                                                <div class="clear"> </div>
                                                            </div>
                                                            <div class="controls">
                                                                <textarea class="form-control" name="notes" rows="3" placeholder="Ghi chú"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <div class="add-address">
                                                    <button type="button" class="btn-cancel" data-dismiss="modal">Trở lại</button>
                                                    <button type="submit" class="btn-add">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="address">
                            @foreach($shipping as $key => $val)

                            <div class="form-check">
                                <!-- <input class="form-check-input" type="radio" name="shipping_id" {{ ($val->shipping_id == "$val->shipping_name") ? "checked" : "" }}> -->
                                <label class="form-check-label">
                                    <input type="hidden" name="shipping_id" class="shipping_id" value="{{$val->shipping_id}}"/>
                                    <span class="info">{{$val->shipping_name}}</span>
                                    <span class="info">{{$val->shipping_phone}}</span>
                                    <span class="info-address">{{$val->shipping_address}}</span>
                                </label>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="checkout-right">
                    <!-- <h3 class="mb-4">Xem lại giỏ hàng</h3> -->
                    <form>

                        @csrf

                        <table class="timetable_sub">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
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
                                    <td class="invert">{{$count}}</td>
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
                                                {{$value['product_qty']}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert"><span>{{number_format($subtotal,0,',','.')}}</span>đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="payment">
                    <form method="POST">

                        @csrf

                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}"/>
                            @endforeach
                        @else
                            <input type="hidden" name="order_coupon" class="order_coupon" value="Không có"/>
                        @endif

                        <div class="method-payment">
                            <div class="payment-left">
                                <h4>Phương thức thanh toán</h4>
                            </div>
                            <div class="payment-right">
                                <div class="form-group">
                                    <select name="payment_method" class="form-control m-bot15 payment_method">
                                        <option value="0">---Chọn---</option>
                                        <option value="1">Thẻ tín dụng</option>
                                        <option value="2">Thanh toán khi nhận hàng</option>
                                    </select>
                                </div>
                                <!-- <div class="form-check">
                                    <input class="form-check-input payment_method" type="radio" name="payment_method" value="0">
                                    <label class="form-check-label">
                                        Thẻ tín dụng
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input payment_method" type="radio" name="payment_method" value="1">
                                    <label class="form-check-label">
                                        Thanh toán khi nhận hàng
                                    </label>
                                </div> -->
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        
                        <div class="payment-basket">
                            <ul>
                                <li>Tổng tiền hàng
                                    <span> {{number_format($total,0,',','.')}}đ </span>
                                </li>
                                <!-- <li>Phí vận chuyển
                                    <span>$325.00 </span>
                                </li> -->

                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_condition'] == 1)
                                            <li>Voucher giảm giá
                                                <span>{{ $cou['coupon_number'] }}%</span>
                                            </li>

                                                @php
                                                    $total_coupon = ($total * $cou['coupon_number'])/100;
                                                    $money = $total-$total_coupon;
                                                @endphp
                                                
                                            <li>Tổng thanh toán
                                                <span>{{number_format($money,0,',','.')}}đ</span>
                                            </li>
                                        @else
                                            <li>Voucher giảm giá
                                                <span>{{ number_format($cou['coupon_number'],0,',','.') }}đ</span>
                                            </li>

                                                @php
                                                    $money = $total-$cou['coupon_number'];
                                                @endphp

                                            <li>Tổng thanh toán
                                                <span>{{number_format($money,0,',','.')}}đ</span>
                                            </li>
                                        @endif
                                        <input type="hidden" name="order_total" class="order_total" value="{{ $money }}"/>
                                    @endforeach
                                @endif

                            </ul>
                    
                            <input type="button" name="send_order" class="send_order" value="Đặt hàng" />
                            <span class="text"></span>
                        </div>
                    </form>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</section>

@endsection