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
                            <div style="display: flex; justify-content: flex-end; margin-right: 30px; margin-bottom: 15px;">
                                <a href="/tambahmobil" type="button" class="btn btn-success">Tambah Mobil</a>
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
                                                            <img src="{{ asset('gambarMobil/'.$row->gambarMobil) }}" alt="" style="width: 70px;">
                                                        </td>
                                                        <td>{{ $row->merekMobil }}</td>
                                                        <td>{{ $row->modelMobil }}</td>
                                                        {{-- <td>{{ $row->deskripsiMobil }}</td> --}}
                                                        <td>{{ $row->hargaSewa }}</td>
                                                        <td>{{ $row->statusMobil }}</td>
                                                        <td>
                                                            <a href="/tampilkanmobil/{{ $row->noPolisi }}" title="Edit Data"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="bx bx-pencil"></i>
                                                            </a>
                                                            <a href="/deletemobil/{{ $row->noPolisi }}" title="Hapus Data"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="bx bx-trash"></i>
                                                            </a>
                                                            <a href="" title="Lihat Data"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fas fa-eye"></i>
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
