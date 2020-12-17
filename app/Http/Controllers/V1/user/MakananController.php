<?php

namespace App\Http\Controllers\V1\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\MakananResource;
use App\Makanan;
use App\Response;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function makanan($id_mitra)
    {
        $makanans = Makanan::where('id_mitra', $id_mitra)
            ->where('jenis', 'bayar')->get();

            return Response::transform(
                'successfuly get makanan by mitra',
                true,
                MakananResource::collection($makanans),
                200
            );
    }
}
