<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'product_name', 'product_desc', 'product_price','product_image', 'cat_id', 'brand_id', 'type_id', 'product_status'	//các cột trong bảng product
    ];
    protected $primaryKey = 'product_id';	//khóa chính
    protected $table = 'tbl_product';		//tên bảng

    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');       //sp thuộc danh mục dựa trên cat_id của tbl_product
    }
}
