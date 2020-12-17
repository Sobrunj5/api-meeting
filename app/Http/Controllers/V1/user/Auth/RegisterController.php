<?php

namespace App\Http\Controllers\V1\user\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'email|required|unique:users',
            'no_hp' => 'required',
            'password' => 'required',
            'uname' => 'required|unique:users'
        ]);

        $data = new User();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->uname = $request->uname;
        $data->no_hp = $request ->no_hp;
        $data->password = Hash::make($request->password);
        $data->api_token = Str::random(80);
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Register',
            'data' => $data
        ], 200);
    }
}