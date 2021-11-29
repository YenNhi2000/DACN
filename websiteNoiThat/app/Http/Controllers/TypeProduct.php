<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\Redirect;
session_start();

class TypeProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function all_type_product(){
        $this->AuthLogin();
        $all_type_product = Type::all();
        $manager_type_product = view('admin.type.all_type')->with('all_type_product', $all_type_product);
        return view('admin_layout')->with('admin.type.all_type', $manager_type_product);
    }

    public function add_type_product(){
        $this->AuthLogin();
        return view('admin.type.add_type');
    }

    public function save_type_product(Request $request){
        $this->AuthLogin();
        $this->validate($request, [
            'type_name' => 'required|unique:tbl_type,type_name|max:255',
            'type_slug' => 'required|max:255',
            'type_desc' => 'required',
        ],
        [
            'type_name.required' => 'Bạn chưa nhập tên loại sản phẩm',
            'type_name.unique' => 'Tên loại sản phẩm đã có. Vui lòng điền tên khác',
            'type_slug.required' => 'Bạn chưa nhập slug loại sản phẩm',
            'type_desc.required' => 'Bạn chưa nhập mô tả loại sản phẩm',
        ]);


        $data = $request->all();
        $type = new Type();
        $type->type_name = $data['type_name'];
        $type->type_slug = $data['type_slug'];
        $type->type_desc = $data['type_desc'];
        $type->type_status = $data['type_status'];
        $type->save();

        Session::put('messageType','Thêm loại sản phẩm thành công');
        return Redirect::to('all-type-product');
    }

    public function unactive_type($type_pro_slug){
        $this->AuthLogin();
        Type::where('type_slug', $type_pro_slug)->update(['type_status'=>1]);
        Session::put('messageType','Kích hoạt loại sản phẩm thành công');
        return Redirect::to('all-type-product');
    }

    public function active_type($type_pro_slug){
        $this->AuthLogin();
        Type::where('type_slug', $type_pro_slug)->update(['type_status'=>0]);
        Session::put('messageType','Bỏ kích hoạt loại sản phẩm thành công');
        return Redirect::to('all-type-product');
    }

    public function edit_type_product($type_pro_slug){
        $this->AuthLogin();
        $edit_type_product = Type::where('type_slug', $type_pro_slug)->get();
        $manager_type_product = view('admin.type.edit_type')->with('edit_type_product', $edit_type_product);
        return view('admin_layout')->with('admin.type.edit_type', $manager_type_product);
    }

    public function update_type_product(Request $request, $type_pro_slug){
        $this->AuthLogin();

        $data = $request->all();
        $type = Type::find($type_pro_slug);
        $type->type_name = $data['type_name'];
        $type->type_slug = $data['type_slug'];
        $type->type_desc = $data['type_desc'];
        $type->save();

        Session::put('messageType','Cập nhật loại sản phẩm thành công');
        return Redirect::to('all-type-product');
    }

    public function delete_type_product($type_pro_slug){
        $this->AuthLogin();
        $del_type = Type::find($type_pro_slug);
        $del_type->delete();
        Session::put('messageType','Xóa loại sản phẩm thành công');
        return Redirect::to('all-type-product');
    }
    //End Admin
    

    public function show_type($type_slug){
        $cat_pro = Category::where('category_status','1')->orderBy('category_id','asc')->get();
        $brand_pro = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $type_pro = Type::where('type_status','1')->orderBy('type_id','desc')->get();
        $feature_pro = Product::where('product_status','1')->orderBy('product_id','asc')->limit(6)->get();

        $type_by_id = DB::table('tbl_product')
            ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.cat_id')
            ->where('tbl_product.cat_id', $type_slug)->get();

        $type_name = Type::where('type_slug', $type_slug)->limit(1)->get();

        return view('pages.type.show_cat')
            ->with(compact('cat_pro','brand_pro','type_pro','feature_pro','type_by_id','type_name'));
    }
}
