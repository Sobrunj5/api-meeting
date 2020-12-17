<?php

namespace App\Http\Controllers\V1\user\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function me (){
        $user = Auth::guard('api')->user();

        return response()->json([
            'status'=>true,
            'message'=>"profile tampil",
            'data' => $user
        ],200);
    }

    public  function update (Request $request){
        $user = Auth::user();
        $rules = [
            'password' => 'reqiured|min8'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            #code..
            return response()->json([
                'status' =>false,
                'message' => $validator->erros()
            ], 400);
        }
        $user -> password = bcrypt($request->password);
        $user->update();
        return response()->json([
            "status" =>true,
            'message'=>'berhasil Update',
            'data' => $user
        ],200);
    }
}


