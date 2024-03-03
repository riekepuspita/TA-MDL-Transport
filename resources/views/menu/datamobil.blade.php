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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
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
                                <a href="#" type="button" class="btn btn-success">Tambah Mobil</a>
                            </div>                     
                            <div class="card">
                                <div class="card-body">  
                                    <div class="table-responsive">
                                        <table class="table mb-12"> <!-- table mb-0-->
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1345679934735</td>
                                                    <td>Samid</td>
                                                    <td>Bandung</td>
                                                    <td>083456278345</td>
                                                    <td>samid@gmail.com</td>
                                                    <td>
                                                        <a href="" title="Edit Data" class="btn btn-warning btn-sm">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
                                                        <a href="" title="Hapus Data" class="btn btn-danger btn-sm">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <a href="" title="Lihat Data" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6754367543890654</td>
                                                    <td>Raka</td>
                                                    <td>Surabaya</td>
                                                    <td>085467538745</td>
                                                    <td>raka@gmail.com</td>
                                                    <td>
                                                        <a href="" title="Edit Data" class="btn btn-warning btn-sm">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
                                                        <a href="" title="Hapus Data" class="btn btn-danger btn-sm">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <a href="" title="Lihat Data" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4653687498478356</td>
                                                    <td>Yuda</td>
                                                    <td>Madiun</td>
                                                    <td>083456278345</td>
                                                    <td>yuda@gmail.com</td>
                                                    <td>
                                                        <a href="" title="Edit Data" class="btn btn-warning btn-sm">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
                                                        <a href="" title="Hapus Data" class="btn btn-danger btn-sm">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <a href="" title="Lihat Data" class="btn btn-primary btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
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
