@extends('landingpage.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('landingpage.header')

    <body>
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/mdltransport">Home</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Contact Start -->
        <div class="container-xxl contact py-5">
            <div class="container">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-secondary">Contact Us</p>
                    <h1 class="display-6">Hubungi Kami Sekarang Juga!</h1>
                </div>
                <div class="row g-5 mb-5">
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="btn-square mx-auto mb-3">
                            <i class="fab fa-instagram fa-2x text-white"></i>
                        </div>
                        <p class="mb-2">@anndeka_mdlgarage</p>
                    </div>
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="btn-square mx-auto mb-3">
                            <i class="fa fa-phone fa-2x text-white"></i>
                        </div>
                        <p class="mb-2">0856-4942-6390</p>
                    </div>
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <div class="btn-square mx-auto mb-3">
                            <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                        </div>
                        <p class="mb-2">JL.Pattimura, Gg. V Blk. A No.01/08, Sengon, Kabupaten Jombang, Jawa Timur 6141
                        </p>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-15 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-100">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22991.181591135424!2d112.21446765501717!3d-7.553132582365332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78411c11cb3103%3A0xbb2dbff6f49ce1f9!2ssewa%20mobil%20MDL-Transport!5e0!3m2!1sid!2sid!4v1711763122442!5m2!1sid!2sid"
                                width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @include('landingpage.footer')
@endsection
<!-- Contact End -->
