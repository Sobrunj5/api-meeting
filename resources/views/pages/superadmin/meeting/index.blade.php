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
                    <header>Data Ruang Meeting</header>
                </div>
                <div class="card-body ">
                    <div class="table-scrollable">
                        <table
                                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                id="example4">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th> Nama Tempat </th>
                                <th> Kapasitas</th>
                                <th> Harga Sewa </th>
                                <th> Nama Mitra </th>
                                <th> Keterangan </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr class="odd gradeX">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_tempat}}</td>
                                    <td>{{$data->kapasitas}}</td>
                                    <td>{{$data->harga_sewa}}</td>
                                    <td>{{$data->mitra->nama_mitra}}</td>
                                    <td>
                                        <a type="button" href="{{route('ruangmeetings.verifikasi', $data->id)}}"
                                           onclick="return confirm('Apakah Anda ingin @if($data->status) menonaktifkan @else mengaktifkan @endif data ini?')"
                                           class="btn btn-circle @if($data->status) btn-danger @else btn-success @endif">
                                            @if($data->status) Menonaktifkan @else Aktifkan @endif
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('ruangmeetings.show', $data->id)}}"--}}
                                           onclick="return confirm('Apakah Anda ingin melihat data ini?')" type="button" class="btn default btn-outline btn-circle m-b-10">Detail</a>

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