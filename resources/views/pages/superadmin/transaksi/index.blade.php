@extends('templates.superadmin')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Data Transaksi</header>
                </div>
                <div class="card-body ">
                    <div class="table-scrollable">
                        <table
                                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                id="example4">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th> Pemesan </th>
                                <th> Mitra</th>
                                <th> Ruang</th>
                                <th> Tanggal </th>
                                <th> Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->user->nama}}</td>
                                <td>{{$data->mitra->nama_mitra}}</td>
                                <td>{{$data->ruang->nama_tempat}}</td>
                                <td>{{$data->tanggal}}</td>
                                <td>
                                    <button type="button" class="btn btn-circle btn-success">sukses</button>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection