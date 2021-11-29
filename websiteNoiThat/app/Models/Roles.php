<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false;	//set time to false (created_at, updated_at)
    protected $filltable = [
        'name'	//các cột trong bảng Roles
    ];
    protected $primaryKey = 'roles_id';	//khóa chính
    protected $table = 'tbl_roles';		//tên bảng

    public function admin(){
        return $this->belongsToMany('App\Models\Admin');
    }
}
