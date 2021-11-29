@extends('admin_account')
@section('account_layout')

    <div class="main-page login-page">
        <h2 class="title1">Mật khẩu mới</h2>
        <div class="widget-shadow">
            <div class="login-body">

                    @php
                        $token = $_GET['token'];
                        $email = $_GET['email'];
                    @endphp

                <form action="{{URL::to('/up-pass-admin')}}" method="post">

                    {{ csrf_field() }}

                    <input type="hidden" class="form-control" name="email" value="{{$email}}">
                    <input type="hidden" class="form-control" name="token" value="{{$token}}">

                    <input type="password" class="lock" name="new_pass" 
                        value="{{old('new_pass')}}" placeholder="Nhập mật khẩu mới">

                    <input type="password" class="lock" name="re_new_pass" 
                        value="{{old('re_new_pass')}}" placeholder="Nhập lại mật khẩu">

                    <input type="submit" name="reset" value="Gửi">
                    
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

@endsection