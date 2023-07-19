<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Jangbu;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function check()
    {
        $uid = request('uid'); // 입력한 아이디와 암호
        $pwd = request('pwd');

        
        // 입력한 아이디, 암호의 직원 정보 조사
        $row = Member::
              where('uid', '=', $uid)
            ->where('pwd', '=', $pwd)
            ->first();

        if ($row) { // 있는 경우
            session()->put('uid', $row->uid); // 세션으로 저장
            session()->put('rank', $row->rank);
            session()->put('name', $row->name);
        }
        return view('main');
    }
    public function logout()
    {
            session()->forget('uid'); // 세션으로 저장
            session()->forget('rank');

        return view('main');
    }
}
