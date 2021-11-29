<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'order_code', 'product_id', 'product_name', 'product_price', 'product_quantity', 'order_coupon'	//các cột trong bảng shipping
    ];
    protected $primaryKey = 'details_id';	//khóa chính
    protected $table = 'tbl_order_details';		//tên bảng

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
