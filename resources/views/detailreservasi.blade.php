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
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail Reservasi</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('mdltransport') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('mobilmdltransport') }}">Mobil</a></li>
                        <li class="breadcrumb-item"><a href="">Reservasi</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Detail Reservasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    @if ($pemesanan->mobil)
                        <img src="{{ asset('gambarMobil/' . $pemesanan->mobil->gambarMobil) }}" class="img-fluid"
                            alt="{{ $pemesanan->mobil->merekMobil }}">
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($pemesanan->mobil)
                        <h2> Reservasi {{ $pemesanan->mobil->merekMobil }} - {{ $pemesanan->mobil->modelMobil }}</h2>
                        <div class="mb-4"></div>
                        @endif
                    <div class="card">
                        <div class="container">
                            <h4>Detail Reservasi</h4>
                            <table>
                                <tr>
                                    <td>No NIK :</td>
                                    <td>{{ $penyewa->noNIK }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap :</td>
                                    <td>{{ $penyewa->namaLengkap }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin :</td>
                                    <td>{{ $penyewa->jeniskelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat :</td>
                                    <td>{{ $penyewa->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No HP :</td>
                                    <td>{{ $penyewa->noHP }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai :</td>
                                    <td>{{ $pemesanan->tanggalMulai }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Selesai :</td>
                                    <td>{{ $pemesanan->tanggalSelesai }}</td>
                                </tr>
                                <tr>
                                    <td>Tujuan :</td>
                                    <td>{{ $pemesanan->tujuan }}</td>
                                </tr>
                                <tr>
                                    <td>Pembayaran :</td>
                                    <td>{{ $pemesanan->mobil->hargaSewa }}</td>
                                </tr>
                            </table>
                            <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                                <button class="btn btn-secondary" style="margin-bottom: 20px;">Bayar Sekarang</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        

    </body>
    <!-- Store End -->
    @include('landingpage.footer')
@endsection






