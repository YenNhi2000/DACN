<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'type_name', 'type_desc', 'type_status'	//các cột trong bảng type
    ];
    protected $primaryKey = 'type_id';	//khóa chính
    protected $table = 'tbl_type';		//tên bảng
}
