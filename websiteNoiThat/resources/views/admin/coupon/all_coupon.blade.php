@extends('admin_layout')
@section('admin_content')

<div class="tables" style="margin-top: -30px;">
    <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
        <h4 class="text-center text-uppercase">Danh sách mã giảm giá</h4>
        
            @if (session()->has('messageCoupon'))
                <div class="alert alert-success">
                    {{ session()->get('messageCoupon') }}
                    {{ session()->put('messageCoupon', null) }}
                </div>
            @elseif(session()->has('errorCoupon'))
                <div class="alert alert-danger">
                    {{ session()->get('errorCoupon') }}
                    {{ session()->put('errorCoupon', null) }}
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
                
                <button type="button" class="add" data-toggle="modal" data-target="#modalAdd">Thêm mới</button>
                <div id="modalAdd" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-top">
                                <h3 class="modal-title">Thêm mã giảm giá</h3>
                            </div>
                            <div class="modal-body">
                                <div class="form-update">
                                    <form action="{{URL::to('/save-coupon')}}" method="post"> 
                                    
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label>Tên mã giảm giá</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mã giảm giá</label>
                                            <input type="text" name="code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng mã</label>
                                            <input type="text" name="quantity" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tính năng của mã</label>
                                            <select name="condition" class="form-control m-bot15">
                                                <option value="0">--- Chọn ---</option>
                                                <option value="1">Giảm theo phần trăm</option>
                                                <option value="2">Giảm theo tiền</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập số % hoặc số tiền giảm</label>
                                            <input type="text" name="number" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="add_coupon" class="btn btn-update">Thêm</button>
                                            <button type="button" class="btn btn-cancel" data-dismiss="modal">Hủy</button>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
        </div>
        <!-- <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="button">Tìm</button>
                </span>
            </div>
        </div> -->
        
        <table class="table table-striped b-t b-light table-hover">
            <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Tên mã giảm giá</th>
                    <th class="coupon">Mã giảm giá</th>
                    <th class="coupon">Số lượng mã</th>
                    <th class="coupon">Điều kiện</th>
                    <th class="coupon">Số giảm</th>
                    <th style="width:30px;"></th>
                </tr> 
            </thead>    
            <tbody> 
                @foreach($all_coupon as $key => $coupon) 
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $coupon->coupon_name }}</td>
                    <td class="coupon">{{ $coupon->coupon_code }}</td>
                    <td class="coupon">{{ $coupon->coupon_quantity }}</td>
                    <td class="coupon">
                        <?php
                            if($coupon->coupon_condition == 1){
                        ?>
                            Giảm theo %
                        <?php
                            }else{
                        ?>
                            Giảm theo tiền
                        <?php
                            }
                        ?>
                    </td>

                    <td class="coupon">
                        <?php
                            if($coupon->coupon_condition == 1){
                        ?>
                            Giảm {{ $coupon->coupon_number }}%
                        <?php
                            }else{
                        ?>
                            Giảm {{ number_format($coupon->coupon_number,0,',','.') }}đ
                        <?php
                            }
                        ?>
                    </td>
                    
                    <td>
                        <a href="{{URL::to('/delete-coupon/'.$coupon->coupon_id)}}" class="active delete" 
                            onclick="return confirm('Bạn có muốn xóa mã này không?')" ui-toggle-class="">
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