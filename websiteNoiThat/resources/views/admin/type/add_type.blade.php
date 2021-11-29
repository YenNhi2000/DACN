@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Thêm loại sản phẩm</h4>
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
                <form action="{{URL::to('/save-type-product')}}" method="post"> 
                    
                    {{ csrf_field() }}

                    <div class="form-group"> 
                        <label>Tên loại</label>
                        <input type="text" name="type_name" class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{old('type_name')}}" >
                    </div>
                    <div class="form-group"> 
                        <label>Slug</label>
                        <input type="text" name="type_slug" class="form-control" id="convert_slug" value="{{old('type_slug')}}">
                    </div>
                    <div class="form-group"> 
                        <label>Mô tả </label>
                        <textarea class="form-control" name="type_desc" id="ckeditor" value="{{old('type_desc')}}"
                            style="resize: none" rows="8" ></textarea>
                    </div> 
                    <div class="form-group"> 
                        <label>Trạng thái</label>
                        <select name="type_status" class="form-control m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="add_type" class="btn btn-update">Thêm</button>
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