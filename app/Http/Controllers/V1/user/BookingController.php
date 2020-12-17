<?php

namespace App\Http\Controllers\V1\user;

use App\Booking;
use App\BookingDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Controllers\Midtrans\Config;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-BFkzOqR-okzh-CRCN738DhAN';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $this->middleware('auth:api')->except('snapToken');
    }

    public  function booking(Request $request){

        try{
            $tanggal = $request->tanggal;
            $startTime = $request->start_time;
            $endTime = $request->end_time;

            $booking = new Booking();
            $booking->id_user = Auth::guard('api')->user()->id;
            $booking->id_mitra = $request->id_mitra;
            $booking->tanggal = $tanggal;
            $booking->jam_mulai = $startTime;
            $booking->jam_selesai = $endTime;
            $booking->id_ruang = $request->id_room;
            $booking->harga = $request->harga * $request->durasi;
            $booking->status = "none";
            $booking->save();

            //$hargaMakanan = [];
            foreach ($request->makanans as $makanan){
                
                $bookingMakanan = new BookingDetails();
                $bookingMakanan->id_makanan = $makanan['id'];
                $bookingMakanan->id_booking = $booking->id;
                $bookingMakanan->harga = $makanan['harga'];
                $bookingMakanan->jumlah = $makanan['qty'];
                $bookingMakanan->total_harga = $makanan['harga'] * $makanan['qty'];
                $bookingMakanan->save();
            }

            $hargaMakanan = BookingDetails::where('id_booking', $booking->id)->get()->sum('total_harga');
            $booking->total_bayar = $booking->harga + $hargaMakanan;
            $booking->update();


            return response()->json([
                'message' => 'success',
                'status' => true,
                'data' => (object)[]
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' =>  false,
                'data' => (object)[]
            ]);
        }
    }

    public function snapToken(Request $request)
    {
        $orders = $request->item_details;

        $item_details = [];
        foreach ($orders as $val) {
            $order = Booking::where('id', $val['id'])->first();

            $item_details[] = [
                'id' => $order->tanggal,
                'price' => $order->total_bayar,
                'quantity' => 1,
                'name' => $order->ruang->nama_tempat
            ];
        }

        $payload = [
            'transaction_details' => [
                'order_id' => rand()
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
                'telephone' => $order->user->no_hp,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($payload);
            $snapOrder = Booking::where('id', $request->item_details[0]['id'])->first();
            $snapOrder->snap_token = $snapToken->token;
            $snapOrder->update();
            return response()->json($snapToken);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function bookingByUser()
    {
        $booking = Booking::where('id_user', Auth::guard('api')->user()->id)->get();

        return response()->json([
            'message' => 'successfully get booking by user',
            'status' => true,
            'data' => BookingResource::collection($booking)
        ]);
    }

    public function update($id, Request $request)
    {
        $booking = Booking::where('id', $id)->first();
        $booking->status = $request->status;
        $booking->update();

        return response()->json([
            'message' => 'successfully update status order',
            'status' => true
        ]);
    }

    public function cancel($id)
    {
        Booking::where('id', $id)->update(['verifikasi', '0']);
        return response()->json([
            'message' => 'berhasil cancel order',
            'status' => true,
            'data' => (object)[]
        ]);
    }
}
