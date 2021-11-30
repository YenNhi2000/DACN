<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function all_coupon(){
        $this->AuthLogin();
        
        $all_coupon = Coupon::all();
        return view('admin.coupon.all_coupon')->with(compact('all_coupon'));
    }

    public function save_coupon(Request $request){
        $this->AuthLogin();

        // $this->validate($request, [
        //     'name' => 'required|unique:tbl_coupon,coupon_name|max:255',
        //     'code' => 'required|max:255',
        //     'quantity' => 'required|numeric',
        //     'number' => 'required|numeric',
        // ],
        // [
        //     'cat_name.required' => 'Bạn chưa nhập tên mã giảm giá',
        //     'cat_name.unique' => 'Tên danh mục đã có. Vui lòng điền tên khác',
        //     'cat_slug.required' => 'Bạn chưa nhập slug của sản phẩm',
        //     'cat_desc.required' => 'Bạn chưa nhập mô tả sản phẩm',
        // ]);

        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['name'];
        $coupon->coupon_code = $data['code'];
        $coupon->coupon_quantity = $data['quantity'];
        $coupon->coupon_condition = $data['condition'];
        $coupon->coupon_number = $data['number'];
        $coupon->save();

        Session::put('messageCoupon','Thêm mã giảm giá thành công');
        return Redirect::to('all-coupon');
    }

    public function delete_coupon($coupon_id){
        $this->AuthLogin();
        $del_coupon = Coupon::find($coupon_id);
        $del_coupon->delete();
        Session::put('messageCoupon', 'Xóa mã giảm giá thành công');
        return Redirect::to('all-coupon');
    }
}
