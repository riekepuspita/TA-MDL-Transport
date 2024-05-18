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
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
</body>
