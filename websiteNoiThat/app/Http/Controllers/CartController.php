<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CartController extends Controller
{
    // Cart
    public function cart(Request $request){
        $cat_pro = Category::where('category_status','1')->orderBy('category_id','asc')->get();
        $brand_pro = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $type_pro = Type::where('type_status','1')->orderBy('type_id','desc')->get();
        $coupon = Coupon::all();

        // Seo  
        $url_canonical = $request->url();

        return view('pages.cart.show_cart')->with(compact('cat_pro', 'brand_pro', 'type_pro', 'coupon', 'url_canonical'));
    }

    public function add_cart(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0,26), 5);
        $cart = Session::get('cart');
        if ($cart == true){
            $is_available = 0;
            foreach($cart as $key => $value){
                if($value['product_id'] == $data['cart_pro_id']){
                    $is_available++;
                    $cart[$key]['product_qty'] += $data['cart_pro_qty'];
                }
            }
            if ($is_available == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_pro_name'],
                    'product_id' => $data['cart_pro_id'],
                    'product_image' => $data['cart_pro_image'],
                    'product_price' => $data['cart_pro_price'],
                    'product_qty' => $data['cart_pro_qty'],
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_pro_name'],
                'product_id' => $data['cart_pro_id'],
                'product_image' => $data['cart_pro_image'],
                'product_price' => $data['cart_pro_price'],
                'product_qty' => $data['cart_pro_qty']
            );
        }
        Session::put('cart', $cart);
        Session::save();
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');

        if ($cart == true){
            foreach($cart as $session => $value){
                if($value['session_id'] == $data['id']){
                    $cart[$session]['product_qty'] = $data['new_qty'];
                }
            }
            Session::put('cart', $cart);
        }
    }

    public function delete_pro(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        
        if ($cart == true){
            foreach($cart as $key => $value){
                if ($value['session_id'] == $data['pro_id']){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            echo 'Xóa sản phẩm thành công';
        }
    }

    public function delete_all(){
        $cart = Session::get('cart');
        if ($cart == true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back();//->with('messageCart', 'Xóa thành công');
        }
    }
    // End Cart

// Coupon
    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon){
            $count_coupon = $coupon->count();   //đếm coupon
            if ($count_coupon > 0){
                $coupon_session = Session::get('coupon');   //Lấy coupon từ session
                if ($coupon_session == true){                       //coupon_session tồn tại
                    $is_available = 0;
                    if ($is_available == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                }else{                                      //chưa có session coupon thì tạo mới
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('messageCart', 'Thêm mã giảm giá thành công');
            }
        }else{
            return redirect()->back()->with('error', 'Mã giảm giá không đúng');
        }
    }

    public function delete_coupon(){
        $cart = Session::get('coupon');
        if ($cart == true){
            Session::forget('coupon');
            return redirect()->back();//->with('messageCart', 'Xóa thành công');
        }
    }
// End Coupon

// Payment
    public function payment(Request $request){
        $cat_pro = Category::where('category_status','1')->orderBy('category_id','asc')->get();
        $brand_pro = Brand::where('brand_status','1')->orderBy('brand_id','asc')->get();
        $type_pro = Type::where('type_status','1')->orderBy('type_id','asc')->get();

        // Seo  
        $url_canonical = $request->url();

        $customer_id = Session::get('customer_id');
        $shipping = DB::table('tbl_shipping')
            ->join('tbl_customers', 'tbl_shipping.customer_id', '=', 'tbl_customers.customer_id')
            ->where('tbl_customers.customer_id', $customer_id)->get();

        return view('pages.cart.payment')->with(compact('cat_pro','brand_pro','type_pro','shipping', 'url_canonical'));
    }

    public function save_shipping(Request $request){    //Shipping
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['name'];
        $shipping->shipping_phone = $data['phone'];
        $shipping->shipping_address = $data['address'];
        $shipping->shipping_notes = $data['notes'];
        $shipping->customer_id = Session::get('customer_id');
        $shipping->save();

        Session::put('shipping_id', $shipping->shipping_id);
        return Redirect::to('/thanh-toan');
    }

    public function confirm_order(Request $request){
        $data = $request->all();

        $payment = new Payment();
        $payment->payment_method = $data['payment_method'];
        $payment->save();
        $payment_id = $payment->payment_id;

        $checkout_code = substr(md5(microtime()), rand(0,26),5);

        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $data['shipping_id'];
        $order->payment_id = $payment_id;
        $order->order_total = $data['order_total'];
        $order->order_status = 1;
        $order->order_code = $checkout_code;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->order_date = $order_date;
              
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order->created_at = $today;
        $order->save();

        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
              $order_details = new OrderDetails;
              $order_details->order_code = $checkout_code;
              $order_details->product_id = $cart['product_id'];
              $order_details->product_name = $cart['product_name'];
              $order_details->product_price = $cart['product_price'];
              $order_details->product_quantity = $cart['product_qty'];
              $order_details->order_coupon =  $data['order_coupon'];
              $order_details->save();
            }
        }

        //send mail confirm
        // $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        // $title_mail = "Đơn hàng xác nhận ngày".' '.$now;

        // $customer = Customer::find(Session::get('customer_id'));
            
        // $data['email'][] = $customer->customer_email;
        // //lay gio hang
        // if(Session::get('cart')==true){

        //     foreach(Session::get('cart') as $key => $cart_mail){

        //     $cart_array[] = array(
        //         'product_name' => $cart_mail['product_name'],
        //         'product_price' => $cart_mail['product_price'],
        //         'product_qty' => $cart_mail['product_qty']
        //     );

        //     }

        // }
        // //lay shipping
        // if(Session::get('fee')==true){
        //     $fee = Session::get('fee').'k';
        // }else{
        //     $fee = '25k';
        // }
        
        // $shipping_array = array(
        //     'fee' =>  $fee,
        //     'customer_name' => $customer->customer_name,
        //     'shipping_name' => $data['shipping_name'],
        //     'shipping_email' => $data['shipping_email'],
        //     'shipping_phone' => $data['shipping_phone'],
        //     'shipping_address' => $data['shipping_address'],
        //     'shipping_notes' => $data['shipping_notes'],
        //     'shipping_method' => $data['shipping_method']

        // );
        // //lay ma giam gia, lay coupon code
        // $ordercode_mail = array(
        //     'coupon_code' => $coupon_mail,
        //     'order_code' => $checkout_code,
        // );

        // Mail::send('pages.mail.mail_order',  ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array ,'code'=>$ordercode_mail] , function($message) use ($title_mail,$data){
        //     $message->to($data['email'])->subject($title_mail);//send this mail with subject
        //     $message->from($data['email'],$title_mail);//send from this mail
        // });
        
        Session::forget('coupon');
        // Session::forget('fee');
        Session::forget('cart');
    }
// End Payment
}
