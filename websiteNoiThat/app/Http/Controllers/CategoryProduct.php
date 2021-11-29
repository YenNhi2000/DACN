<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function all_category_product(){
        $this->AuthLogin();
        $all_cat = Category::all();
        return view('admin.category.all_category')->with(compact('all_cat'));
    }

    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.category.add_category');
    }

    public function save_category_product(Request $request){
        $this->AuthLogin();

        $this->validate($request, [
            'cat_name' => 'required|unique:tbl_category,category_name|max:255',
            'cat_slug' => 'required|max:255',
            'cat_desc' => 'required',
        ],
        [
            'cat_name.required' => 'Bạn chưa nhập tên danh mục sản phẩm',
            'cat_name.unique' => 'Tên danh mục đã có. Vui lòng điền tên khác',
            'cat_slug.required' => 'Bạn chưa nhập slug danh mục sản phẩm',
            'cat_desc.required' => 'Bạn chưa nhập mô tả danh mục sản phẩm',
        ]);

        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['cat_name'];
        $category->category_slug = $data['cat_slug'];
        $category->category_desc = $data['cat_desc'];
        $category->category_status = $data['cat_status'];
        $category->save();

        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
    }

    public function unactive_category($cat_slug){
        $this->AuthLogin();
        Category::where('category_slug', $cat_slug)->update(['category_status'=>1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function active_category($cat_slug){
        $this->AuthLogin();
        Category::where('category_slug', $cat_slug)->update(['category_status'=>0]);
        Session::put('message','Bỏ kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($cat_slug){
        $this->AuthLogin();
        $edit_category_product = Category::where('category_slug', $cat_slug)->get();
        $manager_category_product = view('admin.category.edit_category')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.category.edit_category', $manager_category_product);
    }

    public function update_category_product(Request $request, $cat_slug){
        $this->AuthLogin();
        
        $data = $request->all();
        $category = Category::find($cat_slug);
        $category->category_name = $data['cat_name'];
        $category->category_slug = $data['cat_slug'];
        $category->category_desc = $data['cat_desc'];
        $category->save();

        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($cat_slug){
        $this->AuthLogin();
        $del_cat = Category::find($cat_slug);
        $del_cat->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    //End Admin

    
    public function show_category(Request $request, $cate_slug){
        $cat_pro = Category::where('category_status','1')->orderBy('category_id','asc')->get();
        $brand_pro = Brand::where('brand_status','1')->orderBy('brand_id','asc')->get();
        $type_pro = Type::where('type_status','1')->orderBy('type_id','asc')->get();
        $feature_pro = Product::where('product_status','1')->orderBy('product_id','desc')->limit(6)->get();

        // Seo  
        $url_canonical = $request->url();

        $cat_name = DB::table('tbl_category')
            ->join('tbl_product','tbl_product.cat_id', '=', 'tbl_category.category_id')
            ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
            ->where('category_slug', $cate_slug)->first();

        if(isset($_GET['brand'])){
            $brand_id = $_GET['brand'];
            $brand_arr = explode(",", $brand_id);

            $cat_by_id = DB::table('tbl_product')
                ->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.cat_id')
                ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
                ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
                ->where('tbl_category.category_slug', $cate_slug)->where('tbl_category.category_status','1')
                ->whereIn('tbl_product.brand_id', $brand_arr)->paginate(6);
        }else{
            $cat_by_id = DB::table('tbl_product')
                ->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.cat_id')
                ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
                ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
                ->where('tbl_category.category_slug', $cate_slug)->where('tbl_category.category_status','1')
                ->where('tbl_product.brand_id', $cat_name->brand_id)->paginate(6);
        }

        if(isset($_GET['type'])){
            $type_id = $_GET['type'];
            $type_arr = explode(",", $type_id);

            $cat_by_id = DB::table('tbl_product')
                ->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.cat_id')
                ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
                ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
                ->where('tbl_category.category_slug', $cate_slug)->where('tbl_category.category_status','1')
                ->whereIn('tbl_product.type_id', $type_arr)->paginate(6);
        }else{
            $cat_by_id = DB::table('tbl_product')
                ->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.cat_id')
                ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
                ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
                ->where('tbl_category.category_slug', $cate_slug)->where('tbl_category.category_status','1')
                ->where('tbl_product.type_id', $cat_name->type_id)->paginate(6);
        }

        // $cat_name = Category::where('category_slug', $cate_slug)->get();

        // foreach($cat_name as $key => $cate){
        //     $category_id = $cate->category_id;
        // }

        // if(isset($_GET['sort_by'])){

        //     $sort_by = $_GET['sort_by'];

        //     if($sort_by=='giam_dan'){

        //         $cat_by_id = Product::with('category')->where('cat_id',$category_id)->orderBy('price_cost','DESC')->paginate(6)->appends(request()->query());

        //     }elseif($sort_by=='tang_dan'){

        //         $cat_by_id = Product::with('category')->where('cat_id',$category_id)->orderBy('price_cost','ASC')->paginate(6)->appends(request()->query());

        //     }elseif($sort_by=='kytu_za'){

        //         $cat_by_id = Product::with('category')->where('cat_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());

        //     }elseif($sort_by=='kytu_az'){

        //         $cat_by_id = Product::with('category')->where('cat_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
            
        //     }
        // }else{

        //     $cat_by_id = Product::with('category')->where('cat_id',$category_id)->orderBy('product_id','DESC')->paginate(6);
        
        // }

        //get price
        // $min_price = Product::min('product_price');
        // $max_price = Product::max('product_price');

        return view('pages.category.show_cat')
            ->with(compact('cat_pro','brand_pro','type_pro','feature_pro', 'cat_by_id', 'cat_name', 'url_canonical'));
            // 'min_price', 'max_price'));
    }
}
