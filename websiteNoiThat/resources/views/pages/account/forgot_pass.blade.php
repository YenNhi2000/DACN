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
            <h3 class="tittle-w3layouts my-lg-4 mt-3 text-center">Quên mật khẩu</h3>
            <div class="login mx-auto mw-100">

                    @if (session()->has('messageReset'))
                        <div class="alert alert-success">
                            {{ session()->get('messageReset') }}
                            {{ session()->put('messageReset', null) }}
                        </div>
                    @elseif (session()->has('errorNew'))
                        <div class="alert alert-danger">
                            {{ session()->get('errorNew') }}
                            {{ session()->put('errorNew', null) }}  
                        </div>
                    @endif

                <form action="{{URL::to('/recover-pass')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="email" class="form-control" name="email_account" 
                            value="{{old('email_account')}}" placeholder="Nhập email...">
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
                    @elseif (session()->has('errorReset'))
                        <div class="alert-danger">
                            <ul>
                                <li>
                                    {{ session()->get('errorReset') }}
                                    {{ session()->put('errorReset', null) }}
                                </li>
                            </ul>
                            
                        </div>
                    @endif

            </div>
        </div>
    </div>
</div>

@endsection