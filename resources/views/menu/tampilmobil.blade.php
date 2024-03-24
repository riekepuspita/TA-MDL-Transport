@extends('layout.app')

@section('title')
    Tampil Mobil
@endsection

@section('content')
    <div id="layout-wrapper">
        @include('layout.header')
        @include('layout.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Edit Data Mobil</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/datamobil">Data Mobil</a></li>
                                        <li class="breadcrumb-item active">Edit Data Mobil</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/updatemobil/{{ $data->noPolisi }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">No
                                                Polisi</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="noPolisi" type="text"
                                                    value="{{ $data->noPolisi }}" id="noPolisi"
                                                    placeholder="Masukkan No Polisi">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Merek
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="merekMobil" type="text"
                                                    value="{{ $data->merekMobil }}" id="merekmobil"
                                                    placeholder="Masukkan Merek Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Model
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="modelMobil" type="text"
                                                    value="{{ $data->modelMobil }}" id="modelMobil"
                                                    placeholder="Masukkan Model Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Kapasitas
                                                Orang</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="kapasitasMobil" type="text"
                                                    value="{{ $data->kapasitasMobil }}" id="kapasitasMobil"
                                                    placeholder="Masukkan Kapasitas Orang">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Tahun
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="tahunMobil" type="text"
                                                    value="{{ $data->tahunMobil }}" id="tahunMobil"
                                                    placeholder="Masukkan Tahun Pembuatan Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">Deskripsi
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="deskripsiMobil" id="deskripsiMobil"
                                                    placeholder="Masukkan Deskripsi Mobil" style="height: 150px;">{{ $data->deskripsiMobil }}</textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Harga
                                                Sewa</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="hargaSewa" type="text"
                                                    value="{{ $data->hargaSewa }}" id="hargaSewa"
                                                    placeholder="Masukkan Harga Sewa Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-role-input" class="col-md-2 col-form-label">Status
                                                Ketersediaan</label>
                                            <div class="col-md-10">
                                                <select class="form-select" id="statusMobil" name="statusMobil">
                                                    <option value selected>{{ $data->statusMobil }}</option>
                                                    <option value="1">Tersedia</option>
                                                    <option value="2">Tidak Tersedia</option>
                                                    </option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="gambarMobil" class="col-md-2 col-form-label">Gambar Mobil</label>
                                            <div class="col-md-10">

                                                <input class="form-control" name="gambarMobil" id="gambarMobil" type="file" accept=".jpg, .jpeg, .png">
                                                
                                                @if ($data->gambarMobil)
                                                    <img src="{{ asset('gambarMobil/' . $data->gambarMobil) }}" alt="Gambar Mobil" class="mt-2" style="max-width: 300px;">
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-3">Simpan</button>
                                            <a href="/datamobil" class="btn btn-danger me-3">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
            @include('layout.footer')
        </div>
    </div>
@endsection
