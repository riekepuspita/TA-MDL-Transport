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

                    {{-- 
                    @foreach ($data as $penyewa)
                        <h4>{{ $penyewa->pemesanan }}</h4>
                        @foreach ($penyewa->pemesanan as $pesanan)
                            <h5> {{ $pesanan->tujuan }}</h5>
                        @endforeach
                    @endforeach 
                    --}}

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

                                        <table class="table mb-12">
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
                                                @foreach ($data as $index => $penyewa)
                                                    @foreach ($penyewa->pemesanan as $pesanan)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $penyewa->noNIK }}</td>
                                                            <td>{{ $penyewa->namaLengkap }}</td>
                                                            <td>{{ $penyewa->noHP }}</td>
                                                            <td>{{ $penyewa->created_at->format('d-m-Y') }}</td>

                                                            <td>
                                                                {{-- Button Edit Modal --}}
                                                                <a href="" title="Edit Data"
                                                                    class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                                    data-bs-target="#editpenyewa{{ $penyewa->idPenyewa }}">
                                                                    <i class="bx bx-pencil"></i>
                                                                </a>
                                                                <button title="Hapus Data" class="btn btn-danger btn-sm"
                                                                    onclick="confirmDelete('{{ $penyewa->idPenyewa }}')">
                                                                    <i class="bx bx-trash"></i>
                                                                </button>

                                                                {{-- Start Modal Edit --}}
                                                                <div class="modal fade"
                                                                    id="editpenyewa{{ $penyewa->idPenyewa }}" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Edit Data Penyewa
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    {{-- <span aria-hidden="true">&times;</span> --}}
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <!-- Form edit data -->
                                                                                <form action="{{ route('updatepenyewa', $penyewa->idPenyewa) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <div class="form-group">
                                                                                        <label for="noNIK">NIK</label>
                                                                                        <input type="text" name="noNIK"
                                                                                            class="form-control"
                                                                                            id="noNIK"
                                                                                            value="{{ $penyewa->noNIK }}"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="namaLengkap">Nama
                                                                                            Lengkap</label>
                                                                                        <input type="text"
                                                                                            name="namaLengkap"
                                                                                            class="form-control"
                                                                                            id="namaLengkap"
                                                                                            value="{{ $penyewa->namaLengkap }}"
                                                                                            required>
                                                                                    </div>

                                                                                    <div class="mb-3">
                                                                                        <label for="jeniskelamin"
                                                                                            class="col-form-label">Jenis
                                                                                            Kelamin</label>
                                                                                        <select class="form-select"
                                                                                            id="jeniskelamin"
                                                                                            name="jeniskelamin" required>
                                                                                            <option value="1"
                                                                                                {{ $penyewa->jeniskelamin == 'lakilaki' ? 'selected' : '' }}>
                                                                                                Laki-laki</option>
                                                                                            <option value="2"
                                                                                                {{ $penyewa->jeniskelamin == 'perempuan' ? 'selected' : '' }}>
                                                                                                Perempuan</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label for="alamat">Alamat</label>
                                                                                        <input type="text" name="alamat"
                                                                                            class="form-control"
                                                                                            id="alamat"
                                                                                            value="{{ $penyewa->alamat }}"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="noHP">No HP</label>
                                                                                        <input type="tel" name="noHP"
                                                                                            class="form-control"
                                                                                            id="noHP"
                                                                                            value="{{ $penyewa->noHP }}"
                                                                                            required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="created_at">Hari /
                                                                                            Tanggal</label>
                                                                                        <input type="date"
                                                                                            name="created_at"
                                                                                            class="form-control"
                                                                                            id="created_at"
                                                                                            value="{{ $penyewa->created_at->format('Y-m-d') }}"
                                                                                            required>
                                                                                    </div>


                                                                                    <div class="form-group">
                                                                                        <label for="mobil_noPolisi">Pilih Mobil</label>
                                                                                        <select name="mobil_noPolisi" class="form-select" id="mobil_noPolisi">
                                                                                            <option value="" disabled>-- Pilih Mobil --</option>
                                                                                            @foreach ($mobil as $dataMobil)
                                                                                                <option value="{{ $dataMobil->noPolisi }}" {{ $pesanan->mobil_noPolisi == $dataMobil->noPolisi ? 'selected' : '' }}>
                                                                                                    {{ $dataMobil->noPolisi }} - {{ $dataMobil->merekMobil }} {{ $dataMobil->modelMobil }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    {{-- <div class="form-group">
                                                                                        <label for="mobil_noPolisi">Pilih
                                                                                            Mobil</label>
                                                                                        <select name="mobil_noPolisi"
                                                                                            class="form-select"
                                                                                            id="mobil_noPolisi">
                                                                                            <option value="" selected
                                                                                                disabled hidden>
                                                                                                {{ $pesanan->mobil->noPolisi }}
                                                                                                -
                                                                                                {{ $pesanan->mobil->merekMobil }}
                                                                                                {{ $pesanan->mobil->modelMobil }}
                                                                                            </option>
                                                                                            @foreach ($mobil as $dataMobil)
                                                                                                <option
                                                                                                    value="{{ $dataMobil->noPolisi }}">
                                                                                                    {{ $dataMobil->noPolisi }}
                                                                                                    -
                                                                                                    {{ $dataMobil->merekMobil }}
                                                                                                    {{ $dataMobil->modelMobil }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div> --}}

                                                                                    <div class="mb-3 row">
                                                                                        <label for="tanggalMulai"
                                                                                            class="col-form-label">Tanggal
                                                                                            Mulai</label>
                                                                                        <input class="form-control"
                                                                                            name="tanggalMulai"
                                                                                            type="date"
                                                                                            id="tanggalMulai"
                                                                                            placeholder="Masukkan Tanggal Mulai"
                                                                                            value="{{ $pesanan->tanggalMulai }}">
                                                                                    </div>

                                                                                    <div class="mb-3 row">
                                                                                        <label for="tanggalSelesai"
                                                                                            class="col-form-label">Tanggal
                                                                                            Selesai</label>
                                                                                        <input class="form-control"
                                                                                            name="tanggalSelesai"
                                                                                            type="date"
                                                                                            id="tanggalSelesai"
                                                                                            placeholder="Masukkan Tanggal Selesai"
                                                                                            value="{{ $pesanan->tanggalSelesai }}">
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="tujuan"
                                                                                            class="col-form-label">Tujuan</label>
                                                                                        <input class="form-control"
                                                                                            name="tujuan" type="text"
                                                                                            value="{{ $pesanan->tujuan }}"
                                                                                            id="tujuan"
                                                                                            placeholder="Masukkan Tujuan Penyewa">
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="keberangkatan"
                                                                                            class="col-form-label">Keberangkatan</label>
                                                                                        <input class="form-control"
                                                                                            name="keberangkatan"
                                                                                            type="datetime-local"
                                                                                            value="{{ $pesanan->keberangkatan }}"
                                                                                            id="keberangkatan"
                                                                                            placeholder="Masukkan Keberangkatan">
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
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"required>
                        </div>
                        <div class="mb-3">
                            <label for="noHP" class="col-form-label">Hari / Tanggal</label>
                            <input type="date" class="form-control" id="created_at" name="created_at" required>
                        </div>

                        <div class="form-group">
                            <label for="mobil_noPolisi">Pilih Mobil</label>
                            <select name="mobil_noPolisi" class="form-select" id="mobil_noPolisi">
                                <option value="" selected disabled hidden>-- Pilih Mobil --</option>
                                @foreach ($mobil as $mobil)
                                    <option value="{{ $mobil->noPolisi }}">
                                        {{ $mobil->noPolisi }} - {{ $mobil->merekMobil }} {{ $mobil->modelMobil }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 row">
                            <label for="tanggalMulai" class="col-form-label">Tanggal Mulai</label>
                            <input class="form-control" name="tanggalMulai" type="date" id="tanggalMulai"
                                placeholder="Masukkan Tanggal Mulai">
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalSelesai" class="col-form-label">Tanggal Selesai</label>
                            <input class="form-control" name="tanggalSelesai" type="date" id="tanggalSelesai"
                                placeholder="Masukkan Tanggal Selesai">
                        </div>
                        <div class="mb-3 row">
                            <label for="tujuan" class="col-form-label">Tujuan</label>
                            <input class="form-control" name="tujuan" type="text" value="" id="tujuan"
                                placeholder="Masukkan Tujuan Penyewa">
                        </div>
                        <div class="mb-3 row">
                            <label for="keberangkatan" class="col-form-label">Keberangkatan</label>
                            <input class="form-control" name="keberangkatan" type="datetime-local" value=""
                                id="keberangkatan" placeholder="Masukkan Keberangkatan">
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
