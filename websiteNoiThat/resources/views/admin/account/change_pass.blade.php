@extends('admin_layout')
@section('admin_content')

    <div class="main-page login-page">
        <h2 class="title1">Đổi mật khẩu</h2>
        <div class="widget-shadow">
            <div class="login-body">

                    @if (session()->has('messageChange'))
                        <div class="alert alert-success">
                            {{ session()->get('messageChange') }}
                            {{ session()->put('messageChange', null) }}
                        </div>
                    @endif

                <form action="{{URL::to('/confirm-pass')}}" method="post">

                    {{ csrf_field() }}

                    <input type="password" name="old_pass" class="lock" value="{{old('old_pass')}}" placeholder="Mật khẩu hiện tại" />
                    <input type="password" name="new_pass" class="lock" value="{{old('new_pass')}}" placeholder="Mật khẩu mới" />
                    <input type="password" name="re_new_pass" class="lock" value="{{old('re_new_pass')}}" placeholder="Nhập lại mật khẩu">

                    <input type="submit" name="login" value="Cập nhật">
                    
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

@endsection