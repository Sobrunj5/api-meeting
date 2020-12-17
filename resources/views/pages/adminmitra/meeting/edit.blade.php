@extends('templates.adminmitra')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Data Ruang Meting</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-box">
                <div class="card-head">
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                        data-mdl-for="panel-button2">
                        <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                        <li class="mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                        <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                    </ul>
                </div>
                <div class="card-body" id="bar-parent2">
                    <form action="{{ route('ruangmeeting.update', $data->id) }}" id="form_sample_2" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="form-body">
                            <div class="form-group row  margin-top-20">
                                <label class="control-label col-md-3">Nama Tempat
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control {{$errors->has('nama_tempat')?'is-invalid':''}}"
                                               name="nama_tempat" type="text" value="{{$data->nama_tempat}}" />
                                        @if ($errors->has('nama_tempat'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('nama_tempat') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Kapasitas
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control {{$errors->has('kapasitas')?'is-invalid':''}}"
                                               name="kapasitas" type="text" value="{{$data->kapasitas}}" />
                                        @if ($errors->has('kapasitas'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('kapasitas') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Harga Sewa
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input class="form-control {{$errors->has('harga_sewa')?'is-invalid':''}}"
                                               name="harga_sewa" type="text" value="{{$data->harga_sewa}}" />
                                        @if ($errors->has('harga_sewa'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('harga_sewa') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Foto
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="hidden" name="old_foto" value="{{$data->foto}}"/>
                                        <input type="file" class="form-control {{$errors->has('foto')?'is-invalid':''}}"
                                               name="foto" onchange="loadfile(event)" />
                                        <img id="output" class="img-fluid" height="100" width="100" src="{{url($data->foto)}}">
                                        @if ($errors->has('foto'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('foto') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Keterangan
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text"
                                               class="form-control {{$errors->has('keterangan')?'is-invalid':''}}"
                                               name="keterangan" value="{{$data->keterangan}}" />
                                        @if ($errors->has('keterangan'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('keterangan') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="offset-md-3 col-md-9">
                                <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                <a href="{{route('ruangmeeting.index')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    var loadfile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
