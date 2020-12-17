@extends('templates.adminmitra')
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
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group">
                                <a href="{{route('ruangmeeting.create')}}" id="addRow"
                                   class="btn btn-info">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
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
                                <th> Foto </th>
                                <th> Keterangan </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meetings as $meeting)
                                <tr class="odd gradeX">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$meeting->nama_tempat}}</td>
                                    <td>{{$meeting->kapasitas}}</td>
                                    <td>{{$meeting->harga_sewa}}</td>
                                    <td><img src="{{ asset('uploads/ruangmeeting/'. $meeting->foto) }}" width="150" height="159" alt=""></td>
                                    <td>{{$meeting->keterangan}}</td>
                                    <td>
                                        @if($meeting->status == '1')
                                            <span class="label label-rouded label-menu label-success">Terverifikasi</span>
                                        @else
                                            <span class="label label-rouded label-menu label-danger">Nonverifikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('ruangmeeting.edit', $meeting->id)}}"
                                           onclick="return confirm('Apakah Anda akan Edit data ini?')"type="button" class="btn default btn-outline btn-circle m-b-10">Edit</a>
                                        <a href="{{route('ruangmeeting.destroy', $meeting->id)}}"
                                           onclick="return confirm('Apakah Anda akan menghapus data ini?')" type="button" class="btn default btn-outline btn-circle m-b-10">Delete</a>
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