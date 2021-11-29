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
                
                <li>Quên mật khẩu</li>
            </ul>
        </div>
    </div>
</div>
<!--//banner -->


<section class="banner-bottom-wthreelayouts py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <!-- <h3 class="tittle-w3layouts my-lg-4 mt-3 text-center">Quên mật khẩu</h3> -->
            <h2 class="my-lg-4 mt-3 text-center">Mật khẩu mới</h2>
            <div class="login mx-auto mw-100">

                @php
                    $token = $_GET['token'];
                    $email = $_GET['email'];
                @endphp

                <form action="{{URL::to('/up-new-pass')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="email" value="{{$email}}">
                        <input type="hidden" class="form-control" name="token" value="{{$token}}">

                        <input type="password" class="form-control" name="pass_account" 
                            value="{{old('pass_account')}}" placeholder="Nhập mật khẩu mới">

                        <input type="password" class="form-control re-pass" name="re_pass_account" 
                            value="{{old('re_pass_account')}}" placeholder="Nhập lại mật khẩu">
                    </div>
                    <button type="submit" class="btn btn-primary submit mb-4">Gửi</button>
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