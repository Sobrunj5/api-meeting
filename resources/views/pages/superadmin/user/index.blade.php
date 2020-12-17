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
                    <header>Data User</header>
                </div>
                <div class="card-body ">
                    <div class="table-scrollable">
                        <table
                                class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                id="example4">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th> Nama </th>
                                <th> Email</th>
                                <th> No Hp </th>
                                {{--<th> Jenis User </th>--}}
                                {{-- <th> Keterangan </th> --}}
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->no_hp}}</td>
                                {{--<td>--}}
                                    {{--<button type="button" class="btn btn-circle btn-info">User</button>--}}
                                {{--</td>--}}
                                {{-- <td>
                                    <button type="button" class="btn btn-circle btn-success">Verified</button>
                                </td> --}}
                                <td>
                                    <button type="button" class="btn btn-circle btn-success">sukses</button>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                            </table>
                            {{-- @foreach($datas as $key =>$data)
                                @if ($data->verify == '2' && $data->status == 'none')
                                    <td><span class="badge badge-success">sudah di konfirmasi dan belum dibayarkan</span></td>
                                @elseif($data->verify == '2' && $data->status == 'pending')
                                    <td><span class="badge badge-success">sudah di konfirmasi dan sudah dibayarkan</span></td>
                                @elseif ($data->verify == '0')
                                    <td><span class="badge badge-danger">pesanan di tolak</span></td>
                                @else
                                    <td><span class="badge badge-warning">belum di konfirmasi</span></td>
                                @endif
                            @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection