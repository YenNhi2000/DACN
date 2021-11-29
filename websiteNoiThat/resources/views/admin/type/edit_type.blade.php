@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Cập nhật loại sản phẩm</h4>
        </div>
        <div class="form-body">
            @foreach($edit_type_product as $key => $edit_value)
            <div class="form-update">
                <form action="{{URL::to('/update-type-product/'.$edit_value->type_id)}}" method="post">
                
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Tên loại</label>
                        <input type="text" value="{{$edit_value->type_name}}" name="type_name" id="slug" onkeyup="ChangeToSlug();" class="form-control">
                    </div>
                    <div class="form-group"> 
                        <label>Slug</label>
                        <input type="text" value="{{$edit_value->type_slug}}" name="type_slug" id="convert_slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mô tả danh mục</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="type_desc" id="ckeditor">
                            {{$edit_value->type_desc}}
                        </textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="update_type" class="btn btn-update">Cập nhật</button>
                        <!-- <button type="button" class="btn btn-cancel">Hủy</button> -->
                    </div>
                </form> 
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection