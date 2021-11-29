<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'gallery_name', 'gallery_image', 'product_id'	//các cột trong bảng gallery
    ];
    protected $primaryKey = 'gallery_id';	//khóa chính
    protected $table = 'tbl_gallery';		//tên bảng
}
