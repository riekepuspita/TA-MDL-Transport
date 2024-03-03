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

                    <div class="row bg-white rounded-3 pb-3 mb-3 mx-2">
                        <div class="container-fluid table-responsive px-3 py-3">
                            <table id="table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011-04-25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011-07-25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009-01-12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012-03-29</td>
                                        <td>$433,060</td>
                                    
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                            </table>

                            {{-- <table id="table" class="table table-striped" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>No</th>
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
                                        <td>1</td>
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
                                </tbody>
                            </table> --}}

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

