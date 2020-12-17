<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Mitra;
use Illuminate\Http\Request;

class DataMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Mitra::all();
        return view('pages.superadmin.mitra.index', compact('datas'));

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
        //ini validasi di form
        $this->validate($request,[
            'nama_mitra'    =>'required',
            'alamat'        => 'required',
            'no_hp'         => 'required',
            'keterangan'    => 'required',
        ]);


        //ini store atau menambahkan data ke database dengan tabel yang bernama ruang meeting

        $data               = new Mitra();
        $data->id_mitra     = Auth::user()->id;
        $data->nama_mitra   = $request->nama_mitra;
        $data->alamat       = $request->alamat;
        $data->no_hp        = $request->no_hp;
        $data->keterangan   = $request->keterangan;
        $data->status       = '1';
        //dd($request->all());
        $data->save();


        //jika sudah menambahkan akan di arahkan ke route ini
        return redirect()->route('datamitra.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mitra::findOrfail($id);
        return view('pages.superadmin.mitra.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mitra::findOrfail($id);
        return view('pages.superadmin.mitra.edit',compact('data'));
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
            'nama_mitra'   =>'required',
            'alamat'        => 'required',
            'no_hp'         => 'required',
            'keterangan'    => 'required',
        ]);

        //ini store atau menambahkan data ke database dengan tabel yang bernama ruang meeting

        $data = Mitra::findOrFail($id);
        $data->id_mitra     = Auth::user()->id;
        $data->nama_mitra   = $request->nama_mitra;
        $data->alamat       = $request->alamat;
        $data->no_hp        = $request->no_hp;
        $data->keterangan   = $request->keterangan;
        $data->update();

        return redirect()->route('datamitra.index');

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
}
