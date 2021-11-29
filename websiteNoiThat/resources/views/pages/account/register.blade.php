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
                
                <li>Đăng ký</li>
            </ul>
        </div>
    </div>
</div>
<!--//banner -->


<section class="banner-bottom-wthreelayouts py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3 text-center">Tạo tài khoản</h3>
            <div class="login mx-auto mw-100">
                <form action="{{URL::to('/add-customer')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" value="{{old('fullname')}}" placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" value="{{old('pass')}}" placeholder="Mật khẩu">
                    </div>
                    <button type="submit" class="btn btn-primary submit mb-4">Đăng ký</button>
                </form>
                    @if ($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>

@endsection