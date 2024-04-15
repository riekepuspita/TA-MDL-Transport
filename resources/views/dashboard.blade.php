@extends('layout.app')

@section('title')
    Dashboard
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
                                <h4 class="mb-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Dasboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="col-xl-12">
                        <div class="row">
                            {{-- <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="avatar">
                                            <span class="avatar-title bg-primary-subtle rounded">
                                                <i class="mdi mdi-shopping-outline text-primary font-size-24"></i>
                                            </span>
                                        </div>
                                        <p class="text-muted mt-4 mb-0">Today Orders</p>
                                        <h4 class="mt-1 mb-0">3,89,658 <sup class="text-success fw-medium font-size-14"><i
                                                    class="mdi mdi-arrow-down"></i> 10%</sup></h4>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="avatar">
                                            <span class="avatar-title bg-primary-subtle rounded">
                                                <i class="mdi mdi-car-outline text-primary font-size-24"></i>
                                            </span>
                                        </div>
                                        <p class="text-muted mt-4 mb-0">Total Mobil</p>
                                        <h4 class="mt-1 mb-0">{{ $mobil }} <sup class="text-success fw-medium font-size-14"><i
                                                    class="mdi mdi-arrow-down"></i></sup></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="avatar">
                                            <span class="avatar-title bg-success-subtle rounded">
                                                <i class="mdi mdi-account-multiple-outline text-success font-size-24"></i>
                                            </span>
                                        </div>
                                        <p class="text-muted mt-4 mb-0">Total Penyewa</p>
                                        <h4 class="mt-1 mb-0">{{ $penyewa }} <sup class="text-danger fw-medium font-size-14"><i
                                                    class="mdi mdi-arrow-down"></i></sup></h4>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="avatar">
                                            <span class="avatar-title bg-success-subtle rounded">
                                                <i class="mdi mdi-account-multiple-outline text-success font-size-24"></i>
                                            </span>
                                        </div>
                                        <p class="text-muted mt-4 mb-0">Total Admin</p>
                                        <h4 class="mt-1 mb-0">{{ $penyewa }} <sup class="text-danger fw-medium font-size-14"><i
                                                    class="mdi mdi-arrow-down"></i></sup></h4>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center mb-3">
                                        <h5 class="card-title mb-0">Sales Statistics</h5>
                                        <div class="ms-auto">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-reset" href="#"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted font-size-12">Sort By:</span> <span
                                                        class="fw-medium">Weekly<i
                                                            class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton1">
                                                    <a class="dropdown-item" href="#">Monthly</a>
                                                    <a class="dropdown-item" href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-xl-8">
                                            <div>
                                                <div id="sales-statistics"
                                                    data-colors='["#eff1f3","#eff1f3","#eff1f3","#eff1f3","#33a186","#3980c0","#eff1f3","#eff1f3","#eff1f3", "#eff1f3"]'
                                                    class="apex-chart"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex">
                                                            <i class="mdi mdi-circle font-size-10 mt-1 text-primary"></i>
                                                            <div class="flex-1 ms-2">
                                                                <p class="mb-0">Product Order</p>
                                                                <h5 class="mt-1 mb-0 font-size-16">43,541.58</h5>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge text-primary bg-primary-subtle">25.4%<i
                                                                    class="mdi mdi-arrow-down ms-2"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3 border-top pt-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex">
                                                            <i class="mdi mdi-circle font-size-10 mt-1 text-primary"></i>
                                                            <div class="flex-1 ms-2">
                                                                <p class="mb-0">Product Pending</p>
                                                                <h5 class="mt-1 mb-0 font-size-16">17,351.12</h5>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge text-primary bg-primary-subtle">17.4%<i
                                                                    class="mdi mdi-arrow-down ms-2"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3 border-top pt-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex">
                                                            <i class="mdi mdi-circle font-size-10 mt-1 text-success"></i>
                                                            <div class="flex-1 ms-2">
                                                                <p class="mb-0">Product Cancelled</p>
                                                                <h5 class="mt-1 mb-0 font-size-16">32,569.74</h5>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge text-success  bg-success-subtle">16.3%<i
                                                                    class="mdi mdi-arrow-up ms-1"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3 border-top pt-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex">
                                                            <i class="mdi mdi-circle font-size-10 mt-1 text-primary"></i>
                                                            <div class="flex-1 ms-2">
                                                                <p class="mb-0">Product Delivered</p>
                                                                <h5 class="mt-1 mb-0 font-size-16">67,356.24</h5>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge text-primary bg-primary-subtle">65.7%<i
                                                                    class="mdi mdi-arrow-up ms-1"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    {{-- <div class="row">
                        <div class="col-xl-15">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center mb-3">
                                        <h1> Isi Dasboard</h1>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            @include('layout.footer')
        </div>
    </div>
@endsection
