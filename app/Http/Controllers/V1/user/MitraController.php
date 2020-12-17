<?php

namespace App\Http\Controllers\V1\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\MitraResource;
use App\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function getPartners()
    {
        $partner = Mitra::all();

        return response()->json([
            'message' => 'successfully get partners',
            'status' => true,
            'data' => MitraResource::collection($partner)
        ]);
    }

    public function search(Request $request)
    {
        $partners = Mitra::whereHas('profile', function($profile) use($request) {
            $profile->whereTime('jam_buka', '<=', $request->start_time)
            ->whereTime('jam_tutup', '>=', $request->end_time);
        })->get();

        return response()->json([
            'message' => 'successfully search partners',
            'status' => true,
            'data' => MitraResource::collection($partners)
        ]);
    }
}
