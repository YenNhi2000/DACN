@extends('admin_account')
@section('account_layout')

    <div class="main-page login-page">
        <h2 class="title1">Quên mật khẩu</h2>
        <div class="widget-shadow">
            <div class="login-body">

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

                <form action="{{URL::to('/recover-pass-admin')}}" method="post">

                    {{ csrf_field() }}

                    <input type="email" class="user" name="email_recover" value="{{old('email_recover')}}" placeholder="Email" />
                    <input type="submit" name="login" value="Gửi">
                    
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

@endsection