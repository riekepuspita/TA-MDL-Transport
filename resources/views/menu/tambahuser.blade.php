@extends('layout.app')

@section('title')
    Tambah User
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
                                <h4 class="mb-0">Tambah User</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/datauser">Data User</a></li>
                                        <li class="breadcrumb-item active">Tambah User</li>
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
                                    <form action="/insertuser" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Nama User</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="namaUser" type="text" value=""
                                                    id="namaUser" placeholder="Masukkan Nama User" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="email" type="email" value=""
                                                    id="email" placeholder="Masukkan Email User" required>
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="password" type="text" value=""
                                                    id="password" placeholder="Masukkan Password">
                                            </div>
                                        </div> --}}
                                        <div class="mb-3 row">
                                            <label for="example-level-input" class="col-md-2 col-form-label">Level</label>
                                            <div class="col-md-10">
                                                <select class="form-select" id="level" name="level" required>
                                                    <option value="" selected disabled hidden>
                                                        -- Pilih Level User--</option>
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">User</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-status-input" class="col-md-2 col-form-label">Status User</label>
                                            <div class="col-md-10">
                                                <select class="form-select" id="statusUser" name="statusUser" required>
                                                    <option value="" selected disabled hidden>
                                                        -- Pilih Status User --</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="2">Tidak Aktif</option>
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-3">Simpan</button>

                                            <a href="/datauser" class="btn btn-danger me-3">Batal</a>
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
