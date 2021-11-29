@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Thêm thương hiệu sản phẩm</h4>
        </div>
        <div class="form-body">
        
                @if (session()->has('messageBrand'))
                    <div class="alert alert-success">
                        {{ session()->get('messageBrand') }}
                        {{ session()->put('messageBrand', null) }}
                    </div>
                @elseif(session()->has('errorBrand'))
                    <div class="alert alert-danger">
                        {{ session()->get('errorBrand') }}
                        {{ session()->put('errorBrand', null) }}
                    </div>
                @endif
                
            <div class="form-update">
                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                    
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Tên thương hiệu</label>
                        <input type="text" name="brand_name" class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{old('brand_name')}}">
                            <!-- data-validation="length" data-validation-length="min1" data-validation-error-msg="Bạn chưa nhập tên thương hiệu"  -->
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="brand_slug" class="form-control" id="convert_slug" value="{{old('brand_slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả </label>
                        <textarea class="form-control" name="brand_desc" id="ckeditor" value="{{old('brand_desc')}}"
                            style="resize: none" rows="8" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select name="brand_status" class="form-control m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="add_brand" class="btn btn-update">Thêm</button>
                        <!-- <button type="button" class="btn btn-cancel" data-dismiss="modal">Hủy</button> -->
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
                        @endif

            </div>
        </div>
    </div>
</div>

@endsection