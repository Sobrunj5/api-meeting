<?php

namespace App\Http\Controllers\V1\user\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function login(Request $request){

        // $this->validate($request, [
        //     'email' => 'required|string',
        //     'password' => 'required|string|min:6'
        // ]);

        $credentialEmail = [
            
            'email' => $request->email,
            'uname' => $request->uname,
            'password' => $request->password,
        ];

        $getEmail = User::where('email', $request->email)->first();
        $getUname = User::where('uname', $request->email)->first();
        if ($getEmail) {
            $credential = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::guard('web')->attempt($credential)){
                $user = Auth::guard('web')->user();
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil login',
                    'data' => $user,
                ], 200);
            }
        }elseif($getUname){
            $credential = [
                'uname' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::guard('web')->attempt($credential)){
                $user = Auth::guard('web')->user();
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil login',
                    'data' => $user,
                ], 200);
            }
        }
        

        return response()->json([
            'status' => false,
            'message' => 'masukkan username dan password yang benar',
            'data' => (object) []
        ], 401);

    }

}
