@extends('layout.app')

@section('title')
    Tambah Mobil
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
                                <h4 class="mb-0">Tambah Mobil</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Data Mobil</a></li>
                                        <li class="breadcrumb-item active">Tambah Mobil</li>
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
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Merek Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="merekMobil" type="text" value="" id="merekmobil"
                                                    placeholder="Masukkan Merek Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Model Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="modelMobil" type="text" value="" id="modelMobil"
                                                    placeholder="Masukkan Model Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Tahun Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="tahunMobil" type="text" value="" id="tahunMobil"
                                                    placeholder="Masukkan Tahun Pembuatan Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Kapasitas Orang</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="kapasitasMobil" type="text" value="" id="kapasitasMobil"
                                                    placeholder="Masukkan Kapasitas Orang">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-url-input" class="col-md-2 col-form-label">Plat Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="platMobil" type="text" value="" id="platMobil"
                                                    placeholder="Masukkan Plat Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">Deskripsi Mobil</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="deskripsiMobil" id="deskripsiMobil" placeholder="Masukkan Deskripsi Mobil" style="height: 150px;"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Harga Sewa</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="hargaSewa" type="text" value="" id="hargaSewa"
                                                    placeholder="Masukkan Harga Sewa Mobil">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-role-input" class="col-md-2 col-form-label">Status Ketersediaan</label>
                                            <div class="col-md-10">
                                                <select class="form-select" id="statusMobil" name="statusMobil">
                                                    <option value="" selected disabled hidden>
                                                        -- Pilih Status Ketersediaan --</option>
                                                        <option value="1">Tersedia</option>
                                                        <option value="2">Tidak Tersedia</option>
                                                        </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Gambar Mobil</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="gambarMobil" value="" id="gambarMobil"
                                                 type="file" accept=".jpg, .jpeg, .png" >
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

                                            <a href="/datamobil" class="btn btn-danger me-3">Batal</a>
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
