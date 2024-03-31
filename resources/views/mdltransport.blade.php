@extends('landingpage.app')

@section('title')
    MDL Transport
@endsection

@section('content')
    <div id="layout-wrapper">
        @include('landingpage.header')

        <!-- Carousel Start -->
        <div class="container-fluid px-0 mb-5">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('landingpage/img/bg1.jpg') }}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 text-center">
                                        <p class="fs-4 text-secondary animated zoomIn">Welcome to <strong
                                                class="text-dark">MDL
                                                Transport</strong></p>
                                        <h1 class="display-1 text-dark mb-4 animated zoomIn">Repeat Order Anda Senyum Bagi
                                            Kami</h1>
                                        <a href=""
                                            class="btn btn-secondary rounded-pill py-3 px-5 animated zoomIn">Explore
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('landingpage/img/bg2.jpg') }}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 text-center">
                                        <p class="fs-4 text-secondary animated zoomIn">Welcome to <strong
                                                class="text-dark">MDL
                                                Transport</strong></p>
                                        <h1 class="display-1 text-dark mb-4 animated zoomIn">Repeat Order Anda Senyum Bagi
                                            Kami</h1>
                                        <a href=""
                                            class="btn btn-secondary rounded-pill py-3 px-5 animated zoomIn">Explore
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Article Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid" src="{{ asset('landingpage/img/gambar1.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="section-title">
                            <p class="fs-5 fw-medium fst-italic text-secondary">MDL Transport</p>
                            <h1 class="display-6">"Your Reliable Partner in Transportation Excellence"</h1>
                        </div>
                        <p class="mb-4">MDL Transport adalah sebuah perusahaan yang berdedikasi dalam bidang transportasi,
                            dengan komitmen untuk memberikan layanan yang berkualitas tinggi dan terpercaya kepada
                            pelanggan. Berlokasi strategis di JL.Pattimura, Gg. V Blk. A No.01/08, Sengon, Kabupaten
                            Jombang, Jawa Timur. MDL Transport telah menjadi pilihan utama bagi individu dan perusahaan yang
                            membutuhkan solusi transportasi yang efisien dan handal.</p>
                        <p class="mb-4">Didukung oleh armada kendaraan yang modern dan terawat dengan baik, serta tenaga
                            kerja yang profesional
                            dan berpengalaman, MDL Transport memberikan jaminan akan pengalaman perjalanan yang aman,
                            nyaman, dan tepat waktu bagi setiap pelanggan. Keandalan dan keunggulan layanan menjadi landasan
                            utama dalam setiap operasi MDL Transport, menjadikan mereka sebagai mitra yang dapat diandalkan
                            dalam memenuhi kebutuhan transportasi di berbagai situasi dan keperluan.</p>
                        {{-- <a href="" class="btn btn-secondary rounded-pill py-3 px-5">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Article End -->


        <!-- Products Start -->
        <div class="container-fluid product py-5 my-5">
            <div class="container py-5">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-secondary">Galeri MDL Transport</p>
                    {{-- <h1 class="display-6">Tea has a complex positive effect on the body</h1> --}}
                </div>
                <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                    <a href="" class="d-block product-item rounded">
                        <img src="{{ asset('landingpage/img/bg1.jpg') }}" alt="">
                        {{-- <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                            <h4 class="text-secondary">Green Tea</h4>
                            <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                        </div> --}}
                    </a>
                    <a href="" class="d-block product-item rounded">
                        <img src="{{ asset('landingpage/img/bg2.jpg') }}" alt="">
                        {{-- <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                            <h4 class="text-secondary">Black Tea</h4>
                            <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                        </div> --}}
                    </a>
                    <a href="" class="d-block product-item rounded">
                        <img src="{{ asset('landingpage/img/bg3.jpg') }}" alt="">
                        {{-- <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                            <h4 class="text-secondary">Spiced Tea</h4>
                            <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                        </div> --}}
                    </a>
                    <a href="" class="d-block product-item rounded">
                        <img src="{{ asset('landingpage/img/gambar4.jpg') }}" alt="">
                        {{-- <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                            <h4 class="text-secondary">Organic Tea</h4>
                            <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>
                        </div> --}}
                    </a>
                </div>
            </div>
        </div>
        <!-- Products End -->

        <!-- Store Start -->
        <div class="container-xxl py-5">
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
                                <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i
                                        class="fa fa-cart-plus ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="{{ asset('landingpage/img/store-product-2.jpg') }}"
                                alt="">
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
                                <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i
                                        class="fa fa-cart-plus ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="{{ asset('landingpage/img/store-product-3.jpg') }}"
                                alt="">
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
                                <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i
                                        class="fa fa-cart-plus ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a href="/mobil" class="btn btn-secondary rounded-pill py-3 px-5">Lebih Banyak Mobil</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Store End -->

        <!-- Testimonial Start -->
        <div class="container-fluid testimonial py-5 my-5">
            <div class="container py-5">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s"
                    style="max-width: 500px;">
                    <p class="fs-5 fw-medium fst-italic text-secondary">Contact Us</p>
                    <h1 class="display-6">Hubungi Kami Sekarang Juga!</h1>
                </div>
                <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                                <div class="btn-square mx-auto mb-3">
                                    <i class="fab fa-instagram fa-2x text-secondary"></i>
                                </div>
                                <p class="mb-2">@anndeka_mdlgarage</p>
                            </div>
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                                <div class="btn-square mx-auto mb-3">
                                    <i class="fa fa-phone fa-2x text-secondary"></i>
                                </div>
                                <p class="mb-2">0856-4942-6390</p>
                            </div>
                            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                                <div class="btn-square mx-auto mb-3">
                                    <i class="fa fa-map-marker-alt fa-2x text-secondary"></i>
                                </div>
                                <p class="mb-2">JL.Pattimura, Gg. V Blk. A No.01/08, Sengon, Kabupaten Jombang, Jawa Timur 61418</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        
        <div class="container-xxl contact py-5">
            <div class="container">
                <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-6">"Your trip is my Job"</h1>
                    <p>Rencanakan liburan dengan teman dan keluarga anda bersama MDL TRANSPORT</p>
                </div>
            </div>
        </div>
    </div>
    @include('landingpage.footer')
    <!-- Contact Start -->
@endsection
