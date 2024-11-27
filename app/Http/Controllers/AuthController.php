<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Employee;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class AuthController extends Controller
{
    public function register(Request $request)
    {

        $inputAccount = $request->only('email', 'name', 'password');
        try {
                $account = Account::create([
                    'email' => $inputAccount['email'],
                    'name' => $inputAccount['name'],
                    'password' => Hash::make($inputAccount['password']),
                    'role' => 'CEO',
                ]);
                $employee = Employee::create([
                    'account_id' => $account->id,
                    'email' => $inputAccount['email'],
                    'fullname' => $inputAccount['name'],
                ]);
                return response()->json([
                    'message' => 'Thêm nhân viên và tạo tài khoản thành công',
                    'account' => $account,
                    'employee' => $employee,
                ], 200);
            // }
        }catch(\Exception $e) {
            return response()->json([
                "message" => "something wrong!",
                "error" => $e
            ],500);
        }
    }

    public function store(Request $request) {
        try {
                $account = Account::create([
                    'email' => $request['email'],
                    'name' => $request['name'],
                    'password' => Hash::make($request['password']),
                    'role' => $request['role'],
                ]);

                $employee = Employee::create([
                    'account_id' => $account->id,
                    'email' => $request['email'],
                    'fullname' => $request['name'],
                ]);

                return response()->json([
                    'message' => 'Thêm nhân viên và tạo tài khoản thành công',
                    'account' => $account,
                    'employee' => $employee,
                ], 200);
        }catch(\Exception $e) {
            return response()->json([
                "message" => "something wrong!",
                "error" => $e->getMessage(),
            ],500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentialsNVQL = $request->only('email', 'password');

            $validator = Validator::make($request->all(), [
                'email' => 'required|max:255',
                'password' => 'required|min:2',
            ]);

            if(!Cache::has('code')) {
                return response()->json([
                    'error' => "Something went wrong"
                ]);
            }

            $code = Cache::get('code', 'null');

            if(!$code === $request->code) {
                return response()->json([
                    'error' => "Không đúng mã code"
                ]);
            }

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            if (Auth::guard('account')->attempt($credentialsNVQL)) {
                $account = Auth::guard('account')->user();
                $token = $account->createToken('token')->plainTextToken;
                $cookie = cookie('jwt',$token, 10);
                return response()->json([
                    'message' => 'Đăng nhập thành công',
                    'token' => $token
                ], 200)->withCookie($cookie);
            } else {
                return response()->json(['errors' => 'Thông tin đăng nhập không hợp lệ'], 401);
            }
        }catch(\Exception $e){
            return response([
                "message" => "Something wrong",
                "error" => $e->getMessage(),
            ], 500);
        }

    }
    public function user()
    {
        $data = Auth::user()->load('employee');
        return response()->json(['message' => 'Đăng nhập thành công', "value" => $data], 200);
    }

    public function logout(Request $request)
    {
        $cookie = Cookie::forget('jwt');
        return response()->json(['message' => 'Đăng xuất thành công'])->withCookie($cookie);
    }

    public function getCode() {
        $code = rand(1000, 9999);
        Cache::put('code', $code, now()->addMinutes(5));
        return response()->json([
            'code' => $code
        ]);
    }
}