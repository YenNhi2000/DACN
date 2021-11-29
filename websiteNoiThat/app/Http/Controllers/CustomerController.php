<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function all_customer(){
        $this->AuthLogin();
        $all_customer = Customer::all();
        return view('admin.customer.all_customer')->with(compact('all_customer'));
    } 

    public function search(Request $request){
        // $key = $request->keywords;
        // $search_pro = Customer::where('product_name', 'like', '%'.$key.'%')->get();

        // Session::put('search', "Từ khóa: ".$key);

        // if ($search_pro){
        //     return view('pages.product.search')->with(compact('cat_pro', 'brand_pro', 'type_pro', 'search_pro'));
        // }else{
        //     Session::put('message', "Không tìm thấy sản phẩm");
        //     return view('pages.product.search');
        // }


    //     if($request->get('query'))
    //     {
    //         $query = $request->get('query');
    //         $data = Customer::where('customer_name', 'LIKE', "%{$query}%")->get();
    //         $output = '';
    //         foreach($data as $row)
    //         {
    //            $output .= '<tr>
    //                         <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
    //                         <td>'.$row->customer_name.'</td>
    //                         <td>'.$row->customer_phone.'</td>
    //                         <td>'.$row->customer_email.'</td>
    //                         <td>'.$row->customer_email.'</td>
    //                     </tr>';
    //        }
    //        $output .= '</ul>';
    //        echo $output;
    //    }
    }

    public function delete_customer($customer_id){
        $this->AuthLogin();
        $del_cus = Customer::find($customer_id);
        $del_cus->delete();
        Session::put('messageCustomer','Xóa khách hàng thành công');
        return Redirect::to('all-customer');
    }
}
