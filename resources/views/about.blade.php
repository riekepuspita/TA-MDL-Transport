@extends('landingpage.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div id="layout-wrapper">
        @include('landingpage.header')

        <body>
            <!-- Page Header Start -->
            <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container text-center py-5">
                    <h1 class="display-2 text-dark mb-4 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="/mdltransport">Home</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- About Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="row g-3">
                                <div class="col-6 text-end">
                                    <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s"
                                        src="{{ asset('landingpage/img/bg5.jpg') }}" alt="">
                                    <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s"
                                        src="{{ asset('landingpage/img/bg4.jpg') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s"
                                        src="{{ asset('landingpage/img/bg3.jpg') }}" alt="">
                                    <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s"
                                        src="{{ asset('landingpage/img/bg1.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="section-title">
                                <p class="fs-5 fw-medium fst-italic text-secondary">About MDL Transport</p>
                                <h1 class="display-6">"Your trip is my Job"</h1>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-sm-4">
                                    <img class="img-fluid bg-white w-100" src="{{ asset('landingpage/img/gambar1.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-sm-8">
                                    <h5>MDL Transport memiliki kepanjangan Monggo DoLan Transport adalah sebuah perusahaan
                                        yang berdedikasi dalam bidang transportasi.</h5>
                                    <p class="mb-0">Berkomitmen memberikan layanan yang berkualitas tinggi dan terpercaya
                                        kepada
                                        pelanggan. Berlokasi di JL.Pattimura, Gg. V Blk. A No.01/08, Sengon, Kabupaten
                                        Jombang, Jawa Timur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="border-top mb-4"></div>
                        <div class="row g-3">
                            <div class="col-sm-8">
                                <h5>MDL Transport telah menjadi pilihan utama bagi individu dan perusahaan yang
                                    membutuhkan solusi transportasi yang efisien dan handal.</h5>
                                <p class="mb-0">
                                    Didukung oleh armada kendaraan yang modern dan terawat dengan baik, serta tenaga
                                    kerja yang profesional
                                    dan berpengalaman, MDL Transport memberikan jaminan akan pengalaman perjalanan yang
                                    aman,
                                    nyaman, dan tepat waktu bagi setiap pelanggan.Dengan layanan yang ramah, profesional,
                                    dan berorientasi pada kepuasan pelanggan, MDL Transport berkomitmen untuk memberikan
                                    pengalaman transportasi yang memuaskan dan membangun hubungan jangka panjang dengan
                                    pelanggan kami. Bersama MDL Transport, Anda dapat mengandalkan solusi transportasi yang
                                    efisien dan handal untuk keperluan pribadi atau bisnis Anda.</p>

                            </div>
                            <div class="col-sm-4">
                                <img class="img-fluid bg-white w-100" src="{{ asset('landingpage/img/bg2.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </body>
    <!-- About End -->
    @include('landingpage.footer')
    <!-- Footer End -->
    </div>
@endsection
