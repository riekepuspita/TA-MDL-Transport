<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-secondary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <img class="img-fluid" src="{{ asset('landingpage/img/mdl.png') }}" alt="Logo"
                        style="width: 70px; height: auto;">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/mdltransport"
                            class="nav-item nav-link {{ $title === 'MDL Transport' ? 'active' : '' }}">Home</a>
                        <a href="/about" class="nav-item nav-link {{ $title === 'About' ? 'active' : '' }}">About</a>
                        <a href="/mobil" class="nav-item nav-link {{ $title === 'Mobil' ? 'active' : '' }}">Mobil</a>
                        <a href="/contact"
                            class="nav-item nav-link {{ $title === 'Contact' ? 'active' : '' }}">Contact</a>
                    </div>

                    <div class="border-start ps-4 d-none d-lg-block">
                        @auth
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/profil.png') }}"
                                        alt="Header Avatar" style="width: 30px; height: 30px;">
                                        <div class="user-info ms-2 d-none d-xl-inline-block">
                                            <span class="user-name">{{ $user->namaUser }}</span>
                                            <br> <!-- Tambahkan jeda baris di sini -->
                                            <span class="user-email" style="font-size: 14px; color: blue;">{{ $user->email }}</span>
                                        </div>
                                        
                                </button>


                                <div class="dropdown-menu dropdown-menu-end pt-0">
                                    <a class="dropdown-item" href="#"><i
                                            class='bx bx-user-circle text-muted font-size-18 align-middle me-1'></i> <span
                                            class="align-middle">My Account</span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class='bx bx-log-out text-muted font-size-18 align-middle me-1'></i> <span
                                            class="align-middle">Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="/login" class="btn btn-secondary">LOGIN</a>
                        @endauth
                    </div>
                    
                    
                    

                    {{-- <div class="border-start ps-4 d-none d-lg-block">
                        @auth

                        <div class="user-info">
                            <p>Welcome, {{ $user->namaUser }}</p>
                            <p>Email: {{ $user->email }}</p>
                        </div>

                            <a href="{{ route('logout') }}" class="btn btn-secondary"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                LOGOUT
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="/login" class="btn btn-secondary">LOGIN</a>
                        @endauth
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
</body>
