@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Thêm sản phẩm</h4>
        </div>
        <div class="form-body">
        
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                        {{ session()->put('message', null) }}
                    </div>
                @elseif(session()->has('errorProduct'))
                    <div class="alert alert-danger">
                        {{ session()->get('errorProduct') }}
                        {{ session()->put('errorProduct', null) }}
                    </div>
                @endif
        
            <div class="form-update">
                <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data"> 
                    
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="pro_name" class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{old('pro_name')}}">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="pro_slug" class="form-control" id="convert_slug" value="{{old('pro_slug')}}">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="text" name="pro_qty" class="form-control" value="{{old('pro_qty')}}">
                    </div>
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" name="pro_price" class="form-control" value="{{old('pro_price')}}">
                    </div>
                    <!-- <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="text" name="pro_cost" class="form-control" value="{{old('pro_cost')}}">
                    </div> -->
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="pro_image" class="form-control" value="{{old('pro_image')}}">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="pro_desc" id="ckeditor" value="{{old('pro_desc')}}"
                            style="resize: none" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hướng dẫn bảo quản</label>
                        <textarea class="form-control" name="pro_content" id="ckeditor1" value="{{old('pro_content')}}"
                            style="resize: none" rows="5" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select name="cat_pro" class="form-control m-bot15">
                            @foreach($cat_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                        <select name="brand_pro" class="form-control m-bot15">
                            @foreach($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select name="type_pro" class="form-control m-bot15">
                            @foreach($type_product as $key => $type)
                                <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="pro_status" class="form-control m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="add_product" class="btn btn-update">Thêm</button>
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