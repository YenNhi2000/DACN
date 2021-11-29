<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'payment_id', 'payment_method', 'payment_status'	//các cột trong bảng shipping
    ];
    protected $primaryKey = 'payment_id';	//khóa chính
    protected $table = 'tbl_payment';		//tên bảng
}
