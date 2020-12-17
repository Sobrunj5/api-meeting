@extends('templates.superadmin')
@section('content')
	<!-- BEGIN PROFILE CONTENT -->
	<div class="profile-content">
		<div class="row">
			<div class="col-12">
				<div class="card-topline-aqua">
					<header></header>
				</div>
				<div class="white-box">
					<!-- Nav tabs -->
					<div class="p-rl-20">
						<ul class="nav customtab nav-tabs" role="tablist">
							<li class="nav-item"><a href="#tab2" class="nav-link"
													data-toggle="tab">Activity</a></li>
						</ul>
					</div>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div id="biography">
								<div class="row">
									<div class="col-md-3 col-6 b-r"> <strong>Nama Ruangan</strong>
										<br>
										<td>{{$data->nama_tempat}}</td>
									</div>
									<div class="col-md-3 col-6 b-r"> <strong>Kapasitas</strong>
										<br>
										<td>{{$data->kapasitas}}</td>
									</div>
									<div class="col-md-3 col-6 b-r"> <strong>Email</strong>
										<br>
										<td>{{$data->mitra->email}}</td>
									</div>
									<div class="col-md-3 col-6"> <strong>No hp</strong>
										<br>
										<td>{{$data->mitra->no_hp}}</td>
									</div>
									<div class="col-md-3 col-6 b-r"> <strong>Nama Pemilik</strong>
										<br>
										<td>{{$data->mitra->nama_pemilik}}</td>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page content -->


@endsection