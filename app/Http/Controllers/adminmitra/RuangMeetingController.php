<?php

namespace App\Http\Controllers\adminmitra;

use App\Http\Controllers\Controller;
use App\Promo;
use Illuminate\Http\Request;
use App\RuangMeeting;
use Auth;
use Illuminate\Support\Facades\Storage;

class RuangMeetingController extends Controller
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
        $meetings = RuangMeeting::where('id_mitra', Auth()->user()->id)->get();
        return view('pages.adminmitra.meeting.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.adminmitra.meeting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //ini validasi di form
        $this->validate($request,[
            'nama_tempat'   =>'required',
            'kapasitas'     => 'required',
            'harga_sewa'    => 'required',
            'foto'          => 'required',
            'keterangan'    => 'required',
        ]);

        //ini upload foto ke form
        // $image      = $request->file('foto');
        // $filename   = rand().'.'.$image->getClientOriginalExtension();
        // $path       = public_path('uploads/ruangmeeting');
        // $image->move($path,$filename);

        // $file      = $request->file('foto');
        // $filename   = rand() . '.' . $file->getClientOriginalExtension();
        // $file_path = 'uploads/ruangmeeting/' . $filename;
        // Storage::disk('s3')->put($file_path, file_get_contents($file));

        //ini store atau menambahkan data ke database dengan tabel yang bernama ruang meeting


        $response = cloudinary()->upload($request->file('foto')
        ->getRealPath(), ["folder" => "room", "overwrite" => TRUE, "resource_type" => "image"])
        ->getSecurePath();

        $data               = new RuangMeeting();
        $data->id_mitra     = auth()->user()->id;
        $data->nama_tempat  = $request->nama_tempat;
        $data->kapasitas    = $request->kapasitas;
        $data->harga_sewa   = $request->harga_sewa;
        $data->foto         = $response;
        $data->keterangan   = $request->keterangan;
        //dd($request->all());
        $data->save();  


        //jika sudah menambahkan akan di arahkan ke route ini
        return redirect()->route('ruangmeeting.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function promo($id)
    {
        $percents = ['10', '20', '30', '40', '50', '60', '70', '80', '90'];
        return view('pages.adminmitra.meeting.promo', [
            'room' => RuangMeeting::findOrFail($id),
            'percents' => $percents
        ]);
    }

    public function promoSubmit(Request $request, $id)
    {
        if ($request->percent == null) {
            return redirect()->back()->with('error', 'promo harus diisi');
        }
        $room = RuangMeeting::findOrFail($id);
        $room->promo()->create([
            //'id_ruang' => $room->id,
            'percent' => $request->percent,
            'harga_sewa' => $request->promo_price
        ]);

        return redirect()->route('ruangmeeting.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RuangMeeting::findOrFail($id);
        return view('pages.adminmitra.meeting.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //ini validasi di form
        $this->validate($request,[
            'nama_tempat'   =>'required',
            'kapasitas'     => 'required',
            'harga_sewa'    => 'required',
            'foto'          => 'file|image|mimes:jpg,png,jpeg|max:2048',
            'keterangan'    => 'required',
        ]);

        //ini store atau menambahkan data ke database dengan tabel yang bernama ruang meeting

        $data = RuangMeeting::findOrFail($id);
        $data->id_mitra     = Auth()->user()->id;
        $data->nama_tempat  = $request->nama_tempat;
        $data->kapasitas    = $request->kapasitas;
        $data->harga_sewa   = $request->harga_sewa;

        if ($request->file('foto') == ''){
            $data->foto = $request->old_foto;
        }else{
            //ini upload foto ke form
            $image      = $request->file('foto');
            $filename   = rand().'.'.$image->getClientOriginalExtension();
            $path       = public_path('uploads/ruangmeeting');
            $image->move($path,$filename);
            $data->foto = $filename;
        }
        $data->keterangan   = $request->keterangan;
        $data->update();

        return redirect()->route('ruangmeeting.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RuangMeeting::findOrFail($id);
        $data->delete();
        return redirect()->route('ruangmeeting.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
