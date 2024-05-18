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
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Reservasi</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('mdltransport') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('mobilmdltransport') }}">Mobil</a></li>
                        <li class="breadcrumb-item"><a
                                href="/detailmobil/{{ $mobil->noPolisi }}">{{ $mobil->merekMobil }}</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Reservasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Detail Mobil Start -->
        {{-- <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('gambarMobil/' . $mobil->gambarMobil) }}" class="img-fluid"
                        alt="{{ $mobil->merekMobil }}">
                </div>
                <div class="col-md-6">
                    <h2>{{ $mobil->merekMobil }} - {{ $mobil->modelMobil }}</h2>
                    {{-- <p> Kapasitas Mobil : {{ $mobil->kapasitasMobil }}</p>
                    <p> Tahun Mobil : {{ $mobil->tahunMobil }}</p>
                    <p> Deskripsi Mobil : {{ $mobil->deskripsiMobil }}</p>
                    <h5 class="text-secondary">Harga: Rp. {{ $mobil->hargaSewa }}</h5>
                    <a href="#" class="btn btn-dark rounded-pill py-2 px-4 m-2 " style="float:right;">Reservasi <i
                        class="fa fa-cart-plus ms-2"></i></a> --}}
        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
        {{-- </div>
            </div>
        </div> --}}

        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('gambarMobil/' . $mobil->gambarMobil) }}" class="img-fluid"
                        alt="{{ $mobil->merekMobil }}">
                </div>
                <div class="col-md-6">
                    <h2>{{ $mobil->merekMobil }} - {{ $mobil->modelMobil }}</h2>
                    <div class="card">
                        <div class="card-body">

                            <form action="/insertreservasi" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="mobil_noPolisi" value="{{ $mobil->noPolisi }}">
                                {{-- <div class="mb-3 row">
                                    <label for="example-nik-input" class="col-md-3 col-form-label">NIK</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="noNIK" type="text" value=""
                                            id="noNIK" placeholder="Masukkan NIK" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-namaLengkap-input" class="col-md-3 col-form-label">Nama
                                        Lengkap</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="namaLengkap" type="text" value=""
                                            id="namaLengkap" placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-role-input" class="col-md-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-12">
                                        <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                                            <option value="" selected disabled hidden>
                                                -- Pilih Jenis Kelamin --</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-alamat-input" class="col-md-3 col-form-label">Alamat</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="alamat" type="text" value=""
                                            id="alamat" placeholder="Masukkan Alamat Lengkap" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-tel-input" class="col-md-3 col-form-label">No HP</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="noHP" type="tel" value=""
                                            id="noHP" placeholder="Masukkan No HP" pattern="[0-9]+"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                    </div>
                                </div> --}}
                                <div class="mb-3 row">
                                    <label for="example-tel-input" class="col-md-3 col-form-label">Hari/ tanggal</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="created_at" type="date" value=""
                                            id="created_at" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-tel-input" class="col-md-3 col-form-label">Tanggal Mulai</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="tanggalMulai" type="date" value=""
                                            id="tanggalMulai" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-tel-input" class="col-md-3 col-form-label">Tanggal Selesai</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="tanggalSelesai" type="date" value=""
                                            id="tanggalSelesai" placeholder="" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-alamat-input" class="col-md-3 col-form-label">Tujuan</label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="tujuan" type="text" value=""
                                            id="tujuan" placeholder="Masukkan Tujuan" required>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success me-3">Kirim</button>
                                    <a href="/mobil" class="btn btn-danger me-3" type="button">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- Detail Mobil End -->


    </body>
    <!-- Store End -->
    @include('landingpage.footer')
@endsection
