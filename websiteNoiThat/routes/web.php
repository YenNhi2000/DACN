<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend
Route::get('/','HomeController@index');

Route::post('/tim-kiem','HomeController@search');
Route::post('/autocomplete-ajax','CustomerController@autocomplete_ajax');

Route::post('/quickview','ProductController@quickview');
Route::get('/dang-xuat', 'CustomerController@logout');

//Register
Route::get('/dang-ky', 'CustomerController@register');
Route::post('/add-customer','CustomerController@add_customer');

//Login
Route::get('/dang-nhap', 'CustomerController@login');
Route::post('/login-customer','CustomerController@login_customer');

// Change pass
Route::get('/doi-mat-khau', 'CustomerController@change_pass');
Route::post('/confirm-password', 'CustomerController@confirm_pass');

// Forgot pass
Route::get('/quen-mat-khau', 'CustomerController@forgot_pass');
Route::post('/recover-pass','CustomerController@recover_pass');
Route::get('/cap-nhat-mat-khau', 'CustomerController@update_new_pass');
Route::post('/up-new-pass','CustomerController@up_new_pass');

//Product - home page
Route::get('/san-pham', 'ProductController@show_product');
Route::get('/danh-muc-san-pham/{cate_slug}','CategoryProduct@show_category');
Route::get('/thuong-hieu-san-pham/{brand_slug}','BrandProduct@show_brand');
Route::get('/loai-san-pham/{type_slug}','TypeProduct@show_type');
Route::get('/chi-tiet-san-pham/{pro_slug}','ProductController@details_product');

//Cart
Route::get('/gio-hang','CartController@cart');
Route::post('/add-cart','CartController@add_cart');
Route::post('/update-cart','CartController@update_cart');
Route::get('/delete-pro','CartController@delete_pro');
Route::get('/delete-all','CartController@delete_all');

Route::post('/check-coupon','CartController@check_coupon');
Route::get('/delete-coupon','CartController@delete_coupon');

//Checkout
Route::get('/thanh-toan','CartController@payment');
Route::post('/save-shipping','CartController@save_shipping');
Route::post('/confirm-order','CartController@confirm_order');





//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');  
Route::get('/logout','AdminController@logout');

// Login
Route::post('/login-admin','AdminController@login_admin');

// Change pass
Route::get('/change-password', 'AdminController@change_pass');
Route::post('/confirm-pass', 'AdminController@confirm_pass');

// Forgot Pass  
Route::get('/forgot-pass','AdminController@forgot_pass');
Route::post('/recover-pass-admin','AdminController@recover_pass');
Route::get('/update-new-pass', 'AdminController@update_new_pass');
Route::post('/up-pass-admin','AdminController@up_pass_admin');

//Staff
Route::get('/all-staff','StaffController@all_staff');
Route::get('/delete-staff/{staff_id}','StaffController@delete_staff');

//Category product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{cat_slug}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{cat_slug}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/unactive-category/{cat_slug}','CategoryProduct@unactive_category');
Route::get('/active-category/{cat_slug}','CategoryProduct@active_category');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{cat_slug}','CategoryProduct@update_category_product');

// Brand product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_pro_slug}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_pro_slug}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand/{brand_pro_slug}','BrandProduct@unactive_brand');
Route::get('/active-brand/{brand_pro_slug}','BrandProduct@active_brand');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_pro_slug}','BrandProduct@update_brand_product');

//Type product
Route::get('/add-type-product','TypeProduct@add_type_product');
Route::get('/edit-type-product/{type_pro_slug}','TypeProduct@edit_type_product');
Route::get('/delete-type-product/{type_pro_slug}','TypeProduct@delete_type_product');
Route::get('/all-type-product','TypeProduct@all_type_product');

Route::get('/unactive-type/{type_pro_slug}','TypeProduct@unactive_type');
Route::get('/active-type/{type_pro_slug}','TypeProduct@active_type');

Route::post('/save-type-product','TypeProduct@save_type_product');
Route::post('/update-type-product/{type_pro_slug}','TypeProduct@update_type_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{pro_slug}','ProductController@edit_product');
Route::get('/delete-product/{pro_slug}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{pro_slug}','ProductController@unactive_product');
Route::get('/active-product/{pro_slug}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{pro_slug}','ProductController@update_product');

//Coupon
Route::get('/all-coupon','CouponController@all_coupon');
Route::post('/save-coupon','CouponController@save_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');

//Order
Route::get('/all-order','OrderController@all_order');
Route::get('/delete-order/{order_id}','OrderController@delete_order');

//Customer
Route::get('/all-customer','CustomerController@all_customer');
Route::get('/delete-customer/{customer_id}','CustomerController@delete_customer');

//Gallery
Route::get('/add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('/select-gallery','GalleryController@select_gallery');
Route::post('/insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('/update-gallery-name','GalleryController@update_gallery_name');
Route::post('/delete-gallery','GalleryController@delete_gallery');