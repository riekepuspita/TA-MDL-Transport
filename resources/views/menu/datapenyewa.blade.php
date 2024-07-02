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
                    <div style="display: flex; justify-content: flex-end; margin-right: 30px; margin-bottom: 15px;">
                        <form id="filterForm">
                            <label for="month">Bulan:</label>
                            <select name="month" id="month">
                                <option value="">Pilih Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                @endfor
                            </select>
                            <label for="year">Tahun:</label>
                            <select name="year" id="year">
                                <option value="">Pilih Tahun</option>
                                @for ($i = date('Y'); $i >= 1900; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="display: flex; justify-content: flex-end; margin-right: 30px; margin-bottom: 15px;">
                                {{-- <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#tambahPenyewa">Tambah
                                    Penyewa</button> --}}
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
                                                    {{-- <th>Hari dan Tanggal</th> --}}
                                                    <th>Tanggal Mulai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($penyewa as $row)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{ $row->noNIK }}</td>

                                                        @if ($row->user)
                                                            <td>{{ $row->user->namaUser }}</td>
                                                        @endif

                                                        <td>{{ $row->noHP }}</td>
                                                        {{-- <td>{{ $row->created_at->format('d F Y') }}</td> --}}
                                                        <td>{{ optional($dataPemesanan[$row->idPenyewa]->first())->tanggalMulai }}
                                                            {{-- </div> --}}
                                                        </td>
                                                        <td>
                                                            {{-- Button Edit Modal --}}
                                                            <a href="" title="Edit Data"
                                                                class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#editpenyewa{{ $row->idPenyewa }}">
                                                                <i class="bx bx-pencil"></i>
                                                            </a>
                                                            <button title="Hapus Data" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete('{{ $row->idPenyewa }}')">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                            {{-- Start Modal Edit --}}
                                                            <div class="modal fade" id="editpenyewa{{ $row->idPenyewa }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Edit Data Penyewa
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                                {{-- <span aria-hidden="true">&times;</span> --}}
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- Form edit data -->
                                                                            <form
                                                                                action="{{ route('updatepenyewa', $row->idPenyewa) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <label for="noNIK">NIK</label>
                                                                                    <input type="text" name="noNIK"
                                                                                        class="form-control" id="noNIK"
                                                                                        value="{{ $row->noNIK }}"
                                                                                        required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="namaLengkap">Nama
                                                                                        Lengkap</label>
                                                                                    <input type="text" name="namaLengkap"
                                                                                        class="form-control"
                                                                                        id="namaLengkap"
                                                                                        value="@if ($row->user) {{ $row->user->namaUser }} @endif"
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
                                                                                            {{ $row->jeniskelamin == 'lakilaki' ? 'selected' : '' }}>
                                                                                            Laki-laki</option>
                                                                                        <option value="2"
                                                                                            {{ $row->jeniskelamin == 'perempuan' ? 'selected' : '' }}>
                                                                                            Perempuan</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="alamat">Alamat</label>
                                                                                    <input type="text" name="alamat"
                                                                                        class="form-control" id="alamat"
                                                                                        value="{{ $row->alamat }}"
                                                                                        required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="noHP">No HP</label>
                                                                                    <input type="tel" name="noHP"
                                                                                        class="form-control" id="noHP"
                                                                                        value="{{ $row->noHP }}"
                                                                                        required>
                                                                                </div>
                                                                                {{-- <div class="form-group">
                                                                                    <label for="created_at">Hari /
                                                                                        Tanggal</label>
                                                                                    <input type="date"
                                                                                        name="created_at"
                                                                                        class="form-control"
                                                                                        id="created_at"
                                                                                        value="{{ $row->created_at->format('Y-m-d') }}"
                                                                                        required>
                                                                                </div> --}}
                                                                                <div class="form-group">
                                                                                    <label for="mobil_noPolisi">Pilih
                                                                                        Mobil</label>
                                                                                    <select name="mobil_noPolisi"
                                                                                        class="form-select"
                                                                                        id="mobil_noPolisi">
                                                                                        <!-- Gunakan PHP untuk menentukan opsi mobil -->
                                                                                        @foreach ($mobil as $mobilItem)
                                                                                            @php
                                                                                                $selected = '';
                                                                                                foreach (
                                                                                                    $dataPemesanan
                                                                                                    as $idPenyewa =>
                                                                                                        $pemesanans
                                                                                                ) {
                                                                                                    foreach (
                                                                                                        $pemesanans
                                                                                                        as $pemesanan
                                                                                                    ) {
                                                                                                        if (
                                                                                                            $pemesanan->penyewa_idPenyewa ==
                                                                                                                $row->idPenyewa &&
                                                                                                            $pemesanan->mobil_noPolisi ==
                                                                                                                $mobilItem->noPolisi
                                                                                                        ) {
                                                                                                            $selected =
                                                                                                                'selected';
                                                                                                            break 2; // Keluar dari kedua loop foreach
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            @endphp
                                                                                            <option
                                                                                                value="{{ $mobilItem->noPolisi }}"
                                                                                                {{ $selected }}>
                                                                                                {{ $mobilItem->noPolisi }}
                                                                                                -
                                                                                                {{ $mobilItem->merekMobil }}
                                                                                                {{ $mobilItem->modelMobil }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label for="tanggalMulai"
                                                                                        class="col-form-label">Tanggal
                                                                                        Mulai</label>
                                                                                    <input class="form-control"
                                                                                        name="tanggalMulai" type="date"
                                                                                        id="tanggalMulai"
                                                                                        placeholder="Masukkan Tanggal Mulai"
                                                                                        required
                                                                                        value="{{ optional($dataPemesanan[$row->idPenyewa]->first())->tanggalMulai }}">
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label for="tanggalSelesai"
                                                                                        class="col-form-label">Tanggal
                                                                                        Selesai</label>
                                                                                    <input class="form-control"
                                                                                        name="tanggalSelesai"
                                                                                        type="date" id="tanggalSelesai"
                                                                                        placeholder="Masukkan Tanggal Selesai"
                                                                                        required
                                                                                        value="{{ optional($dataPemesanan[$row->idPenyewa]->first())->tanggalSelesai }}">
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label for="tujuan"
                                                                                        class="col-form-label">Tujuan</label>
                                                                                    <input class="form-control"
                                                                                        name="tujuan" type="text"
                                                                                        id="tujuan" required
                                                                                        value="{{ optional($dataPemesanan[$row->idPenyewa]->first())->tujuan }}">
                                                                                </div>
                                                                                <div class="mb-3 row">
                                                                                    <label for="keberangkatan"
                                                                                        class="col-form-label">Keberangkatan</label>
                                                                                    <input class="form-control"
                                                                                        name="keberangkatan"
                                                                                        type="datetime-local"
                                                                                        id="keberangkatan"
                                                                                        placeholder="Masukkan Keberangkatan"
                                                                                        value="{{ optional($dataPemesanan[$row->idPenyewa]->first())->keberangkatan }}">
                                                                                </div>
                                                                                @foreach ($row->pembayaran as $pembayaran)
                                                                                    <div class="mb-3 row">
                                                                                        <label for="tanggalPembayaran"
                                                                                            class="col-form-label">Tanggal
                                                                                            Pembayaran</label>
                                                                                        <input class="form-control"
                                                                                            name="tanggalPembayaran"
                                                                                            type="datetime-local"
                                                                                            value="{{ $pembayaran->tanggalPembayaran }}"
                                                                                            id="tanggalPembayaran"
                                                                                            placeholder="Masukkan Tanggal Pembayaran">
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="totalPembayaran"
                                                                                            class="col-form-label">Total
                                                                                            Pembayaran</label>
                                                                                        <input class="form-control"
                                                                                            name="totalPembayaran[]"
                                                                                            type="text"
                                                                                            value="{{ $pembayaran->totalPembayaran }}"
                                                                                            id="totalPembayaran"
                                                                                            placeholder="">
                                                                                    </div>
                                                                                    <div class="mb-3 row">
                                                                                        <label for="statusPembayaran"
                                                                                            class="col-form-label">Status
                                                                                            Pembayaran</label>
                                                                                        <input class="form-control"
                                                                                            name="statusPembayaran[]"
                                                                                            type="text"
                                                                                            value="{{ $pembayaran->statusPembayaran }}"
                                                                                            id="statusPembayaran"
                                                                                            placeholder="">
                                                                                    </div>
                                                                                @endforeach
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

{{-- @section('modal')
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
@endsection --}}

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filterForm').on('submit', function(e) {
                e.preventDefault();

                var month = $('#month').val();
                var year = $('#year').val();

                $.ajax({
                    url: "{{ route('filterpenyewa') }}",
                    method: 'GET',
                    data: {
                        month: month,
                        year: year,
                    },
                    success: function(response) {
                        var tbody = $('table tbody');
                        tbody.empty();

                        $.each(response, function(index, penyewa) {
                            var pemesanan = penyewa.pemesanan[0] || {};
                            var tanggalMulai = pemesanan.tanggalMulai || '';
                            var modalId = `editpenyewa${penyewa.idPenyewa}`;
                            var row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${penyewa.noNIK}</td>
                    <td>${penyewa.user ? penyewa.user.namaUser : ''}</td>
                    <td>${penyewa.noHP}</td>
                    <td>${tanggalMulai}</td>
                    <td> 
                        <a href="#" title="Edit Data" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#${modalId}">
                        <i class="bx bx-pencil"></i></a>
                        <div class="modal fade" id="${modalId}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Penyewa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="updateForm${penyewa.idPenyewa}" action="http://localhost:8000/updatepenyewa/${penyewa.idPenyewa}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="noNIK">NIK</label>
                                                <input type="text" name="noNIK" class="form-control" id="noNIK${penyewa.idPenyewa}" value="${penyewa.noNIK}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="namaLengkap">Nama Lengkap</label>
                                                <input type="text" name="namaLengkap" class="form-control" id="namaLengkap${penyewa.idPenyewa}" value="${penyewa.user ? penyewa.user.namaUser : ''}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jeniskelamin" class="col-form-label">Jenis Kelamin</label>
                                                <select class="form-select" id="jeniskelamin${penyewa.idPenyewa}" name="jeniskelamin" required>
                                                    <option value="1" ${penyewa.jeniskelamin == 'lakilaki' ? 'selected' : ''}>Laki-laki</option>
                                                    <option value="2" ${penyewa.jeniskelamin == 'perempuan' ? 'selected' : ''}>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" id="alamat${penyewa.idPenyewa}" value="${penyewa.alamat}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="noHP">No HP</label>
                                                <input type="tel" name="noHP" class="form-control" id="noHP${penyewa.idPenyewa}" value="${penyewa.noHP}" required>
                                            </div>
                                            <!--<div class="form-group">
                                                <label for="created_at">Hari / Tanggal</label>
                                                <input type="text" name="created_at" class="form-control" id="created_at${penyewa.idPenyewa}" value="${moment(penyewa.created_at).format('DD/MM/YYYY')}" readonly disabled required>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="mobil_noPolisi">Pilih Mobil</label>
                                                <select name="mobil_noPolisi" class="form-select" id="mobil_noPolisi${penyewa.idPenyewa}">
                                                    @foreach ($mobil as $mobilItem)
                                                    <option value="{{ $mobilItem->noPolisi }}" ${pemesanan.mobil_noPolisi === '{{ $mobilItem->noPolisi }}' ? 'selected' : ''}>
                                                        {{ $mobilItem->noPolisi }} - {{ $mobilItem->merekMobil }} {{ $mobilItem->modelMobil }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="tanggalMulai" class="col-form-label">Tanggal Mulai</label>
                                                <input class="form-control" name="tanggalMulai" type="date" id="tanggalMulai${penyewa.idPenyewa}" placeholder="Masukkan Tanggal Mulai" required value="${pemesanan.tanggalMulai}">
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="tanggalSelesai" class="col-form-label">Tanggal Selesai</label>
                                                <input class="form-control" name="tanggalSelesai" type="date" id="tanggalSelesai${penyewa.idPenyewa}" placeholder="Masukkan Tanggal Selesai" required value="${pemesanan.tanggalSelesai}">
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="tujuan" class="col-form-label">Tujuan</label>
                                                <input class="form-control" name="tujuan" type="text" id="tujuan${penyewa.idPenyewa}" required value="${pemesanan.tujuan}">
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="keberangkatan" class="col-form-label">Keberangkatan</label>
                                                <input class="form-control" name="keberangkatan" type="datetime-local" id="keberangkatan${penyewa.idPenyewa}" placeholder="Masukkan Keberangkatan" value="${moment(pemesanan.keberangkatan).format('YYYY-MM-DDTHH:mm')}">
                                            </div>
                                            ${penyewa.pembayaran.map(pembayaran => `
                                                        <div class="mb-3 row">
                                                            <label for="tanggalPembayaran" class="col-form-label">Tanggal Pembayaran</label>
                                                            <input class="form-control" name="tanggalPembayaran" type="datetime-local" value="${moment(pembayaran.tanggalPembayaran).format('YYYY-MM-DDTHH:mm')}" id="tanggalPembayaran${penyewa.idPenyewa}" placeholder="Masukkan Tanggal Pembayaran">
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="totalPembayaran" class="col-form-label">Total Pembayaran</label>
                                                            <input class="form-control" name="totalPembayaran[]" type="text" value="${pembayaran.totalPembayaran}" id="totalPembayaran${penyewa.idPenyewa}" placeholder="">
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="statusPembayaran" class="col-form-label">Status Pembayaran</label>
                                                            <input class="form-control" name="statusPembayaran[]" type="text" value="${pembayaran.statusPembayaran}" id="statusPembayaran${penyewa.idPenyewa}" placeholder="">
                                                        </div>
                                                        `).join('')}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete('${penyewa.idPenyewa}')">Hapus</button>
                    </td>
                </tr>
                `;
                            tbody.append(row);

                            // Attach submit event to the dynamically created form
                            $(`#updateForm${penyewa.idPenyewa}`).on('submit', function(
                                e) {
                                e.preventDefault();

                                var form = $(this);
                                var actionUrl = form.attr('action');
                                var formData = form.serialize();

                                $.ajax({
                                    url: actionUrl,
                                    method: 'POST',
                                    data: formData,
                                    success: function(response) {
                                        location.reload();
                                        $('#' + modalId).modal(
                                            'hide');
                                        // Optionally, refresh the table data here
                                    },
                                    error: function(xhr) {
                                        console.log(xhr
                                            .responseText
                                            ); // Display server error messages
                                        alert(
                                            'Terjadi kesalahan, silakan coba lagi.'
                                            );
                                    }
                                });
                            });
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            // Fungsi untuk menangani aksi klik tombol "Edit"
            $(document).on('click', '.edit-btn', function() {
                var idPenyewa = $(this).data('idPenyewa');
                $('#editpenyewa' + idPenyewa).modal('show');
            });
        });
    </script>
@endsection
