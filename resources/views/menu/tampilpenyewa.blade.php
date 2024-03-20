@extends('layout.app')

@section('title')
    Tampil Penyewa
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
                                <h4 class="mb-0">Edit Data Penyewa</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/datapenyewa">Data Penyewa</a></li>
                                        <li class="breadcrumb-item active">Edit Data Penyewa</li>
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
                                    <form action="/updatepenyewa/{{ $data->idPenyewa }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">NIK</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="noNIK" type="number" id="noNIK"
                                                    placeholder="Masukkan NIK" value="{{ $data->noNIK }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="namaLengkap" type="text"
                                                    id="namaLengkap" placeholder="Masukkan Nama Penyewa"
                                                    value="{{ $data->namaLengkap }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-role-input" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <select class="form-select" id="jeniskelamin" name="jeniskelamin">
                                                    <option selected>{{ ucwords(strtolower($data->jeniskelamin)) }}
                                                    </option>
                                                        <option value="1">Laki-laki</option>
                                                        <option value="2">Perempuan</option>
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-url-input" class="col-md-2 col-form-label">Alamat</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="alamat" type="text" id="alamat"
                                                    placeholder="Masukkan Alamat Penyewa" value="{{ $data->alamat }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">No HP</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="noHP" type="tel" id="noHP"
                                                    placeholder="Masukkan No HP Penyewa" value="{{ $data->noHP }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="email" type="email" id="email"
                                                    placeholder="Masukkan Email Penyewa" value="{{ $data->email }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-password-input"
                                                class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="password" value="" id="password">
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3 row">
                                            <label for="example-gambarktp-input" class="col-md-2 col-form-label">Upload
                                                KTP</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="ktp" value="{{ $data->ktp }}" id="ktp"
                                                    type="file" accept=".jpg, .jpeg, .png">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-gambarsim-input" class="col-md-2 col-form-label">Upload
                                                Selfie KTP</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="selfiktp" value="" id="selfiktp"
                                                    type="file" accept=".jpg, .jpeg, .png">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-gambarsim-input" class="col-md-2 col-form-label">Upload
                                                SIM</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="sim" value="" id="sim"
                                                    type="file" accept=".jpg, .jpeg, .png">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-gambarsim-input" class="col-md-2 col-form-label">Upload
                                                KK</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="kk" value="" id="kk"
                                                    type="file" accept=".jpg, .jpeg, .png">
                                            </div>
                                        </div> --}}
                                        <div class="mb-3 row">
                                            <label for="example-selfiektp-input"
                                                class="col-md-2 col-form-label">Role</label>
                                            <div class="col-md-10">
                                                <select class="form-select" id="role" name="role">
                                                    <option value selected>{{ ucwords(strtolower($data->role)) }}</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Penyewa</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-3">Simpan</button>

                                            <a href="/datapenyewa" class="btn btn-danger me-3">Batal</a>
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
