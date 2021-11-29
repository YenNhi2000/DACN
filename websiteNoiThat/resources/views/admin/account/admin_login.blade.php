@extends('admin_account')
@section('account_layout')

    <div class="main-page login-page">
        <h2 class="title1">Đăng nhập</h2>
        <div class="widget-shadow">
            <div class="login-body">

                    @if (session()->has('messageNew'))
                        <div class="alert alert-success">
                            {{ session()->get('messageNew') }}
                            {{ session()->put('messageNew', null) }}
                        </div>
                    @endif

                <form action="{{URL::to('/login-admin')}}" method="post">

                    {{ csrf_field() }}

                    <input type="email" class="user" name="ad_email" value="{{old('ad_email')}}" placeholder="Email" />
                    <input type="password" name="ad_password" class="lock" value="{{old('ad_password')}}"placeholder="Mật khẩu" />
                    <div class="forgot-grid">
                        <!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label> -->
                        <div class="forgot">
                            <a href="{{url('/forgot-pass')}}">Quên mật khẩu ?</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" name="login" value="Đăng nhập">
                    
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

@endsection