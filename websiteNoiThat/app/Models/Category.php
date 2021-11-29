<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'category_name', 'category_slug', 'category_desc', 'category_status'	//các cột trong bảng category
    ];
    protected $primaryKey = 'category_id';	//khóa chính
    protected $table = 'tbl_category';		//tên bảng

    public function product(){
        return $this->hasMany('App\Models\Product');        // 1 danh mục có nhiều sp
    }
}
