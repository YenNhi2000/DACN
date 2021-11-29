@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Cập nhật sản phẩm</h4>
        </div>
        <div class="form-body">
            @foreach($edit_product as $key => $edit_value)
            <div class="form-update">
                <form action="{{URL::to('/update-product/'.$edit_value->product_slug)}}" method="post" enctype="multipart/form-data">
                
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="pro_name" class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{ $edit_value->product_name }}">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="pro_slug" class="form-control" id="convert_slug" value="{{ $edit_value->product_slug }}">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="text" name="pro_qty" class="form-control" value="{{ $edit_value->product_quantity }}">
                    </div>
                    <div class="form-group">
                        <label>Giá bán</label>

                        @if($edit_value->product_price == 0)
                            <input type="text" name="pro_price" class="form-control" value="{{ $edit_value->price_cost }}">
                        @elseif($edit_value->product_price <= $edit_value->price_cost)
                            <input type="text" name="pro_price" class="form-control" value="{{ $edit_value->product_price }}">
                        @endif
                        
                    </div>
                    <!-- <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="text" name="pro_cost" class="form-control" value="{{ $edit_value->price_cost }}">
                    </div> -->
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="pro_image" class="form-control">
                        <img src="{{URL::to('public/uploads/products/'.$edit_value->product_image)}}" height="70" width="70"/>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="pro_desc" id="ckeditor">
                            {{ $edit_value->product_desc }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Hướng dẫn bảo quản</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="pro_content" id="ckeditor1">
                            {{ $edit_value->product_content }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select name="cat_pro" class="form-control m-bot15">
                            @foreach( $cat_product as $key => $cate )
                                @if($cate->category_id == $edit_value->cat_id)
                                    <option selected value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                @else
                                    <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                        <select name="brand_pro" class="form-control m-bot15">
                            @foreach($brand_product as $key => $brand)
                                @if($brand->brand_id == $edit_value->brand_id)
                                    <option selected value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                @else
                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                @endif                                    
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <select name="type_pro" class="form-control m-bot15">
                            @foreach($type_product as $key => $type)
                                @if($type->type_id == $edit_value->type_id)
                                    <option selected value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                                @else
                                    <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="update_product" class="btn btn-update">Cập nhật</button>
                        <!-- <button type="button" class="btn btn-cancel">Hủy</button> -->
                    </div>
                </form> 
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection