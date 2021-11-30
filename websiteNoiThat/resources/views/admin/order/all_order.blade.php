@extends('admin_layout')
@section('admin_content')

<div class="tables" style="margin-top: -30px;">
    <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
        <h4 class="text-center text-uppercase">Danh sách đơn đặt hàng</h4>
        
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
        
        <table class="table table-striped b-t b-light table-hover">
            <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tình trạng đặt hàng</th>
                    <th style="width:30px;"></th>
                    <th style="width:30px;"></th>
                </tr> 
            </thead>    
            <tbody class="staffList"> 
                @foreach($all_order as $key => $order)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        @if($order->order_status==1)
                            <span class="text text-success">Đơn hàng mới</span>
                        @elseif($order->order_status==2)
                            <span class="text text-primary">Đã xử lý - Đã giao hàng</span>
                        @else
                            <span class="text text-danger">Đơn hàng đã bị hủy</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-order/'.$order->order_id)}}" class="active view" ui-toggle-class="">
                            <i class="fa fa-eye text-active" title="Xem"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active delete" onclick="return confirm('Bạn có muốn xóa nhân viên này không?')">
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