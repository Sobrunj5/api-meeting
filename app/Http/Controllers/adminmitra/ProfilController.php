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
        $data             = Auth::guard('adminmitra')->user();
        $data->nama_mitra = $request->nama_pemilik;
        $data->save();

        $data->profile->update([
            'alamat'    => $request->alamat,
            'latitude'  => $request->latitude,
            'longitude'  => $request->longitude,
        ]);

        
        return redirect()->route('profil.index');
    }
}
