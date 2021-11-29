<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'shipping_name', 'shipping_phone', 'shipping_address', 'shipping_notes', 'customer_id'	//các cột trong bảng shipping
    ];
    protected $primaryKey = 'shipping_id';	//khóa chính
    protected $table = 'tbl_shipping';		//tên bảng
}
