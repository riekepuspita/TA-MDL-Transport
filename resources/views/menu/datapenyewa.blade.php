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
                                <h4 class="mb-0">Data Penyewa</h4>

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
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#tambahPenyewa">Tambah
                                    Penyewa</button>
                                {{-- <a href="/tambahpenyewa" type="button" class="btn btn-success">Tambah Penyewa</a> --}}
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
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>No HP</th>
                                                    <th>Hari dan Tanggal</th>
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
                                                        <td>{{ $row->noNIK }}</td>
                                                        <td>{{ $row->namaLengkap }}</td>
                                                        <td>{{ $row->noHP }}</td>
                                                        <td>{{ $row->created_at->locale('id')->format('l, d F Y') }}</td>
                                                        <td>
                                                            <a href="/tampilkanpenyewa/{{ $row->idPenyewa }}"
                                                                title="Edit Data" class="btn btn-warning btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editpenyewa{{ $row->idPenyewa }}">
                                                                <i class="bx bx-pencil"></i>
                                                            </a>
                                                            <button title="Hapus Data" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete('{{ $row->idPenyewa }}')">
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
    <div class="modal fade" id="tambahPenyewa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penyewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/insertpenyewa" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="noNIK" class="col-form-label">NIK</label>
                            <input type="text" class="form-control" id="noNIK" name="noNIK"
                                placeholder="Masukkan NIK Penyewa" required>
                        </div>
                        <div class="mb-3">
                            <label for="namaLengkap" class="col-form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaLengkap" name="namaLengkap"
                                placeholder="Masukkan Nama Lengkap Penyewa" required>
                        </div>
                        <div class="mb-3">
                            <label for="jeniskelamin" class="col-form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                                <option value="" selected disabled hidden>
                                    -- Pilih Jenis Kelamin--</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan Alamat Penyewa" required>
                        </div>
                        <div class="mb-3">
                            <label for="noHP" class="col-form-label">No HP</label>
                            <input type="tel" class="form-control" id="noHP" name="noHP"
                                placeholder="Masukkan No HP Penyewa" pattern="[0-9]+"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"required>
                        </div>
                        <div class="mb-3">
                            <label for="noHP" class="col-form-label">Hari / Tanggal</label>
                            <input type="date" class="form-control" id="created_at" name="created_at" required>
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

    @foreach ($data as $row)
        <div class="modal fade" id="editpenyewa{{ $row->idPenyewa }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Penyewa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form edit data -->
                        <form action="{{ route('updatepenyewa', $row->idPenyewa) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="noNIK">NIK</label>
                                <input type="text" name="noNIK" class="form-control" id="noNIK"
                                    value="{{ $row->noNIK }}" required>
                            </div>
                            <div class="form-group">
                                <label for="namaLengkap">Nama Lengkap</label>
                                <input type="text" name="namaLengkap" class="form-control" id="namaLengkap"
                                    value="{{ $row->namaLengkap }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jeniskelamin" class="col-form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                                    <option value="1" {{ $row->jeniskelamin == 'lakilaki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="2" {{ $row->jeniskelamin == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    value="{{ $row->alamat }}" required>
                            </div>
                            <div class="form-group">
                                <label for="noHP">No HP</label>
                                <input type="tel" name="noHP" class="form-control" id="noHP"
                                    value="{{ $row->noHP }}" required>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Hari / Tanggal</label>
                                <input type="date" name="created_at" class="form-control" id="created_at"
                                    value="{{ $row->created_at->format('Y-m-d') }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script>
        // Fungsi untuk menampilkan SweetAlert konfirmasi
        function confirmDelete(idPenyewa) {
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
                    window.location.href = "/delete/" + idPenyewa;
                }
            });

            // Mencegah tindakan default dari tombol
            event.preventDefault();
        }
    </script>
@endsection
