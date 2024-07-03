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
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail Mobil</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('mobilmdltransport') }}">Mobil</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">{{ $mobil->merekMobil }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Detail Mobil Start -->
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('gambarMobil/' . $mobil->gambarMobil) }}" class="img-fluid"
                        alt="{{ $mobil->merekMobil }}">
                </div>
                <div class="col-md-6">
                    <h2>{{ $mobil->merekMobil }} - {{ $mobil->modelMobil }}</h2>
                    <p> Kapasitas Mobil : {{ $mobil->kapasitasMobil }}</p>
                    <p> Tahun Mobil : {{ $mobil->tahunMobil }}</p>
                    <p> Deskripsi Mobil : {{ $mobil->deskripsiMobil }}</p>
                    <h5 class="text-secondary">Harga Sewa : Rp. {{ $mobil->hargaSewa }}</h5>
                    <a href="/mobil" class="btn btn-secondary rounded-pill py-2 px-4 m-2" style="float:right;">Kembali</a>
                    <a href="/reservasi/{{ $mobil->noPolisi }}" class="btn btn-dark rounded-pill py-2 px-4 m-2 " style="float:right;">Reservasi <i
                        class="fa fa-cart-plus ms-2"></i></a>
                </div>
            </div>
        </div>
        <!-- Detail Mobil End -->
    </body>
    <!-- Store End -->
    @include('landingpage.footer')
@endsection
