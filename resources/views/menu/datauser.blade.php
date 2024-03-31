@extends('layout.app')

@section('title')
    Data Penyewa
@endsection

@section('head')
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
                                <h4 class="mb-0">Data User</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Data Penyewa</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div style="display: flex; justify-content: flex-end; margin-right: 30px; margin-bottom: 15px;">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahuser">Tambah
                                    User</button>
                                {{-- <a href="/tambahuser" type="button" class="btn btn-success" >Tambah User</a> --}}
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ $message }}
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-12"> <!-- table mb-0-->
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama User</th>
                                                    <th>Email</th>
                                                    <th>Level</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $row)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $row->namaUser }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>{{ $row->level }}</td>
                                                        <td>{{ $row->statusUser }}</td>
                                                        <td>
                                                            <a href="/tampilkanuser/{{ $row->idUser }}" title="Edit Data"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="bx bx-pencil"></i>
                                                            </a>
                                                            <button title="Hapus Data" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete('{{ $row->idUser }}')">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection

@section('modal')
    <div class="modal fade" id="tambahuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/insertuser" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaUser" class="col-form-label">Nama User</label>
                            <input type="text" class="form-control" id="namaUser" name="namaUser" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="col-form-label">Level</label>
                            <select class="form-select" id="level" name="level" required>
                                <option value="" selected disabled hidden>
                                    -- Pilih Level User--</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="statusUser" class="col-form-label">Status User</label>
                            <select class="form-select" id="statusUser" name="statusUser" required>
                                <option value="" selected disabled hidden>
                                    -- Pilih Status User --</option>
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Fungsi untuk menampilkan SweetAlert konfirmasi
        function confirmDelete(idUser) {
            Swal.fire({
                icon: "warning",
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan "Ya", maka arahkan ke URL penghapusan
                    window.location.href = "/deleteuser/" + idUser;
                }
            });
        }
    </script>
@endsection
