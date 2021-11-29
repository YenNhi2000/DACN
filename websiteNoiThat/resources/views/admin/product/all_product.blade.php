@extends('admin_layout')
@section('admin_content')

<div class="tables">
    <!-- <h2 class="title1">Danh sách thương hiệu sản phẩm</h2> -->
    <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
        <h4 class="text-center text-uppercase">Danh sách sản phẩm</h4>
        
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
            
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <!-- <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select> -->
                
                <a href="{{url('/add-product')}}" class="add">Thêm mới</a>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" id="myInput" onkeyup="search()" placeholder="Tìm kiếm...">
                    <!-- <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Tìm</button>
                    </span> -->
                </div>
            </div>
        </div>
        
        <table class="table table-striped b-t b-light table-hover" id="myTable">
            <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Thư viện ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá bán</th>
                    <!-- <th>Giá gốc</th>
                    <th>Slug</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Loại</th> -->
                    <th>Trạng thái</th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                </tr> 
            </thead>    
            <tbody> 
                @foreach($all_product as $key => $pro)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $pro->product_name }}</td>
                    <td><img src="public/uploads/products/{{ $pro->product_image }}" height="70" width="70"/></td>
                    <td><a href="{{url('/add-gallery/'.$pro->product_id)}}" class="add-gallery">Thêm</a></td>
                    <td>{{ $pro->product_quantity }}</td>
                    <td>
                        @if($pro->product_price == 0)
                            {{ number_format($pro->price_cost,0,',','.') }}
                        @elseif($pro->product_price <= $pro->price_cost)
                            {{ number_format($pro->product_price,0,',','.') }}
                        @endif
                    </td>
                    <!-- <td>{{ $pro->product_slug }}</td>
                    <td>{{ $pro->category_name }}</td>
                    <td>{{ $pro->brand_name }}</td>
                    <td>{{ $pro->type_name }}</td> -->
                    <td>
                        <span class="text-ellipsis">
                            <?php
                                if($pro->product_status == 0){
                            ?>
                                    <a href="{{URL::to('/unactive-product/'.$pro->product_slug)}}"><span class="fa fa-square-o"></span></a>
                            <?php
                                }else{
                            ?>
                                    <a href="{{URL::to('/active-product/'.$pro->product_slug)}}"><span class="fa fa-check-square-o"></span></a>
                            <?php
                                }
                            ?>
                        </span>
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-product/'.$pro->product_slug)}}" class="active view" ui-toggle-class="">
                            <i class="fa fa-eye text-active" title="Xem"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-product/'.$pro->product_slug)}}" class="active edit" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-active" title="Chỉnh sửa"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{URL::to('/delete-product/'.$pro->product_slug)}}" class="active delete" onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')" ui-toggle-class="">
                            <i class="fa fa-times text-danger text" title="Xóa"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody> 
        </table>
        <nav class="nav-pagination" aria-label="Page navigation example">
            <ul class="pagination">
                {!!$all_product->links()!!}
            </ul>
        </nav>
    </div>
</div>

@endsection