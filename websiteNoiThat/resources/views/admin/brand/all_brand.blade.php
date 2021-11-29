@extends('admin_layout')
@section('admin_content')

<div class="tables" style="margin-top: -30px;">
    <!-- <h2 class="title1">Danh sách thương hiệu sản phẩm</h2> -->
    <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
        <h4 class="text-center text-uppercase">Danh sách thương hiệu sản phẩm</h4>
        
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

        <div class="row w3-res-tb mb-2">
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
                                <h3 class="modal-title">Thêm thương hiệu sản phẩm</h3>
                            </div>
                            <div class="modal-body">
                                <div class="form-update">
                                    <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                    
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label>Tên thương hiệu</label>
                                            <input type="text" name="brand_name" class="form-control" data-validation="length" 
                                                data-validation-length="min1" data-validation-error-msg="Bạn chưa nhập tên thương hiệu" >
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" name="brand_slug" class="form-control" data-validation="length" 
                                                data-validation-length="min1" data-validation-error-msg="Bạn chưa nhập slug thương hiệu" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả </label>
                                            <textarea style="resize: none" rows="8" class="form-control" name="brand_desc" id="ckeditor"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hiển thị</label>
                                            <select name="brand_status" class="form-control m-bot15">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiển thị</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="add_brand" class="btn btn-update">Thêm</button>
                                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <a href="{{url('/add-brand-product')}}" class="add">Thêm mới</a>
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
                    <th>Tên thương hiệu</th>
                    <th>Slug</th>
                    <th>Trạng thái</th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                </tr> 
            </thead>    
            <tbody> 
                @foreach($all_brand_product as $key => $brand_pro)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $brand_pro->brand_name }}</td>
                    <td>{{ $brand_pro->brand_slug }}</td>
                    <td>
                        <span class="text-ellipsis">
                            <?php
                                if($brand_pro->brand_status == 0){
                            ?>
                                    <a href="{{URL::to('/unactive-brand/'.$brand_pro->brand_slug)}}"><span class="fa fa-square-o"></span></a>
                            <?php
                                }else{
                            ?>
                                    <a href="{{URL::to('/active-brand/'.$brand_pro->brand_slug)}}"><span class="fa fa-check-square-o"></span></a>
                            <?php
                                }
                            ?>
                        </span>
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_slug)}}" class="active edit" >
                            <i class="fa fa-pencil-square-o text-success text-active" title="Chỉnh sửa"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_slug)}}" class="active delete" onclick="return confirm('Bạn có muốn xóa thương hiệu này không?')">
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