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
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Mobil</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Mobil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Store Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-secondary">Mau sewa mobil?</p>
                    <h1 class="display-6">Pilih Mobilmu, Nikmati Perjalananmu!</h1>
                </div>
                <div class="row g-5">
                    @foreach ($data as $mobil)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="store-item position-relative text-center h-100">
                                <img class="img-fluid" src="{{ asset('gambarMobil/' . $mobil->gambarMobil) }}"
                                    alt="{{ $mobil->merekMobil }}">
                                <div class="p-4">
                                    <div class="text-center mb-3">
                                        <small class="fa fa-star text-secondary"></small>
                                        <small class="fa fa-star text-secondary"></small>
                                        <small class="fa fa-star text-secondary"></small>
                                        <small class="fa fa-star text-secondary"></small>
                                        <small class="fa fa-star text-secondary"></small>
                                    </div>
                                    <h4 class="mb-3">{{ $mobil->merekMobil }} - {{ $mobil->modelMobil }}</h4>
                                    <p>{{ $mobil->tahunMobil }}</p>
                                    <h4 class="text-secondary">Harga Sewa : Rp. {{ $mobil->hargaSewa }}</h4>
                                </div>
                                <div class="store-overlay">
                                    <a href="/detailmobil/{{ $mobil->noPolisi }}"
                                        class="btn btn-secondary rounded-pill py-2 px-4 m-2">Selengkapnya <i
                                            class="fa fa-arrow-right ms-2"></i></a>

                                    <a href="/reservasi/{{ $mobil->noPolisi }}"
                                        class="btn btn-dark rounded-pill py-2 px-4 m-2">Reservasi <i
                                            class="fa fa-cart-plus ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- <div class="container-xxl py-5">
            <div class="container">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-secondary">Mau sewa mobil?</p>
                    <h1 class="display-6">Pilih Mobilmu, Nikmati Perjalananmu!</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="{{ asset('landingpage/img/store-product-1.jpg') }}" alt="">
                            <div class="p-4">
                                <div class="text-center mb-3">
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                </div>
                                <h4 class="mb-3">Nature close tea</h4>
                                <p>Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed</p>
                                <h4 class="text-secondary">$19.00</h4>
                            </div>
                            <div class="store-overlay">
                                <a href="" class="btn btn-secondary rounded-pill py-2 px-4 m-2">More Detail <i
                                        class="fa fa-arrow-right ms-2"></i></a>
                                <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Reservasi <i
                                        class="fa fa-cart-plus ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="{{ asset('landingpage/img/store-product-2.jpg') }}" alt="">
                            <div class="p-4">
                                <div class="text-center mb-3">
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                </div>
                                <h4 class="mb-3">Green tea tulsi</h4>
                                <p>Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed</p>
                                <h4 class="text-secondary">$19.00</h4>
                            </div>
                            <div class="store-overlay">
                                <a href="" class="btn btn-secondary rounded-pill py-2 px-4 m-2">More Detail <i
                                        class="fa fa-arrow-right ms-2"></i></a>
                                <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Reservasi <i
                                        class="fa fa-cart-plus ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="{{ asset('landingpage/img/store-product-3.jpg') }}" alt="">
                            <div class="p-4">
                                <div class="text-center mb-3">
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                    <small class="fa fa-star text-secondary"></small>
                                </div>
                                <h4 class="mb-3">Instant tea premix</h4>
                                <p>Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed</p>
                                <h4 class="text-secondary">$19.00</h4>
                            </div>
                            <div class="store-overlay">
                                <a href="" class="btn btn-secondary rounded-pill py-2 px-4 m-2">More Detail <i
                                        class="fa fa-arrow-right ms-2"></i></a>
                                <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Reservasi <i
                                        class="fa fa-cart-plus ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a href="" class="btn btn-secondary rounded-pill py-3 px-5">View More Products</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </body>
    <!-- Store End -->
    @include('landingpage.footer')
@endsection
