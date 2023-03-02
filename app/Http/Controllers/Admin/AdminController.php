<?php

namespace App\Http\Controllers\Admin;

use App\BorrowMaterial;
use App\BorrowGood;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
     public function index()
    {
        return view('admin/home');
    }

    public function countUserApprove()
    {
        $count = User::where('status', 2)->count();
        return $count;
    }

    public function countGoodApprove()
    {

        $count = BorrowGood::whereIn('status', [0,4])->count();
        return $count;
    }

    public function countMatApprove()
    {
        $count = BorrowMaterial::with('material')->whereIn('status', [0,4])
        ->whereHas('material', function ($query) {
                $query->where('type_id', 2);
        })
        ->count();
        return $count;
    }


    public function countTeachingMatApprove()
    {
        $count = BorrowMaterial::with('material')->whereIn('status', [0,4])
            ->whereHas('material', function ($query) {
                $query->where('type_id', 1);
            })
        ->count();
        return $count;
    }
}
