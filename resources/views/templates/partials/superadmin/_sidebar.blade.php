<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('assets/img/dp.jpg')}}" class="img-circle user-img-circle"
                                 alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p> Kiran Patel</p>
                            <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                                    Online</span></a>
                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="{{route('dashboards.index')}}"
                       class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>

                    </a>
                <li class="nav-item">
                    <a href="{{route('datamitra.index')}}"
                       class="nav-link nav-toggle">
                        <i class="material-icons">business</i>
                        <span class="title">Data Mitra</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ruangmeetings.index')}}"
                       class="nav-link nav-toggle">
                        <i class="material-icons">business</i>
                        <span class="title">Ruang Meeting</span>
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    <a href="{{route('datatransaksi.index')}}"
                       class="nav-link nav-toggle">
                        <i class="material-icons">event</i>
                        <span class="title">Data Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('datauser.index')}}"
                       class="nav-link nav-toggle">
                        <i class="material-icons">local_library</i>
                        <span class="title">Data User</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>