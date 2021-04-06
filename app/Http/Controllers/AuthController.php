<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $helper;
    public $model;

    public function __construct()
    {
        $this->helper = new Helper();
        $this->model = new User();
    }

    public function register(Request $request)
    {
        $rules =
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {
            return $this->helper->responseJson(0, $data->errors()->first());
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $record = $this->model->create($request->all());
        $user = Auth::user();

        $token = $this->model->createToken($this->model)->accessToken;


        return $this->helper->responseJson(1, 'تم الاضافه بنجاح', ['token' => $token, 'user' => $record]);
    }


    public function login(Request $request)
    {
        $rules =
            [
                'email' => 'required',
                'password' => 'required',

            ];


        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {
            return $this->helper->responseJson(0, $data->errors()->first());
        }


        $user = $this->model->where(['email' => $request->email])->first();

        //check if user exists
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('android')->accessToken;

                return $this->helper->responseJson(1, 'تم تسجيل الدخول بنجاح', ['token' => $token, 'user' => $user]);
            } else {
                return $this->helper->responseJson(0, 'كلمة المرور غير صحيحة');
            }
        } else {
            return $this->helper->responseJson(0, 'البريد  الذي أدخلته غير صحيح');
        }

        // send pin code to confirm phone
    }
}