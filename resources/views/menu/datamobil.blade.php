@extends('layout.app')

@section('title')
    Data Mobil
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
                                <h4 class="mb-0">Data Mobil</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Data Mobil</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            {{-- <div style="display: flex; justify-content: flex-end; margin-right: 30px; margin-bottom: 15px;">
                                <a href="/tambahmobil" type="button" class="btn btn-success">Tambah Mobil</a>
                            </div> --}}
                            <div style="display: flex; justify-content: flex-end; margin-right: 30px; margin-bottom: 15px;">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmobil">Tambah
                                    Mobil</button>
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
                                                    <th>No Polisi</th>
                                                    <th>Gambar Mobil</th>
                                                    <th>Merk Mobil</th>
                                                    <th>Model Mobil</th>
                                                    {{-- <th>Deskripsi Mobil</th> --}}
                                                    <th>Harga Mobil</th>
                                                    <th>Status</th>
                                                    {{-- <th>Gambar Mobil</th> --}}
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $row)
                                                    <tr>
                                                        {{-- <th scope="row">{{ $row->noPolisi }}</th> --}}
                                                        <th>{{ $row->noPolisi }}</th>
                                                        <td>
                                                            <img src="{{ asset('gambarMobil/' . $row->gambarMobil) }}"
                                                                alt="" style="width: 70px;">
                                                        </td>
                                                        <td>{{ $row->merekMobil }}</td>
                                                        <td>{{ $row->modelMobil }}</td>
                                                        {{-- <td>{{ $row->deskripsiMobil }}</td> --}}
                                                        <td>{{ $row->hargaSewa }}</td>
                                                        {{-- <td>{{ $row->statusMobil }}</td> --}}
                                                        <td>
                                                            @if ($row->statusMobil == 'tersedia')
                                                                Tersedia
                                                            @elseif ($row->statusMobil == 'tidak tersedia')
                                                                Tidak Tersedia
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <a href="/tampilkanmobil/{{ $row->noPolisi }}" title="Edit Data"
                                                                class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                                data-bs-target="#editmobil{{ $row->noPolisi }}">
                                                                <i class="bx bx-pencil"></i>
                                                            </a>

                                                            <div class="modal fade" id="editmobil{{ $row->noPolisi }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Tambah Mobil</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <form
                                                                            action="{{ route('updatemobil', $row->noPolisi) }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="noPolisi"
                                                                                        class="col-form-label">No
                                                                                        Polisi</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="noPolisi"
                                                                                        name="noPolisi" required
                                                                                        value="{{ $row->noPolisi }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="merekMobil"
                                                                                        class="col-form-label">Merek
                                                                                        Mobil</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="merekMobil"
                                                                                        name="merekMobil" required
                                                                                        value="{{ $row->merekMobil }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="modelMobil"
                                                                                        class="col-form-label">Model Mobil
                                                                                    </label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="modelMobil"
                                                                                        name="modelMobil" required
                                                                                        value="{{ $row->modelMobil }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="kapasitasMobil"
                                                                                        class="col-form-label">Kapasitas
                                                                                        Mobil</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="kapasitasMobil"
                                                                                        name="kapasitasMobil" required
                                                                                        value="{{ $row->kapasitasMobil }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="tahunMobil"
                                                                                        class="col-form-label">Tahun
                                                                                        Mobil</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="tahunMobil"
                                                                                        name="tahunMobil" required
                                                                                        value="{{ $row->tahunMobil }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="deskripsiMobil"
                                                                                        class="col-form-label">Deskripsi
                                                                                        Mobil</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="deskripsiMobil"
                                                                                        name="deskripsiMobil" required
                                                                                        value="{{ $row->deskripsiMobil }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="hargaSewa"
                                                                                        class="col-form-label">Harga
                                                                                        Sewa</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="hargaSewa" name="hargaSewa"
                                                                                        required
                                                                                        value="{{ $row->hargaSewa }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="statusMobil"
                                                                                        class="col-form-label">Status
                                                                                        Mobil</label>
                                                                                    <select class="form-select"
                                                                                        id="statusMobil"
                                                                                        name="statusMobil" required>
                                                                                        <option value="" selected
                                                                                            disabled hidden>
                                                                                            -- Pilih Status Mobil--</option>
                                                                                        <option value="1"
                                                                                            {{ $row->statusMobil == 'tersedia' ? 'selected' : '' }}>
                                                                                            Tersedia
                                                                                        </option>
                                                                                        <option value="2"
                                                                                            {{ $row->statusMobil == 'tidak tersedia' ? 'selected' : '' }}>
                                                                                            Tidak
                                                                                            Tersedia</option>
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="gambarMobil"
                                                                                        class="col-form-label">Gambar
                                                                                        Mobil</label>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="gambarMobil"
                                                                                        name="gambarMobil"
                                                                                        accept=".jpg, .jpeg, .png"
                                                                                        >
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                    <button type="submit"
                                                                                    class="btn btn-primary">Simpan Perubahan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <a href="/deletemobil/{{ $row->noPolisi }}"
                                                                title="Hapus Data" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete('{{ $row->noPolisi }}')">
                                                                <i class="bx bx-trash"></i>
                                                            </a>
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
            @include('layout.footer')
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="tambahmobil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/insertmobil" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="noPolisi" class="col-form-label">No Polisi</label>
                            <input type="text" class="form-control" id="noPolisi" name="noPolisi" required>
                        </div>
                        <div class="mb-3">
                            <label for="merekMobil" class="col-form-label">Merek Mobil</label>
                            <input type="text" class="form-control" id="merekMobil" name="merekMobil" required>
                        </div>
                        <div class="mb-3">
                            <label for="modelMobil" class="col-form-label">Model Mobil </label>
                            <input type="text" class="form-control" id="modelMobil" name="modelMobil" required>
                        </div>
                        <div class="mb-3">
                            <label for="kapasitasMobil" class="col-form-label">Kapasitas Mobil</label>
                            <input type="text" class="form-control" id="kapasitasMobil" name="kapasitasMobil"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tahunMobil" class="col-form-label">Tahun Mobil</label>
                            <input type="text" class="form-control" id="tahunMobil" name="tahunMobil" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsiMobil" class="col-form-label">Deskripsi Mobil</label>
                            <input type="text" class="form-control" id="deskripsiMobil" name="deskripsiMobil"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="hargaSewa" class="col-form-label">Harga Sewa</label>
                            <input type="text" class="form-control" id="hargaSewa" name="hargaSewa" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="statusMobil" class="col-form-label">Status Mobil</label>
                            <select class="form-select" id="statusMobil" name="statusMobil" required>
                                <option value="" selected disabled hidden>
                                    -- Pilih Status Mobil--</option>
                                <option value="1">Tersedia</option>
                                <option value="2">Tidak Tersedia</option>
                                </option>
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label for="statusMobil" class="col-form-label">StatusMobil</label>
                            <select class="form-select" id="jeniskelamin" name="jeniskelamin" required>
                                <option value="1" {{ $row->statusMobil == 'tersedia' ? 'selected' : '' }}>
                                    Tersedia</option>
                                <option value="2" {{ $row->statusMobil == 'tidak tersedia' ? 'selected' : '' }}>
                                    Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambarMobil" class="col-form-label">Gambar Mobil</label>
                            <input type="file" class="form-control" id="gambarMobil" name="gambarMobil"
                                accept=".jpg, .jpeg, .png" required>
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
        function confirmDelete(noPolisi) {
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
                    window.location.href = "/deletemobil/" + noPolisi;
                }
            });

            // Mencegah tindakan default dari tombol
            event.preventDefault();
        }
    </script>
@endsection
