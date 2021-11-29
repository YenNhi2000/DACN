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
                
                <li>Đăng nhập</li>
            </ul>
        </div>
    </div>
</div>
<!--//banner -->


<section class="banner-bottom-wthreelayouts py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3 text-center">Đăng nhập</h3>
            <div class="login mx-auto mw-100">

                @if (session()->has('messageNew'))
                    <div class="alert alert-success">
                        {{ session()->get('messageNew') }}
                        {{ session()->put('messageNew', null) }}
                    </div>
                @endif

                <form action="{{URL::to('/login-customer')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="email" class="form-control" name="customer_email" value="{{old('customer_email')}}" placeholder="Email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="customer_pass" value="{{old('customer_pass')}}" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ghi nhớ đăng nhập</label>
                        </div>
                        <div class="forgot-pass">
                            <a href="{{url('/quen-mat-khau')}}">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submit mb-4">Đăng nhập</button>
                    <div class="registration">
                        Bạn chưa có tài khoản?
                        <a class="signup" href="{{URL::to('/dang-ky')}}">
                            Tạo tài khoản
                        </a>
                    </div>
                </form>

                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif(session()->has('errorLogin'))
                            <div class="alert-danger">
                                <ul>
                                    <li>
                                        {{ session()->get('errorLogin') }}
                                        {{ session()->put('errorLogin', null) }}
                                    </li>
                                </ul>
                            </div>
                        @endif

            </div>
        </div>
    </div>
</div>

@endsection