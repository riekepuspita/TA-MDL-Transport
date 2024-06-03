@extends('landingpage.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('landingpage.header')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>

        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>

        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail Reservasi</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('mdltransport') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('mobilmdltransport') }}">Mobil</a></li>
                        <li class="breadcrumb-item"><a href="">Reservasi</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Detail Reservasi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    @if ($pemesanan->mobil)
                        <img src="{{ asset('gambarMobil/' . $pemesanan->mobil->gambarMobil) }}" class="img-fluid"
                            alt="{{ $pemesanan->mobil->merekMobil }}">
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($pemesanan->mobil)
                        <h2> Reservasi {{ $pemesanan->mobil->merekMobil }} - {{ $pemesanan->mobil->modelMobil }}</h2>
                        <div class="mb-4"></div>
                    @endif
                    <div class="card">
                        <div class="container">
                            <h4>Detail Reservasi</h4>
                            <table>
                                <tr>
                                    <td>No NIK</td>
                                    <td>:</td>
                                    <td>{{ $penyewa->noNIK }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>{{ $pemesanan->penyewa->user->namaUser }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{{ $penyewa->jeniskelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $penyewa->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>:</td>
                                    <td>{{ $penyewa->noHP }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai Sewa</td>
                                    <td>:</td>
                                    <td>{{ $pemesanan->tanggalMulai }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Selesai Sewa</td>
                                    <td>:</td>
                                    <td>{{ $pemesanan->tanggalSelesai }}</td>
                                </tr>
                                <tr>
                                    <td>Tujuan</td>
                                    <td>:</td>
                                    <td>{{ $pemesanan->tujuan }}</td>
                                </tr>
                                <tr>
                                    <td>Pembayaran</td>
                                    <td>:</td>
                                    <td>{{ $pemesanan->mobil->hargaSewa }}</td>
                                </tr>
                            </table>
                            <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                                <form action="/batalpemesanan/{{ $pemesanan->idPemesanan }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-secondary" type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan ini?')"
                                        style="margin-right: 10px; margin-bottom: 20px;">Batal</button>
                                </form>
                                <button class="btn btn-secondary" id="pay-later-button"
                                    style="margin-right: 10px; margin-bottom: 20px;">Bayar Nanti</button>
                                <button class="btn btn-secondary" id="pay-button" style="margin-bottom: 20px;">Bayar
                                    Sekarang</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            function batalPemesanan(idPemesanan) {
                if (confirm('Apakah Anda yakin ingin membatalkan pemesanan ini?')) {
                    // Kirim permintaan DELETE ke server
                    fetch(`/batalpemesanan/${idPemesanan}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.reload(); // Muat ulang halaman setelah berhasil menghapus pemesanan
                            } else {
                                throw new Error('Gagal menghapus pemesanan.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Gagal menghapus pemesanan.');
                        });
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        // Panggil fungsi handlePaymentSuccess ketika pembayaran berhasil
                        handlePaymentSuccess(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here /
                            alert("wating your payment!");
                            console.log(result);
                        },
                        onError: function(result) {
                            / You may add your own implementation here /
                            alert("payment failed!");
                            console.log(result);
                        },
                        onClose: function() {
                            / You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });

            // Handler untuk kejadian 'onSuccess' setelah pembayaran berhasil
            function handlePaymentSuccess(result) {
                // Kirim pesan WhatsApp dengan informasi pembayaran
                var message = "Pembayaran berhasil! ID Pesanan: " + result.order_id;
                sendWhatsAppMessage(message);

                // Tampilkan notifikasi atau lakukan tindakan lain yang sesuai
                alert("Pembayaran berhasil!");
                console.log(result);
            }
        </script>

    </body>
    <!-- Store End -->
    @include('landingpage.footer')
@endsection
