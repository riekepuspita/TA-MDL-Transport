<body data-layout="vertical" data-sidebar="dark">

    <header id="page-topbar" class="isvertical-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/mdl.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/mdl.png') }}" alt="" height="22"> <span
                                class="logo-txt">Symox</span>
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/mdl.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/mdl.png') }}" alt="" height="22"> <span
                                class="logo-txt">Symox</span>
                        </span>
                    </a>

                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- Search -->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="bx bx-search"></span>
                    </div>
                </form>

            </div>

            <div class="d-flex">
                <div class="dropdown d-inline-block d-lg-none">
                    <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-sm" data-feather="search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                        <form class="p-2">
                            <div class="search-box">
                                <div class="position-relative">
                                    <input type="text" class="form-control rounded bg-light border-0"
                                        placeholder="Search...">
                                    <i class="mdi mdi-magnify search-icon"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-sm" data-feather="bell"></i>
                        <span class="noti-dot bg-danger rounded-pill">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-0 font-size-15"> Notifications </h5>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small"> Mark all as read</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 250px;">
                            <h6 class="dropdown-header bg-light">New</h6>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex border-bottom align-items-start">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                            class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Justin Verduzco</h6>
                                        <div class="text-muted">
                                            <p class="mb-1 font-size-13">Your task changed an issue from "In
                                                Progress" to <span
                                                    class="badge text-success bg-success-subtle">Review</span></p>
                                            <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                    class="mdi mdi-clock-outline"></i> 1 hour ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex border-bottom align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-sm me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-shopping-bag"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">New order has been placed</h6>
                                        <div class="text-muted">
                                            <p class="mb-1 font-size-13">Open the order confirmation or shipment
                                                confirmation.</p>
                                            <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                    class="mdi mdi-clock-outline"></i> 5 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <h6 class="dropdown-header bg-light">Earlier</h6>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex border-bottom align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-sm me-3">
                                            <span
                                                class="avatar-title bg-success-subtle text-success rounded-circle font-size-16">
                                                <i class="bx bx-cart"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your item is shipped</h6>
                                        <div class="text-muted">
                                            <p class="mb-1 font-size-13">Here is somthing that you might light like
                                                to know.</p>
                                            <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                    class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="d-flex border-bottom align-items-start">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}"
                                            class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Salena Layfield</h6>
                                        <div class="text-muted">
                                            <p class="mb-1 font-size-13">Yay ! Everything worked!</p>
                                            <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                    class="mdi mdi-clock-outline"></i> 3 days ago</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 btn-block text-center"
                                href="javascript:void(0)">
                                <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                            </a>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item light-dark" id="mode-setting-btn">
                        <i data-feather="moon" class="icon-sm layout-mode-dark"></i>
                        <i data-feather="sun" class="icon-sm layout-mode-light"></i>
                    </button>
                </div> --}}

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item user text-start d-flex align-items-center"
                        id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/profil.png') }}"
                            alt="Header Avatar">
                        <div class="user-info ms-2 d-none d-xl-inline-block">
                            <span class="user-name">{{ Auth::user()->namaUser }}</span>
                            <span class="user-email">{{ Auth::user()->email }}</span>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <a class="dropdown-item" href="contacts-profile.html"><i
                                class='bx bx-user-circle text-muted font-size-18 align-middle me-1'></i> <span
                                class="align-middle">My Account</span></a>
                        <a class="dropdown-item" method="post" href="{{ route('logout') }}"><i
                                class='bx bx-log-out text-muted font-size-18 align-middle me-1'></i> <span
                                class="align-middle">Logout</span></a>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
</body>
