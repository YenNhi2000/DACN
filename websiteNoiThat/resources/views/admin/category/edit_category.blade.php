@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Cập nhật danh mục sản phẩm</h4>
        </div>
        <div class="form-body">
            @foreach($edit_category_product as $key => $edit_value)
            <div class="form-update">
                <form action="{{URL::to('/update-category-product/'.$edit_value->category_slug)}}" method="post">
                
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" value="{{$edit_value->category_name}}" name="cat_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" value="{{$edit_value->category_slug}}" name="cat_slug" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="cat_desc" id="ckeditor">
                            {{$edit_value->category_desc}}
                        </textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="update_cat" class="btn btn-update">Cập nhật</button>
                        <!-- <button type="button" class="btn btn-cancel">Hủy</button> -->
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection