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
                                <a href="/tambahpenyewa" type="button" class="btn btn-success">Tambah Penyewa</a>
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
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    {{-- <th>Email</th> --}}
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $row )
                                                <tr>
                                                    <th scope="row">{{ $no++ }}</th>
                                                    <td>{{ $row->noNIK }}</td>
                                                    <td>{{ $row->namaLengkap }}</td>
                                                    <td>{{ $row->alamat }}</td>
                                                    <td>{{ $row->noHP }}</td>
                                                    {{-- <td>{{ $row->email }}</td> --}}
                                                    {{-- <td>{{ $row->password }}</td> --}}
                                                    <td>
                                                        <a href="/tampilkanpenyewa/{{ $row->idPenyewa }}" title="Edit Data" class="btn btn-warning btn-sm">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
                                                        <a href="/delete/{{ $row->idPenyewa }}" title="Hapus Data" class="btn btn-danger btn-sm">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <a href="" title="Lihat Data" class="btn btn-primary btn-sm">
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
        </div>
    </div>
    @include('layout.footer')
@endsection

@section('script')
    <script>
        // new DataTable('#example');
        // $(document).ready(function() {
        //     $('.table').DataTable({
        //         columnDefs: [{
        //             orderable: false,
        //             targets: [6]
        //         }],
        //         language: {
        //             lengthMenu: "Tampilkan MENU data per halaman",
        //             zeroRecords: "Data tidak ditemukan.",
        //             info: "Menampilkan START - END dari TOTAL data",
        //             infoEmpty: "Menampilkan 0 - 0 dari 0 data",
        //             infoFiltered: "(difilter dari MAX total data)",
        //             search: "Cari :",
        //             decimal: ",",
        //             thousands: ".",
        //             paginate: {
        //                 previous: "Sebelumnya",
        //                 next: "Selanjutnya"
        //             }
        //         }
        //     });
        // });

    
    </script>
@endsection

