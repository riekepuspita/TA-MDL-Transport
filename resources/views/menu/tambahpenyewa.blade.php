@extends('layout.app')

@section('title')
    Tambah Penyewa
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
                                <h4 class="mb-0">Tambah Penyewa</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Data Penyewa</a></li>
                                        <li class="breadcrumb-item active">Tambah Penyewa</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/insertpenyewa" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">NIK</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="noNIK" type="number" value="" id="noNIK"
                                                    placeholder="Masukkan NIK">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="username" type="text" value="" id="username"
                                                    placeholder="Masukkan Nama Penyewa">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-url-input" class="col-md-2 col-form-label">Alamat</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="alamat" type="text" value="" id="alamat"
                                                    placeholder="Masukkan Alamat Penyewa">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">No HP</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="noHP" type="tel" value="" id="noHP"
                                                    placeholder="Masukkan No HP Penyewa">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="email" type="email" value="" id="email"
                                                    placeholder="Masukkan Email Penyewa">
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3 row">
                                        <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="password" value="hunter2" id="password">
                                        </div>
                                    
                                        <div class="mb-3 row">
                                            <label for="example-number-input" class="col-md-2 col-form-label">Number</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="number" value="42" id="example-number-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-datetime-local-input" class="col-md-2 col-form-label">Date and time</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-month-input" class="col-md-2 col-form-label">Month</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="month" value="2019-08" id="example-month-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-week-input" class="col-md-2 col-form-label">Week</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="week" value="2019-W33" id="example-week-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-time-input" class="col-md-2 col-form-label">Time</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-color-input" class="col-md-2 col-form-label">Color picker</label>
                                            <div class="col-md-10">
                                        <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#3980c0" title="Choose your color">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-md-2 col-form-label">Select</label>
                                            <div class="col-md-10">
                                                <select class="form-select">
                                                    <option>Select</option>
                                                    <option>Large select</option>
                                                    <option>Small select</option>
                                                </select>
                                            </div>
                                        </div>
                        
                                        <div class="row">
                                            <label for="exampleDataList" class="col-md-2 col-form-label">Datalist</label>
                                            <div class="col-md-10">
                                                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                                <datalist id="datalistOptions">
                                                    <option value="San Francisco">
                                                    <option value="New York">
                                                    <option value="Seattle">
                                                    <option value="Los Angeles">
                                                    <option value="Chicago">
                                                </datalist>
                                            </div>
                                        </div> --}}
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-3">Simpan</button>

                                            <a href="/datapenyewa" class="btn btn-danger me-3">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    <!-- end row -->
                </div>
            </div>
            @include('layout.footer')
        </div>
    </div>
@endsection
