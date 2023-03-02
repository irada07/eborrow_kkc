<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use App\User;
use App\Material;
use App\Unit;
use App\ReceiptMaterial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\BorrowMaterial;
use App\Shop;
use Carbon\Carbon;

class AccessController extends Controller
{

    public function index()
    {
        if (Auth::user()->status == 2) {
            return redirect()->back()->withErrors('คุณไม่มีสิทธ์เข้าถึง');
        }
        return view('admin.access.index');
    }

    public function showUsers(){
        return datatables()->of(
            User::query()->whereNotIn('id', [Auth::user()->id])->whereIn('status', [0,1])->orderBy('id', 'asc')
        )->toJson();
    }

    public function manageUser(Request $req){
        //dd($req->all());

        DB::beginTransaction();

        if($req->id){
            $user = User::find($req->id);
        }else{
            $user = new User;
        }
        $user->is_admin = $req->is_admin;
        $user->type = $req->type;
        $user->status = $req->status;
        $user->save();

        DB::commit();
        return redirect( route('access.index') )->with('success', 'บันทึกข้อมูลสำเร็จ!');
    }

    public function approve(){
        return view('admin.access.approve');
    }

    public function listApproveUsers(){
        return datatables()->of(
            User::query()->whereNotIn('id', [Auth::user()->id])->where('status',2)
        )->toJson();
    }

    public function activeUser(Request $req){
        //dd($req->all());
        $checkUser = User::where('id', $req->id)->whereIn('status', [0,1])->first();
        if($checkUser){
            $data = [
                'title' => 'ลบไม่สำเร็จ',
                'msg' => 'มีรายการรออนุมัติ โปรดอนุมัติหรือยกเลิกรายการก่อน',
                'status' => 'error',
            ];

            return $data;
        }

        DB::beginTransaction();

        $user = User::find($req->id);
        $user->status = 1;
        if($user->save()){
            $data = [
                'title' => 'อนุมัติสำเร็จ',
                'msg' => 'อนุมัติรายการสำเร็จ',
                'status' => 'success',
            ];
        }else{
            $data = [
                'title' => 'เกิดข้อผิดพลาด',
                'msg' => 'อนุมัติรายการไม่สำเร็จ',
                'status' => 'error',
            ];
        }
        DB::commit();

        return $data;
    }

    public function deactiveUser(Request $req){
        //dd($req->all());
        $checkUser = User::where('id', $req->id)->whereIn('status', [0,1])->first();
        if($checkUser){
            $data = [
                'title' => 'ลบไม่สำเร็จ',
                'msg' => 'มีรายการรออนุมัติ โปรดอนุมัติหรือยกเลิกรายการก่อน',
                'status' => 'error',
            ];

            return $data;
        }

        DB::beginTransaction();

        $user = User::find($req->id);
        $user->status = 0;
        if($user->save()){
            $data = [
                'title' => 'ไม่อนุมัติสำเร็จ',
                'msg' => 'ไม่อนุมัติรายการสำเร็จ',
                'status' => 'success',
            ];
        }else{
            $data = [
                'title' => 'เกิดข้อผิดพลาด',
                'msg' => 'ไม่อนุมัติรายการไม่สำเร็จ',
                'status' => 'error',
            ];
        }
        DB::commit();

        return $data;
    }

}
