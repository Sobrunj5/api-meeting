<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\RuangMeeting;
use Illuminate\Http\Request;

class RuangMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= RuangMeeting::all();
        return view('pages.superadmin.meeting.index', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ini validasi di form
        $this ->validate($request,[
            'nama_tempat'      => 'required',
            'kapasitas'        => 'required',
            'harga_sewa'       => 'required',
            'mitra'            => 'required',
            'keterangan'       => 'required',



        ]);

        //ini store atau menambahkan data ke database dengan tabel yang bernama ruang meeting

        $data               = new RuangMeeting();
        $data->id_mitra     = Auth::user()->id;
        $data->nama_tempat  = $request->nama_tempat;
        $data->kapasitas    = $request->kapasitas;
        $data->harga_sewa   = $request->harga_sewa;
        $data->id_mitra     = $request->id_mitra;
        $data->keterangan   = $request->keterangan;
        $data->status       = '1';
        //dd($request->all());
        $data->save();


        //jika sudah menambahkan akan di arahkan ke route ini
        return redirect()->route('ruangmeetings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RuangMeeting::findOrfail($id);
        return view('pages.superadmin.meeting.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RuangMeeting::findOrfail($id);
        return view('pages.superadmin.meeting.edit',compact('data'));

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
            'mitra'         => 'required',
            'keterangan'    => 'required',
        ]);

        //ini store atau menambahkan data ke database dengan tabel yang bernama ruang meeting

        $data = RuangMeeting::findOrFail($id);
        $data->id_mitra     = Auth::user()->id;
        $data->nama_tempat  = $request->nama_tempat;
        $data->kapasitas    = $request->kapasitas;
        $data->harga_sewa   = $request->harga_sewa;
        $data->id_mitra      = $request->id_mitra;
        $data->keterangan   = $request->keterangan;
        $data->update();

        return redirect()->route('ruangmeetings.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function verifikasi($id){
        $data = RuangMeeting::find($id);
        if($data->status){
            $data->update([ 'status' => false ]);
        }else{
            $data->update([ 'status' => true ]);
        }

        return redirect()->back();
    }
}
