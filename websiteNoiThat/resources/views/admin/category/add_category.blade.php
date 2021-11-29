@extends('admin_layout')
@section('admin_content')

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
        <div class="form-title text-center text-uppercase">
            <h4>Thêm danh mục sản phẩm</h4>
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

            <div class="form-update">
                <form action="{{URL::to('/save-category-product')}}" method="post" id="formAdd"> 
                                    
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" name="cat_name" class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{old('cat_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="cat_slug" class="form-control" id="convert_slug" value="{{old('cat_slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả</label>
                        <textarea class="form-control" name="cat_desc" id="ckeditor" value="{{old('cat_desc')}}" 
                            style="resize: none" rows="8" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                        <select name="cat_status" class="form-control m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="add_category" class="btn btn-update">Thêm</button>
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