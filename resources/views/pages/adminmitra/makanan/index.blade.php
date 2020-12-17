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
                    <header>Data Makana & Minuman </header>
                </div>
                
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group">
                                <a href="{{route('makanan.create')}}" id="addRow"
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
                                <th> Nama Makanan </th>
                                <th> Harga</th>
                                <th> Deskripsi </th>
                                <th> Foto </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($makanans as $makanan)
                                <tr class="odd gradeX">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$makanan->nama}}</td>
                                    <td>Rp. {{number_format($makanan->harga, 0,',','.')}}</td>
                                    <td>{{$makanan->deskripsi}}</td>
                                    <td><img src="{{ asset('uploads/makanan/'.$makanan->foto) }}" width="150" height="159" alt=""></td>
                                    <td>
                                        <a href="{{route('makanan.edit', $makanan->id)}}"
                                           onclick="return confirm('Apakah Anda akan edit data ini?')" type="button" class="btn default btn-outline btn-circle m-b-10">Edit</a>
                                        <a href="{{route('makanan.destroy', $makanan->id)}}"
                                           onclick="return confirm('Apakah Anda akan menghapus data ini?')" type="button" class="btn default btn-outline btn-circle m-b-10">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection