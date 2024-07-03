<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-secondary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <img class="img-fluid" src="{{ asset('landingpage/img/mdl.png') }}" alt="Logo"
                        style="width: 70px; height: auto;">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/"
                            class="nav-item nav-link {{ $title === 'MDL Transport' ? 'active' : '' }}">Home</a>
                        <a href="/about" class="nav-item nav-link {{ $title === 'About' ? 'active' : '' }}">About</a>
                        <a href="/mobil" class="nav-item nav-link {{ $title === 'Mobil' ? 'active' : '' }}">Mobil</a>
                        <a href="/contact"
                            class="nav-item nav-link {{ $title === 'Contact' ? 'active' : '' }}">Contact</a>
                    </div>

                    <div class="border-start ps-4 d-none d-lg-block">
                        @auth
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('assets/images/users/profil.png') }}" alt="Header Avatar"
                                        style="width: 30px; height: 30px;">
                                    <div class="user-info ms-2 d-none d-xl-inline-block">
                                        <span class="user-name">{{ $user->namaUser }}</span>
                                        <br> <!-- Tambahkan jeda baris di sini -->
                                        <span class="user-email"
                                            style="font-size: 14px; color: blue;">{{ $user->email }}</span>
                                    </div>

                                </button>


                                <div class="dropdown-menu dropdown-menu-end pt-0">
                                    <a class="dropdown-item" href="#"><i
                                            class='bx bx-user-circle text-muted font-size-18 align-middle me-1'></i> <span
                                            class="align-middle">My Account</span></a>
                                    {{-- <a class="dropdown-item" href="{{ route('riwayatpemesanan') }}" id="riwayatPemesananMenu"><i
                                            class='bx bx-list-ul text-muted font-size-18 align-middle me-1'></i> <span
                                            class="align-middle">Riwayat Pemesanan</span></a> --}}
                                    <a class="dropdown-item riwayatPemesananMenu" href="#"><i
                                            class='bx bx-list-ul text-muted font-size-18 align-middle me-1'></i> <span
                                            class="align-middle">Riwayat Pemesanan</span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class='bx bx-log-out text-muted font-size-18 align-middle me-1'></i> <span
                                            class="align-middle">Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="/login" class="btn btn-secondary">LOGIN</a>
                        @endauth
                    </div>




                    {{-- <div class="border-start ps-4 d-none d-lg-block">
                        @auth

                        <div class="user-info">
                            <p>Welcome, {{ $user->namaUser }}</p>
                            <p>Email: {{ $user->email }}</p>
                        </div>

                            <a href="{{ route('logout') }}" class="btn btn-secondary"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                LOGOUT
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="/login" class="btn btn-secondary">LOGIN</a>
                        @endauth
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Riwayat Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Konten riwayat pemesanan akan ditampilkan di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- jQuery dan JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Kode JavaScript untuk menangani tautan Riwayat Pemesanan -->
    <script>
        // Menangani klik pada tautan "Riwayat Pemesanan"
        document.querySelectorAll('.riwayatPemesananMenu').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault(); // Mencegah tindakan default dari tautan

                // Mengirim permintaan AJAX untuk mendapatkan riwayat pemesanan
                fetch("{{ route('riwayatpemesanan') }}")
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Memeriksa apakah data riwayat pemesanan diterima dengan benar
                        if (data && data.length > 0) {
                            // Membuat tabel untuk menampilkan data
                            var tableHtml =
                                "<table class='table'><thead><tr><th>Gambar</th><th>Merek dan Model</th><th>Tujuan</th><th>Tanggal Mulai</th><th>Tanggal Selesai</th></tr></thead><tbody>";
                            // Mengisi tabel dengan data riwayat pemesanan
                            data.forEach(function(item) {
                                var gambarUrl = item.mobil.gambar_url ||
                                    'path/to/default/image.jpg';
                                tableHtml += "<tr>";
                                tableHtml += "<td><img src='" + gambarUrl +
                                    "' alt='Gambar Mobil' style='width: 100px; height: auto;'/></td>";
                                tableHtml += "<td>" + item.mobil.merekMobil + " " + item.mobil.modelMobil + "</td>";
                                // tableHtml += "<td>" + item.mobil.modelMobil + "</td>";
                                tableHtml += "<td>" + item.tujuan + "</td>";
                                tableHtml += "<td>" + item.tanggalMulai + "</td>";
                                tableHtml += "<td>" + item.tanggalSelesai + "</td>";
                                tableHtml += "<td><a href='detailreservasi/" + item.idPemesanan
                                     + 
                                     "?status=" + item.pembayaran.statusPembayaran + 
                                    "' class='btn btn-primary'>Detail Reservasi</a></td>";
                                tableHtml += "</tr>";
                            });
                            tableHtml += "</tbody></table>";
                            // Menambahkan tabel ke dalam modal
                            document.getElementById('modalBody').innerHTML = tableHtml;
                            // Menampilkan modal
                            $('#myModal').modal('show');
                        } else {
                            // Jika tidak ada data riwayat pemesanan, tampilkan pesan kosong dalam modal
                            document.getElementById('modalBody').innerHTML =
                                "<p>Tidak ada riwayat pemesanan.</p>";
                            $('#myModal').modal('show');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Tampilkan pesan kesalahan dalam modal jika terjadi kesalahan saat memuat data
                        document.getElementById('modalBody').innerHTML =
                            "<p>Terjadi kesalahan saat memuat data riwayat pemesanan.</p>";
                        $('#myModal').modal('show');
                    });
            });
        });
    </script>





    {{-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Riwayat Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Content of riwayat pemesanan will be displayed here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- Your body content here -->

    <!-- jQuery and Bootstrap JavaScript -->
    <!-- Pastikan untuk memuat jQuery dan Bootstrap sebelum kode JavaScript di bawah ini -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-sT0t4vQxXLdj3Oi4fW5K9x3La0aA83hcgWVl0/4+CJk=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-pzjw8f+02b4+rn38MNh8z+vjz4F+g6S6q5SkIQTo24GECtb6TKgjXhFfC5h/kbLk" crossorigin="anonymous">
    </script>

    <!-- JavaScript code for handling Riwayat Pemesanan link -->
    <!-- JavaScript code for handling Riwayat Pemesanan link -->
<script>
    // Menangani klik pada tautan "Riwayat Pemesanan"
    document.querySelectorAll('.riwayatPemesananMenu').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault(); // Mencegah tindakan default dari tautan

            // Mengirim permintaan AJAX untuk mendapatkan riwayat pemesanan
            fetch("{{ route('riwayatpemesanan') }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Memeriksa apakah data riwayat pemesanan diterima dengan benar
                    if (data && data.length > 0) {
                        // Membuat tabel untuk menampilkan data
                        var tableHtml = "<table class='table'><thead><tr><th>No Polisi</th><th>Tujuan</th><th>Tanggal Mulai</th></tr></thead><tbody>";
                        // Mengisi tabel dengan data riwayat pemesanan
                        data.forEach(function (item) {
                            tableHtml += "<tr><td>" + item.mobil_noPolisi + "</td><td>" + item.tujuan + "</td><td>" + item.tanggalMulai + "</td></tr>";
                        });
                        tableHtml += "</tbody></table>";
                        // Menambahkan tabel ke dalam modal
                        document.getElementById('modalBody').innerHTML = tableHtml;
                        // Menampilkan modal
                        $('#myModal').modal('show');
                    } else {
                        // Jika tidak ada data riwayat pemesanan, tampilkan pesan kosong dalam modal
                        document.getElementById('modalBody').innerHTML = "<p>Tidak ada riwayat pemesanan.</p>";
                        $('#myModal').modal('show');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Tampilkan pesan kesalahan dalam modal jika terjadi kesalahan saat memuat data
                    document.getElementById('modalBody').innerHTML = "<p>Terjadi kesalahan saat memuat data riwayat pemesanan.</p>";
                    $('#myModal').modal('show');
                });
        });
    });
</script> --}}

</body>


{{-- <script>
    // Menangani klik pada tautan "Riwayat Pemesanan"
    document.getElementById('riwayatPemesananMenu').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tindakan default dari tautan

        // Mengirim permintaan AJAX untuk mendapatkan riwayat pemesanan
        fetch("{{ route('riwayatpemesanan') }}")
            .then(response => response.json())
            .then(data => {
                // Memperbarui isi modal dengan data yang diterima
                if(data.message) {
                    // Jika pesan kosong, tampilkan pesan bahwa tidak ada riwayat pemesanan
                    document.getElementById('modalBody').innerHTML = "<p>" + data.message + "</p>";
                } else {
                    // Jika ada riwayat pemesanan, tampilkan data dalam modal
                    // Misalnya, Anda dapat memformat data dalam bentuk tabel
                    var tableHtml = "<table>";
                    data.forEach(function(item) {
                        tableHtml += "<tr><td>" + item.nama_kolom + "</td><td>" + item.nilai_kolom + "</td></tr>";
                    });
                    tableHtml += "</table>";
                    document.getElementById('modalBody').innerHTML = tableHtml;
                }

                // Tampilkan modal
                $('#myModal').modal('show');
            })
            .catch(error => console.error('Error:', error));
    });
</script> --}}
