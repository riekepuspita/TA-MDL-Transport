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
                                <a href="/tambahuser" type="button" class="btn btn-success">Tambah User</a>
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
                                                            <a href="/deleteuser/{{ $row->idUser }}" title="Hapus Data"
                                                                class="btn btn-danger btn-sm" data-id={{ $row->idUser }}>
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
        </div>
    </div>
    @include('layout.footer')
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    // Saat dokumen siap
    $(document).ready(function() {
        // Event click pada tombol delete
        $('.delete-btn').click(function() {
            // Ambil id atau data lain yang diperlukan
            var idUser = $(this).data('idUser');

            // Tampilkan SweetAlert2 untuk konfirmasi
            Swal.fire({
                title: 'Konfirmasi',
                text: "Anda yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                // Jika pengguna menekan tombol Ya
                if (result.isConfirmed) {
                    // Lakukan tindakan penghapusan, seperti mengarahkan pengguna ke rute delete
                    window.location = '/data/delete/' + idUser; // Misalnya, rute delete/id
                }
            });
        });
    });
</script>

@endsection
