<?php

namespace App\Http\Controllers\adminmitra;

use App\Http\Controllers\Controller;
use App\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:adminmitra');
    }

    public  function  index ()
    {
        $user = Auth::guard('adminmitra')->user();
        return view('pages.adminmitra.profil.profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $foto = $request->file('foto');
        if($foto){
            $response = cloudinary()->upload($foto->getRealPath(), 
            ["folder" => "mitra", "overwrite" => TRUE, "resource_type" => "image"])
            ->getSecurePath();
        }else{
            $response = null;
        }
        $user = Auth::guard('adminmitra')->user();
        $user->update([
            'nama_mitra' => $request->nama_pemilik ?? $user->nama_pemilik,
        ]);
        
        $user->profile->update([
            'alamat'    => $request->alamat ?? $user->profile->alamat,
            'latitude'  => $request->latitude ?? $user->profile->latitude,
            'longitude'  => $request->longitude ?? $user->profile->longitude,
            'foto' => $response ?? $user->profile->foto
        ]);


        // $data->nama_mitra = $request->nama_pemilik;

        // $data->save();

        // $data->profile->update([
        //     'alamat'    => $request->alamat,
        //     'latitude'  => $request->latitude,
        //     'longitude'  => $request->longitude,
        // ]);

        
        return redirect()->route('profil.index');
    }
}
