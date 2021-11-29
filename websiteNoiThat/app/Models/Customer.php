<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'customer_name', 'customer_phone', 'customer_email', 'customer_password', 'customer_token'	//các cột trong bảng customer
    ];
    protected $primaryKey = 'customer_id';	//khóa chính
    protected $table = 'tbl_customers';		//tên bảng
}
