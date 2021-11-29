@extends('admin_layout')
@section('admin_content')

<div class="tables" style="margin-top: -30px;">
    <!-- <h2 class="title1">Danh sách thương hiệu sản phẩm</h2> -->
    <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
        <h4 class="text-center text-uppercase">Danh sách loại sản phẩm</h4>
        
            @if (session()->has('messageType'))
                <div class="alert alert-success">
                    {{ session()->get('messageType') }}
                    {{ session()->put('messageType', null) }}
                </div>
            @elseif(session()->has('errorType'))
                <div class="alert alert-danger">
                    {{ session()->get('errorType') }}
                    {{ session()->put('errorType', null) }}
                </div>
            @endif

        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs"> 
                <!-- <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select> -->
                
                <!-- <button type="button" class="add" data-toggle="modal" data-target="#modalAdd">Thêm mới</button>
                <div id="modalAdd" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-top">
                                <h3 class="modal-title">Thêm loại sản phẩm</h3>
                            </div>
                            <div class="modal-body">
                                <div class="form-update">
                                    <form action="{{URL::to('/save-type-product')}}" method="post"> 
                    
                                        {{ csrf_field() }}

                                        <div class="form-group"> 
                                            <label>Tên loại</label>
                                            <input type="text" name="type_name" class="form-control" data-validation="length" 
                                                data-validation-length="min1" data-validation-error-msg="Bạn chưa nhập tên loại sản phẩm" >
                                        </div>
                                        <div class="form-group"> 
                                            <label>Slug</label>
                                            <input type="text" name="type_slug" class="form-control" data-validation="length" 
                                                data-validation-length="min1" data-validation-error-msg="Bạn chưa nhập slug loại sản phẩm" >
                                        </div>
                                        <div class="form-group"> 
                                            <label>Mô tả </label>
                                            <textarea style="resize: none" rows="8" class="form-control" name="type_desc" id="ckeditor"></textarea>
                                        </div> 
                                        <div class="form-group"> 
                                            <label>Hiển thị</label>
                                            <select name="type_status" class="form-control m-bot15">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiển thị</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="add_type" class="btn btn-update">Thêm</button>
                                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <a href="{{url('/add-type-product')}}" class="add">Thêm mới</a>
            </div>
            <div class="col-sm-4"></div>
            <!-- <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Tìm</button>
                    </span>
                </div>
            </div> -->
        </div>
        
        <table class="table table-striped b-t b-light table-hover">
            <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Tên loại</th>
                    <th>Slug</th>
                    <th>Trạng thái</th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($all_type_product as $key => $type_pro)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $type_pro->type_name }}</td>
                    <td>{{ $type_pro->type_slug }}</td>
                    <td>
                        <span class="text-ellipsis">
                            <?php
                                if($type_pro->type_status == 0){
                            ?>
                                    <a href="{{URL::to('/unactive-type/'.$type_pro->type_slug)}}"><span class="fa fa-square-o"></span></a>
                            <?php
                                }else{
                            ?>
                                    <a href="{{URL::to('/active-type/'.$type_pro->type_slug)}}"><span class="fa fa-check-square-o"></span></a>
                            <?php
                                }
                            ?>
                        </span>
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-type-product/'.$type_pro->type_slug)}}" class="active edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active" title="Chỉnh sửa"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{URL::to('/delete-type-product/'.$type_pro->type_slug)}}" class="active delete" onclick="return confirm('Bạn có muốn xóa loại sản phẩm này không?')" ui-toggle-class="">
                            <i class="fa fa-times text-danger text" title="Xóa"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection