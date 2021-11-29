@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Thêm thư viện ảnh</h4>
        </div>
        <div class="form-body">
        
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                        {{ session()->put('message', null) }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                        {{ session()->put('error', null) }}
                    </div>
                @endif
                
            <span id="error_gallery"></span>
        
            <form action="{{url('/insert-gallery/'.$pro_id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" name="upload" value="Tải ảnh" class="btn btn-success">
                    </div>
                </div>
            </form>
            <input type="hidden" class="pro_id" value="{{ $pro_id }}">

            <form>
                @csrf

                <div id="gallery_load"></div>
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