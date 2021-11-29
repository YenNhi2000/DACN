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
                
                <li>Đổi mật khẩu</li>
            </ul>
        </div>
    </div>
</div>
<!--//banner -->


<section class="banner-bottom-wthreelayouts py-3">
    <div class="container-fluid">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3 text-center">Đổi mật khẩu</h3>
            <div class="login mx-auto mw-100">

                    @if (session()->has('messageChange'))
                        <div class="alert alert-success">
                            {{ session()->get('messageChange') }}
                            {{ session()->put('messageChange', null) }}
                        </div>
                    @endif

                <form action="{{URL::to('/confirm-password')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="password" name="old_pass" class="form-control" value="{{old('old_pass')}}" placeholder="Mật khẩu hiện tại" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="new_pass" class="form-control" value="{{old('new_pass')}}" placeholder="Mật khẩu mới" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="re_new_pass" class="form-control" value="{{old('re_new_pass')}}" placeholder="Nhập lại mật khẩu">
                    </div>

                    <button type="submit" class="btn btn-primary submit mb-4">Cập nhật</button>

                </form>

                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif (session()->has('errorChange'))
                            <div class="alert-danger">
                                <ul>
                                    <li>
                                        {{ session()->get('errorChange') }}
                                        {{ session()->put('errorChange', null) }}
                                    </li>
                                </ul>
                            </div>
                        @endif

            </div>
        </div>
    </div>
</div>

@endsection