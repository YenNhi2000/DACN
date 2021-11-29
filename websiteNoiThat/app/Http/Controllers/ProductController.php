<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function all_product(){
        $this->AuthLogin();

        $all_product = DB::table('tbl_product') 
            ->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.cat_id')
            ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')            
            ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
            ->orderBy('tbl_product.product_id','desc')->paginate(6);

        $manager_product = view('admin.product.all_product')
            ->with(compact('all_product'));
        return view('admin_layout')->with('admin.product.all_product', $manager_product);
    }

    public function add_product(){
        $this->AuthLogin();
        $cat = DB::table('tbl_category')->orderBy('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        $type = DB::table('tbl_type')->orderBy('type_id','desc')->get();

        return view('admin.product.add_product')->with('cat_product', $cat)->with('brand_product', $brand)
            ->with('type_product', $type);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $this->validate($request, [
            'pro_name' => 'required|unique:tbl_product,product_name|max:255',
            'pro_slug' => 'required|max:255',
            'pro_qty' => 'required|integer',
            'pro_desc' => 'required',
            'pro_content' => 'required',
            'pro_price' => 'required|integer',
            'pro_image' => 'required|image',    //mimes:jpg,bmp,png      image (jpg, jpeg, png, bmp, gif, svg, or webp).
        ],
        [
            'pro_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'pro_name.unique' => 'Tên sản phẩm đã có. Vui lòng điền tên khác',
            'pro_slug.required' => 'Bạn chưa nhập slug của sản phẩm',
            'pro_qty.required' => 'Bạn chưa nhập số lượng của sản phẩm',
            'pro_qty.integer' => 'Số lượng phải là một số nguyên',
            'pro_desc.required' => 'Bạn chưa nhập mô tả sản phẩm',
            'pro_content.required' => 'Bạn chưa nhập hướng dẫn bảo quản sản phẩm',
            'pro_price.required' => 'Bạn chưa nhập giá bán của sản phẩm',
            'pro_price.integer' => 'Giá sản phẩm phải là một số nguyên',
            'pro_image.required' => 'Bạn chưa chọn hình ảnh sản phẩm',
            'pro_image.image' => 'Tệp bạn chọn không phải là hình ảnh',
        ]);

        $data = array();
        $data['product_name'] = $request->pro_name;
        $data['product_slug'] = $request->pro_slug;
        $data['product_quantity'] = $request->pro_qty;
        $data['product_desc'] = $request->pro_desc;
        $data['product_content'] = $request->pro_content;
        $data['product_price'] = 0;
        $data['price_cost'] = $request->pro_price;
        $data['cat_id'] = $request->cat_pro;
        $data['brand_id'] = $request->brand_pro;
        $data['type_id'] = $request->type_pro;
        $data['product_status'] = $request->pro_status;
        $get_img = $request->file('pro_image');

        $path = "public/uploads/products/";
        $path_gallery = "public/uploads/gallery/";

        if($get_img){
            $new_img = $get_img->getClientOriginalName();
            $get_img->move($path, $new_img);
            File::copy($path.$new_img, $path_gallery.$new_img);
            $data['product_image'] = $new_img;
        }

        $pro_id = DB::table('tbl_product')->insertGetId($data);
        $gallery = new Gallery();
        $gallery->gallery_image = $new_img;
        $gallery->gallery_name = $request->pro_name;
        $gallery->product_id = $pro_id;
        $gallery->save();

        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }

    public function unactive_product($pro_slug){
        $this->AuthLogin();
        Product::where('product_slug', $pro_slug)->update(['product_status'=>1]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function active_product($pro_slug){
        $this->AuthLogin();
        Product::where('product_slug', $pro_slug)->update(['product_status'=>0]);
        Session::put('message','Bỏ kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($pro_slug){
        $this->AuthLogin();
        $cat_product = Category::orderBy('category_id','desc')->get();
        $brand_product = Brand::orderBy('brand_id','desc')->get();
        $type_product = Type::orderBy('type_id','desc')->get();

        $edit_product = Product::where('product_slug', $pro_slug)->get();
        $manager_product = view('admin.product.edit_product')
            ->with(compact('cat_product','brand_product','type_product','edit_product'));
        return view('admin_layout')->with('admin.product.edit_product', $manager_product);
    }

    public function update_product(Request $request, $pro_slug){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->pro_name;
        $data['product_slug'] = $request->pro_slug;
        $data['product_quantity'] = $request->pro_qty;
        $data['product_desc'] = $request->pro_desc;
        $data['product_content'] = $request->pro_content;
        $data['price_cost'] = $request->pro_price;
        $data['cat_id'] = $request->cat_pro;
        $data['brand_id'] = $request->brand_pro;
        $data['type_id'] = $request->type_pro;
        $get_img = $request->file('pro_image');

        if($get_img){
            $new_img = $get_img->getClientOriginalName();
            $get_img->move('public/uploads/products', $new_img);
            $data['product_image'] = $new_img;
            DB::table('tbl_product')->where('product_slug', $pro_slug)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_slug', $pro_slug)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function delete_product($pro_slug){
        $this->AuthLogin();
        $del_pro = Product::find($pro_slug);
        unlink('public/uploads/products/'.$del_pro->product_image);
        $del_pro->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }

    //End Admin
    
    

    public function quickview(Request $request){
        $pro_id = $request->product_id;
        $product = Product::find($pro_id); 
        
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').'VNĐ';
        $output['product_image'] = '<p><img width="100%" src="public/uploads/products/'.$product->product_image.'"></p>';
        echo json_encode($output);
    }

    public function details_product(Request $request, $pro_slug) {
        $cat_pro = Category::where('category_status','1')->orderBy('category_id','asc')->get();
        $brand_pro = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $type_pro = Type::where('type_status','1')->orderBy('type_id','desc')->get();
        
        // Seo  
        $url_canonical = $request->url();

        $pro_name = Product::where('product_slug',$pro_slug)->limit(1)->get();

        $details_pro = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.cat_id')
            ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')            
            ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
            ->where('tbl_product.product_slug',$pro_slug)->get();


        foreach($details_pro as $key => $value){
            $cat_id = $value->category_id;
            $product_id = $value->product_id;
        }

        $gallery = Gallery::where('product_id', $product_id)->get();

        $related_pro = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.category_id', '=', 'tbl_product.cat_id')
            ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')            
            ->join('tbl_type','tbl_type.type_id', '=', 'tbl_product.type_id')
            ->where('tbl_category.category_id',$cat_id)->whereNotIn('tbl_product.product_slug', [$pro_slug])->get();


        return view('pages.product.show_details')
            ->with(compact('cat_pro','brand_pro','type_pro', 'url_canonical', 'pro_name', 'details_pro', 'related_pro','gallery'));
    }
}
