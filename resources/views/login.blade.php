@extends('layout.app')

@section('title')
    Login
@endsection

@section('content')

    <body data-layout="horizontal" data-topbar="dark">

        {{-- <div class="authentication-bg min-vh-100"> --}}
        <div class="authentication-bg"
            style="background-image: url('{{ asset('assets/images/pastel.jpeg') }}'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">

                            <div class="text-center mb-4">
                                <a href="index.html">
                                    <img src="{{ asset('assets/images/mdl.png') }}" alt="" height="50"> 
                                    <h1 style="color: rgb(210, 126, 47); display: inline-block; font-size: 20px;">MDL Transport</h1>
                                </a>
                            </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5 class="text" style="color: rgb(210, 126, 47);" >Login</h5>
                                        <p class="text-muted">Masuk untuk melanjutkan ke MDL Transport !</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form action="/auth" method="POST">
                                            @csrf


                                            {{-- <div class="mb-3">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username"
                                                    placeholder="Masukkan Username">
                                            </div> --}}

                                            <div class="mb-3">
                                                <label class="form-label" for="useremail">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Enter email">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" name="password" id="password"
                                                    placeholder="Masukkan Password">
                                            </div>

                                            <div class="mt-3 text-end">
                                                <button class="btn btn-primary w-sm waves-effect waves-light" style="background-color: rgb(210, 126, 47);"
                                                    type="submit">Masuk</button>
                                            </div>

                                            {{-- <div class="mt-4 text-center">
                                                <div class="signin-other-title">
                                                    <h5 class="font-size-14 mb-3 title" style="color: #999;">atau</h5>
                                                </div>


                                                <div class=" d grid row g-3 mb-0">
                                                    <!--begin::Col-->
                                                    <!--begin::Google link--->
                                                    <a href="#"
                                                        class="btn btn-flex btn-primary btn-active-color-primary bg-white border border-primary flex-center text-nowrap w-100">
                                                        <img alt="Logo"
                                                            src="{{ asset('assets/images/google-icon.svg') }}"
                                                            class="h-15px me-3">
                                                        <span style="color: black;">Masuk dengan Google</span>
                                                    </a>
                                                    <!--end::Google link--->
                                                </div>
                                            </div> --}}

                                            <div class="mt-4 text-center">
                                                <p class="text-muted mb-0">Belum punya akun ? <a
                                                        href="{{ route('registrasi') }}" class="fw-medium text" style="color: rgb(210, 126, 47);">
                                                        Registrasi</a></p>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center text-muted p-4">
                                <p class="text-white-50">©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> Symox. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                    by Themesbrand
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- end container -->
        </div>
    @endsection
