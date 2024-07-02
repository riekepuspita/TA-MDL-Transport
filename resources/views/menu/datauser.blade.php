@extends('layout.app')

@section('title')
    Data User
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

                                                @foreach ($user as $row)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $row->namaUser }}</td>
                                                        <td>{{ $row->email }}</td>
                                                        <td>
                                                            @if ($row->level == 'superadmin')
                                                                Super Admin
                                                            @elseif ($row->level == 'admin')
                                                                Admin
                                                            @else
                                                                User
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($row->statusUser == 'aktif')
                                                                Aktif
                                                            @elseif ($row->statusUser == 'tidakaktif')
                                                                Tidak Aktif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="" title="Edit Data"
                                                                class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#edituser{{ $row->idUser }}">
                                                                <i class="bx bx-pencil"></i>
                                                            </a>
                                                            <button title="Hapus Data" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete('{{ $row->idUser }}')">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                            {{-- Start Modal Edit --}}
                                                            <div class="modal fade" id="edituser{{ $row->idUser }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Edit Data User
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form
                                                                                action="{{ route('updateuser', $row->idUser) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="mb-3">
                                                                                    <label for="namaUser"
                                                                                        class="col-form-label">Nama
                                                                                        User</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="namaUser"
                                                                                        name="namaUser"
                                                                                        value="{{ $row->namaUser }}"
                                                                                        placeholder="Masukkan Nama User"
                                                                                        required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="email"
                                                                                        class="col-form-label">Email</label>
                                                                                    <input type="email"
                                                                                        class="form-control" id="email"
                                                                                        name="email"
                                                                                        value="{{ $row->email }}"
                                                                                        placeholder="Masukkan Email User"
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="level"
                                                                                        class="col-form-label">Level</label>
                                                                                    <select class="form-select"
                                                                                        id="level" name="level"
                                                                                        required>
                                                                                        <option value="" selected
                                                                                            disabled hidden>
                                                                                            -- Pilih Level User--</option>
                                                                                        <option value="1"
                                                                                            {{ $row->level == 'superadmin' ? 'selected' : '' }}>
                                                                                            Super Admin
                                                                                        </option>
                                                                                        <option value="2"
                                                                                            {{ $row->level == 'admin' ? 'selected' : '' }}>
                                                                                            Admin
                                                                                        </option>
                                                                                        <option value="3"
                                                                                            {{ $row->level == 'user' ? 'selected' : '' }}>
                                                                                            User</option>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="statusUser"
                                                                                        class="col-form-label">Status
                                                                                        User</label>
                                                                                    <select class="form-select"
                                                                                        id="statusUser" name="statusUser"
                                                                                        required>
                                                                                        <option value="" selected
                                                                                            disabled hidden>
                                                                                            -- Pilih Status User --</option>
                                                                                        <option value="1"
                                                                                            {{ $row->statusUser == 'aktif' ? 'selected' : '' }}>
                                                                                            Aktif
                                                                                        </option>
                                                                                        <option value="2"
                                                                                            {{ $row->statusUser == 'tidakaktif' ? 'selected' : '' }}>
                                                                                            Tidak Aktif
                                                                                        </option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="noNIK"
                                                                                        class="col-form-label">NIK</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="noNIK"
                                                                                        name="noNIK"
                                                                                        value="@if ($row->datapenyewa) {{ $row->datapenyewa->noNIK }} @endif"
                                                                                        placeholder="Masukkan NIK Penyewa"
                                                                                        required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="jeniskelamin"
                                                                                        class="col-form-label">Jenis
                                                                                        Kelamin</label>
                                                                                    <select class="form-select"
                                                                                        id="jeniskelamin"
                                                                                        name="jeniskelamin" required>
                                                                                        <option value="" selected
                                                                                            disabled hidden>
                                                                                            -- Pilih Jenis Kelamin--
                                                                                        </option>
                                                                                        @if ($row->datapenyewa)
                                                                                            <option value="1"
                                                                                                {{ $row->datapenyewa->jeniskelamin == 'lakilaki' ? 'selected' : '' }}>
                                                                                                Laki-laki
                                                                                            </option>
                                                                                            <option value="2"
                                                                                                {{ $row->datapenyewa->jeniskelamin == 'perempuan' ? 'selected' : '' }}>
                                                                                                Perempuan
                                                                                            </option>
                                                                                        @endif

                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="alamat"
                                                                                        class="col-form-label">Alamat</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="alamat" name="alamat"
                                                                                        value="@if ($row->datapenyewa) {{ $row->datapenyewa->alamat }} @endif"
                                                                                        placeholder="Masukkan Alamat Penyewa"
                                                                                        required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="noHP"
                                                                                        class="col-form-label">No
                                                                                        HP</label>
                                                                                    <input type="tel"
                                                                                        class="form-control"
                                                                                        id="noHP" name="noHP"
                                                                                        placeholder="Masukkan No HP Penyewa"
                                                                                        value="@if ($row->datapenyewa) {{ $row->datapenyewa->noHP }} @endif"
                                                                                        required>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Simpan
                                                                                        Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- End Modal Edit --}}
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
                            <input type="text" class="form-control" id="namaUser" name="namaUser"
                                placeholder="Masukkan Nama User" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan Email User" required>
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
                        <div class="mb-3">
                            <label for="noNIK" class="col-form-label">NIK</label>
                            <input type="text" class="form-control" id="noNIK" name="noNIK"
                                placeholder="Masukkan NIK Penyewa" required>
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
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"required>
                        </div>
                        <div class="mb-3">
                            <label for="uploadKTP" class="form-label">Unggah KTP</label>
                            <input type="file" class="form-control" id="uploadKTP" name="uploadKTP" accept=".jpg, .jpeg, .png" required>
                            <div class="form-text">Silakan unggah gambar KTP Anda (format: JPG, JPEG, PNG).</div>
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
