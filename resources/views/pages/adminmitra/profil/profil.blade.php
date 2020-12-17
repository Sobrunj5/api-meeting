@extends('templates.adminmitra')
@section('content')


    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">User Profile</div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <div class="card card-topline-aqua">
                    <div class="card-body no-padding height-9">
                        <div class="row">
                            <div class="profile-userpic">
                                <img src="../assets/img/dp.jpg" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">Kiran Patel </div>
                            <div class="profile-usertitle-job"> Professor </div>
                        </div>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,200</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">750</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">11,172</a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                            <button type="button" class="btn btn-circle red btn-sm">Message</button>
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                    </div>
                </div>
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for="panel-button2">
                            <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                            </li>
                            <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                            </li>
                            <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                here</li>
                        </ul>
                    </div>
                    <div class="card-body" id="bar-parent2">
                        <form action="{{ route('profil.update') }}" id="form_sample_2" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <div id="map" style="width: 650px; height: 400px; margin-bottom: 10px"></div>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label> Latitude </label>
                                        <input type="text" class="form-control" id="latitude" name="latitude" 
                                        value="{{ $user->profile->latitude }}">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label> Longitude </label>
                                        <input type="text" class="form-control" id="longitude" name="longitude" 
                                        value="{{ $user->profile->longitude }}">
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label> Alamat </label>
                                        <textarea rows="5" class="form-control {{$errors->has('alamat')?'is-invalid':''}}"
                                                  name="alamat" id="alamat"> {{ $user->profile->alamat }} {{old('alamat')}}</textarea>
                                        @if ($errors->has('alamat'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('alamat') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label> Nama Mitra </label>
                                        <input class="form-control {{$errors->has('nama_pemilik')?'is-invalid':''}}"
                                               name="nama_pemilik" type="text" value="{{$user->nama_mitra}}" value="{{old('nama_pemilik')}}"/>
                                        @if ($errors->has('nama_pemilik'))
                                            <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('nama_pemilik') }}</b></p>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="offset-md-3 col-md-9">
                                    <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                    <a href="{{route('profil.index')}}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection

@section('script')
    <script>
        const lat = document.querySelector('#latitude');
        const long = document.querySelector('#longitude');
        const alamat = document.querySelector('#alamat');

        mapboxgl.accessToken = 'pk.eyJ1Ijoic29icnVuIiwiYSI6ImNrY2FiN2l1czFlcTQzMm4wb2E2YTBwbnYifQ.w6sIAs-_094-BeoY-OHtKQ';
        const map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
            center: [109.125595, -6.879704], // starting position [lng, lat]
            zoom: 11 // starting zoom
        });

        map.addControl(new mapboxgl.NavigationControl());
        const marker = new mapboxgl.Marker();
        if(lat.value !== '' && long.value !== ''){
            marker.setLngLat({lng: long.value,lat: lat.value}).addTo(map);
        }
        map.on('click', async function(e){
            lat.value = e.lngLat.lat;
            long.value = e.lngLat.lng;
            const pos = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${e.lngLat.lng},${e.lngLat.lat}.json?types=poi&lang=id&access_token=pk.eyJ1Ijoic29icnVuIiwiYSI6ImNrY2FiN2l1czFlcTQzMm4wb2E2YTBwbnYifQ.w6sIAs-_094-BeoY-OHtKQ`)
                .then(res => res.json()).then(res => res.features[0]);
           let jl,desa, Kecamatan,Kabupaten,kode_pos;

            if(pos !== undefined){
               jl = pos.properties.address === undefined ? '' : pos.properties.address;
               desa = "Desa "+pos.context[0].text;
               Kecamatan = "Kecamatan "+pos.context[1].text;
               Kabupaten = pos.context[3].text;
               kode_pos = pos.context[2].text;
               alamat.value = jl+', '+desa+', '+Kecamatan+', '+Kabupaten+', '+kode_pos;
            }else {
                alamat.value = '';
            }

            const popup = new mapboxgl.Popup({ offset: 25 })
                .setLngLat(e.lngLat)
                .setHTML(`<p class="text-dark">${pos === undefined ? 'Alamat tidak ditemukan' : jl+', '+desa+', '+Kecamatan+', '+Kabupaten+', '+kode_pos  }</p></div>`)
                .addTo(map);
            marker.setLngLat(e.lngLat).addTo(map);
        });
    </script>

@endsection