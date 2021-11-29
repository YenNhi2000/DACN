<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'staff_name', 'staff_phone', 'staff_email', 'staff_password'	//các cột trong bảng staff
    ];
    protected $primaryKey = 'staff_id';	//khóa chính
    protected $table = 'tbl_staffs';		//tên bảng
}
