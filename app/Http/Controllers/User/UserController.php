<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user/home');
    }

    public function checkstatus(){
        switch(Auth::user()->status){
            case 0:
                return array('data'=>"บัญชีถูกปิดใช้งาน กรุณาติดต่อเจ้าหน้าที่",'status'=>0);
                break;
            case 2:
                return array('data'=>"รอการอนุมัติจากเจ้าหน้าที่ โปรดตรวจสอบในภายหลัง",'status'=>2);
                break;
            default:
                return "welcome to thailand";
        }
    }

    public function checkadmin(){
        switch(Auth::user()->is_admin){
            case 0:
                return array('data'=>"ผู้ใช้ทั่วไป",'status'=>0);
                break;
            case 1:
                return array('data'=>"ผู้ดูแลระบบ",'status'=>1);
                break;
            default:
                return "welcome to thailand";
        }
    }
}
