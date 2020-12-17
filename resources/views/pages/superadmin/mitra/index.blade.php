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
                    <header>Data Mitra</header>
                </div>
                <div class="card-body ">
                    <div class="table-scrollable">
                        <table
                                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                id="example4">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th> Nama Mitra </th>
                                <th> Alamat</th>
                                <th> No Hp</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr class="odd gradeX">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_mitra}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->no_hp}}</td>
                                    <td>
                                        <a href="{{route('datamitra.show', $data->id)}}"
                                           onclick="return confirm('Apakah Anda ingin melihat data ini?')"type="button" class="btn default btn-outline btn-circle m-b-10">Detail</a>
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