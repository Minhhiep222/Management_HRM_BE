<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Employee;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profileUser(Request $request) {
    //     $value = session()->get('user');
    //     $user = Employee::where('email',$value)->get();

    //     return response()->json(['message' => 'Đăng nhập thành công',
    //     'user' => $user,
    //  ], 200); 
    }
}
