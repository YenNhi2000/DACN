<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'admin_name', 'admin_phone', 'admin_email', 'admin_password', 'admin_token'	//các cột trong bảng admin
    ];
    protected $primaryKey = 'admin_id';	//khóa chính
    protected $table = 'tbl_admin';		//tên bảng

    public function roles(){
        return $this->belongsToMany('App\Models\Roles');
    }
}
