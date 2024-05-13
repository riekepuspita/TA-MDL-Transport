<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/mdl.png') }}" alt="" height="30"> <span class="logo-txt"
                    style="font-size: 16px;">MDL Transport</span>
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/images/mdl.png') }}" alt="" height="30">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>



    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                @if (Auth::user()->level == 'superadmin' || (Auth::user()->level == 'admin'))
                    <li>
                        <a href="/dashboard">
                            <i class="bx bx-home icon nav-icon"></i>
                            <span class="menu-item" data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li>
                    @if (Auth::user()->level != 'admin')
                        <li>
                            <a href="/datauser">
                                <i class="bx bx-user icon nav-icon"></i>
                                <span class="menu-item" data-key="t-datauser">Data User</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="/datapenyewa">
                            <i class="bx bx-user-plus icon nav-icon"></i>
                            <span class="menu-item" data-key="t-datapenyewa">Data Penyewa</span>
                        </a>
                    </li>

                    <li>
                        <a href="/datamobil">
                            <i class="bx bx-car icon nav-icon"></i>
                            <span class="menu-item" data-key="t-datamobil">Data Mobil</span>
                        </a>
                    </li>

                    <li>
                        <a href="/laporan">
                            <i class="bx bx-file icon nav-icon"></i>
                            <span class="menu-item" data-key="t-laporan">Laporan</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
