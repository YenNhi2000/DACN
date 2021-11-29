@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Cập nhật thương hiệu sản phẩm</h4>
        </div>
        <div class="form-body">            
            @foreach($edit_brand_product as $key => $edit_value)
            <div class="form-update">
                <form action="{{URL::to('/update-brand-product/'.$edit_value->brand_slug)}}" method="post">
                
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Tên thương hiệu</label>
                        <input type="text" value="{{$edit_value->brand_name}}" name="brand_name" id="slug" onkeyup="ChangeToSlug();" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" value="{{$edit_value->brand_slug}}" name="brand_slug" id="convert_slug" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="brand_desc" id="ckeditor" style="resize: none" rows="8" >{{$edit_value->brand_desc}}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="update_brand" class="btn btn-update">Cập nhật</button>
                        <!-- <button type="button" class="btn btn-cancel">Hủy</button> -->
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection