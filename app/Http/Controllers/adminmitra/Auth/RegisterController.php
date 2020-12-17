<?php

namespace App\Http\Controllers\adminmitra\Auth;

use App\Http\Controllers\Controller;
use App\Mitra;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest:adminmitra');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegisterForm()
    {
        return view('auth_adminmitra.register');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama_mitra' => 'required |unique:mitras',
            'email'     => 'required |unique:mitras|email',
            'no_hp'     => 'required |unique:mitras',
            "password" => 'required',
        ]);

        $data = new Mitra();
        $data->nama_mitra = $request->nama_mitra;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->password = Hash::make($request->password);
        $data->save();

        if ($data) {
            return redirect()->route('adminmitra.login');
        } else {
            return redirect()->back()->with(['error' => 'kesalahan menginputkan data']);
        }


    }
}
