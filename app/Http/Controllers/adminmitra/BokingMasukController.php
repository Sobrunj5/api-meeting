<?php

namespace App\Http\Controllers\adminmitra;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BokingMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:adminmitra');
    }

    public function index()
    {
        $datas = Booking::where('id_mitra', Auth::guard('adminmitra')->user()->id)->get();
        return view('pages.adminmitra.boking.index', compact('datas'));

    }

    public function verifikasi($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->verifikasi = '2';
        $booking->save();

        return redirect()->route('boking.index');
    }

    public function tolak($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->verifikasi = '0';
        $booking->save();

        return redirect()->route('boking.index');
    }
}
