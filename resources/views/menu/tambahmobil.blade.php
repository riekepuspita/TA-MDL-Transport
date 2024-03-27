@extends('layout.app')

@section('title')
    Tambah Mobil
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
                                <h4 class="mb-0">Tambah Mobil</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/datamobil">Data Mobil</a></li>
                                        <li class="breadcrumb-item active">Tambah Mobil</li>
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
                                    <form action="/insertmobil" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">No
                                                Polisi</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="noPolisi" type="text" value=""
                                                    id="noPolisi" placeholder="Masukkan No Polisi" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Merek
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="merekMobil" type="text" value=""
                                                    id="merekmobil" placeholder="Masukkan Merek Mobil" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Model
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="modelMobil" type="text" value=""
                                                    id="modelMobil" placeholder="Masukkan Model Mobil" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Kapasitas
                                                Orang</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="kapasitasMobil" type="number"
                                                    value="" id="kapasitasMobil"
                                                    placeholder="Masukkan Kapasitas Orang" min="0" max="99" required >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Tahun
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="tahunMobil" type="text" value=""
                                                    id="tahunMobil" placeholder="Masukkan Tahun Pembuatan Mobil" pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">Deskripsi
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="deskripsiMobil" id="deskripsiMobil" placeholder="Masukkan Deskripsi Mobil"
                                                    style="height: 150px;" required></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Harga
                                                Sewa</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="hargaSewa" type="text" value=""
                                                    id="hargaSewa" placeholder="Masukkan Harga Sewa Mobil" pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-role-input" class="col-md-2 col-form-label">Status
                                                Ketersediaan</label>
                                            <div class="col-md-10">
                                                <select class="form-select" id="statusMobil" name="statusMobil" required>
                                                    <option value="" selected disabled hidden>
                                                        -- Pilih Status Ketersediaan --</option>
                                                    <option value="1">Tersedia</option>
                                                    <option value="2">Tidak Tersedia</option>
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Gambar
                                                Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="gambarMobil" value=""
                                                    id="gambarMobil" type="file" accept=".jpg, .jpeg, .png" required>
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
