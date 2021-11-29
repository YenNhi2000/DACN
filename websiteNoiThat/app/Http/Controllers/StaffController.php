<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Staff;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class StaffController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function all_staff(){
        $this->AuthLogin();
        $all_staff = Staff::all();
        return view('admin.staff.all_staff')->with(compact('all_staff'));
    }

    public function delete_staff($staff_id){
        $this->AuthLogin();
        $del_cus = Staff::find($staff_id);
        $del_cus->delete();
        Session::put('messageStaff','Xóa nhân viên thành công');
        return Redirect::to('all-staff');
    }
}
