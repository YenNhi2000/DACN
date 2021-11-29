<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use App\Models\Gallery;
use Illuminate\Support\Facades\Redirect;

session_start();

class GalleryController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function add_gallery($product_id){
        $this->AuthLogin();

        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with(compact('pro_id'));
    }
    
    public function select_gallery(Request $request){
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '
                <form>
                '.csrf_field().'
                    <table class="table table-striped b-t b-light table-hover">
                        <thead>
                            <tr>
                                <th style="width:100px;">STT</th>
                                <th>Tên hình ảnh</th>
                                <th style="width:300px;">Hình ảnh</th>
                                <th style="width:70px;"></th>
                            </tr>
                        </thead>
                        <tbody>';
        if ($gallery_count > 0){
            $i = 0;
            foreach($gallery as $key => $gal){
                $i++;
                $output.='
                            <tr>
                                <td>'.$i.'</td>
                                <td contenteditable class="edit_gal_name" data-gal_id="'.$gal->gallery_id.'">'.$gal->gallery_name.'</td>
                                <td>
                                    <img src="'.url('public/uploads/gallery/'.$gal->gallery_image).'" 
                                        width="120" height="120">
                                </td>
                                <td>
                                    <button type="button" class="active delete delete-gallery" data-gal_id="'.$gal->gallery_id.'">
                                        <i class="fa fa-times text-danger text" title="Xóa"></i>
                                    </button>
                                </td>
                            </tr>
                        ';
            }
        }else{
            $output.='
                        <tr>
                            <td colspan="4">Sản phẩm chưa có thư viện ảnh</td>
                        </tr>
                    ';
        }
        $output.='
                        </tbody>
                    </table>
                </form>
                ';
        echo $output;

        // <input type="file" class="file_image" style="width:40%" data-gal_id="'.$gal->gallery_id.'" id="file-'.$gal->gallery_id.'" name"file" accept="image/*">
    }

    public function insert_gallery(Request $request, $pro_id){
        $get_img = $request->file('file');
        if ($get_img){
            foreach($get_img as $img){
                $new_img = $img->getClientOriginalName();
                $img->move('public/uploads/gallery/', $new_img);
                $product = Product::find($pro_id);
                $gallery = new Gallery();
                $gallery->gallery_name = $product->product_name;
                $gallery->gallery_image = $new_img;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
        Session::put('message', 'Thêm thư viện ảnh thành công');
        return redirect()->back();
    }

    public function update_gallery_name(Request $request){
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = Gallery::find($gal_id);
        $gallery->gallery_name = $gal_text;
        $gallery->save();
    }

    public function delete_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery = Gallery::find($gal_id);
        unlink('public/uploads/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }
}
