<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/landingpage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .promo-text {
            color: #6a1b9a;
            /* Ungu */
            text-align: center;
            margin-top: 20px;
        }

        .promo-image img {
            max-width: 100%;
            height: auto;
        }

        .btn-coming-soon {
            background-color: #f3e5f5;
            color: #6a1b9a;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yayasan - Gita Cahaya Karsa Putri Pasundan</title>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body-tertiary custom-navbar fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ url('image/yayasan.png') }}" alt="Logo" class="d-inline-block align-text-top"
                    style="width: 60px; height: auto;">
                <div class="ms-2">
                    <h1 class="mb-0 fs-5">Yayasan</h1>
                    <h1 class="mb-0 fs-6">Gita Cahaya Karsa Putri Pasundan</h1>
                </div>
            </a>
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->role === 'Admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @elseif (Auth::user()->role === 'Kandidat')
                        <a href="" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('user.kandidat') }}" class="btn btn-primary">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endauth
            @endif
        </div>
    </nav>
    <div class="container" style="margin-top: 100px;">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="7" aria-label="Slide 8"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="8" aria-label="Slide 9"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="9" aria-label="Slide 10"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="10"
                    aria-label="Slide 11"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="text-center">
                        <img src="{{ url('image/yayasan.png') }}" alt="Logo" class="card-img-top centered-img"
                            style="max-width: 450px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="text-center">
                        <h2>Akta Notaris</h2>
                        <img src="{{ url('image/contoh-akta.jpg') }}" alt="Akta Notaris"
                            class="card-img-top centered-img" style="max-width: 300px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="text-center">
                        <h2>Surat Keterangan</h2>
                        <img src="{{ url('image/contoh-sk.png') }}" alt="Surat Keterangan"
                            class="card-img-top centered-img" style="max-width: 350px;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container text-center">
                        <h2>Dokumentasi Peresmian</h2>
                        <h4>CONTOH</h4>
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Dokumentasi Peresmian 1"
                                    class="card-img-top centered-img" style="max-width: 35%; height: auto;">
                            </div>
                            <div class="col-12">
                                <img src="{{ url('image/peresmian2.png') }}" alt="Dokumentasi Peresmian 2"
                                    class="card-img-top centered-img" style="max-width: 35%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container text-center">
                        <h2>Dokumentasi Kegiatan Pertama</h2>
                        <h4>CONTOH</h4>
                        <div class="row">
                            <!-- Row 1 -->
                            <div class="col-4">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Dokumentasi Peresmian 1"
                                    class="card-img-top centered-img" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="col-4">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Dokumentasi Peresmian 1"
                                    class="card-img-top centered-img" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="col-4">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Dokumentasi Peresmian 1"
                                    class="card-img-top centered-img" style="max-width: 100%; height: auto;">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <!-- Row 2 -->
                            <div class="col-4">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Dokumentasi Peresmian 1"
                                    class="card-img-top centered-img" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="col-4">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Dokumentasi Peresmian 1"
                                    class="card-img-top centered-img" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="col-4">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Dokumentasi Peresmian 1"
                                    class="card-img-top centered-img" style="max-width: 100%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container text-center">
                        <h2>Kegiatan Jumat Berkah</h2>
                        <!-- Image Section -->
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <img src="{{ url('image/peresmian1.png') }}" alt="Kegiatan Jumat Berkah"
                                    class="img-fluid" style="width: 70%; height: auto;">
                            </div>
                        </div>
                        <!-- Description Section -->
                        <div class="row mt-4">
                            <div class="col-md-10 mx-auto text-justify">
                                <p>
                                    Pengadaan nasi kotak untuk setiap hari JUMAT BAROKAH, tiap nasi kotak senilai lima
                                    belas ribu rupiah, dan diperuntukan kepada sebanyak sembilan puluh sembilan
                                    penerima, demikian untuk keseluruhan nasi kotak tersebut dibutuhkan dana sebesar
                                    satu juta empat ratus ribu delapan puluh lima ribu rupiah, belum termasuk biaya
                                    mengangkut keseluruhan kotak nasi tersebut ke tempat tujuan, dan biaya untuk tenaga
                                    pekerja pembawa dan pembagi nasi kotak tersebut, demikian perkiraan dana yang
                                    dibutuhkan untuk tiap kegiatan JUMAT BAROKAH, dengan membagikan sebanyak sembilan
                                    puluh sembilan nasi kotak tersebut kepada penerima yang membutuhkan, termasuk biaya
                                    transport yang dibutuhkan untuk membawa jumlah nasi kotak tersebut beserta tenaga
                                    pekerja yang membagikan kepada yang membutuhkan, keseluruhan nya untukkan atas nilai
                                    ..........
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="container-fit p-5 text-start position-relative">
                    <img src="{{ url('image/img11.jpeg') }}" alt="Background Image" class="img-fluid w-100"
                        style="position: absolute; top: 15%; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                    <div class="row align-items-center">
                        <div class="col-md-6 mx-auto" style="margin-top: 50px;">
                            <h1 class="display-2 text-white font-weight-bold">Sedekah Rp3.000 Anda, Harapan Baru</h1>
                            <p class="lead text-white">Berbagilah untuk mereka yang membutuhkan saat mereka kelaparan.
                            </p>
                            <a href="#programKami" class="btn btn-lg btn-outline-light bg-primary">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="container-fit p-5 text-start position-relative">
                    <img src="{{ url('image/img11.jpeg') }}" alt="Background Image" class="img-fluid w-100"
                        style="position: absolute; top: 15%; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                    <div class="row align-items-center">
                        <div class="col-md-6 mx-auto" style="margin-top: 50px;">
                            <h1 class="display-2 text-white font-weight-bold">Bersama, Kita Bisa Mengubah Dunia</h1>
                            <p class="lead text-white">Setiap donasi adalah langkah menuju perubahan besar.</p>
                            <a href="#programKami" class="btn btn-lg btn-outline-light bg-primary">Pelajari Lebih
                                Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="container-fit p-5 text-start position-relative">
                    <img src="{{ url('image/img11.jpeg') }}" alt="Background Image" class="img-fluid w-100"
                        style="position: absolute; top: 15%; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
                    <div class="row align-items-center">
                        <div class="col-md-8 mx-auto" style="margin-top: 50px;">
                            <h1 class="display-2 text-white font-weight-bold">Mari Wujudkan Harapan Bersama</h1>
                            <p class="lead text-white">Dengan kebersamaan, kita dapat memberikan harapan baru.</p>
                            <a href="#programKami" class="btn btn-lg btn-outline-light bg-primary">Dukung Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container hero-section">
        <img src="{{ url('image/gita.png') }}" alt="Gambar Sambutan">
        <div class="hero-text">
            <p>Wilujeung Sumping di website yayasan</p>
            <h1>Gita Cahaya Karsa Putri Pasundan</h1>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <!-- Kata Pengantar Accordion Item -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Kata Pengantar
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="text-center">
                        <h2>Kata Pengantar</h2>
                    </div>
                    <div class="intro">
                        <p>Assalamualaikumwarramatullah wabarakatuh.</p>
                        <p>Salam sejahtera.</p>
                        <p>Namo Budhaya</p>
                        <p>Oom Santi Santi Oom</p>
                        <p>Salam kebajikan.</p>
                        <p>Sampurasun</p>
                    </div>
                    <p>
                        Berbekal penggalan pengalaman perjalanan hidup yang saya alami, dimana saya bertemu seorang
                        pemulung yang
                        badannya menggigil dan mulutnya bergemerutuk, menahan dingin dan lapar.
                    </p>
                    <p>
                        Saya terinspirasi untuk berkegiatan melayani mereka dengan memberi sarapan, makan siang, dan
                        makan malam nantinya.
                    </p>
                    <p>
                        Tidak mudah mewujudkan itu, mengingat keterbatasan yang ada, dan berdasar. <a class="read-more"
                            data-bs-toggle="modal" href="#kataPengantarModal1">Baca Selengkapnya▾</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Anggota Pengurus Accordion Item -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Anggota Pengurus
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="text-center">
                        <h2>Anggota Pengurus</h2>
                        <img src="{{ url('image/anggota.png') }}" alt="Anggota Pengurus"
                            class="card-img-top centered-img" style="max-width: 600px;" data-bs-toggle="modal"
                            data-bs-target="#teamModal">
                    </div>
                    <div class="container">
                        <!-- First Member -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-4 text-center">
                                <img src="image/sekar.png" class="img-fluid" alt="Gita Sekar Cindewangi"
                                    style="max-width: 80%;">
                            </div>
                            <div class="col-md-8">
                                <h5>Gita Sekar Cindewangi</h5>
                                <p>Ketua Pengurus Yayasan</p>
                            </div>
                        </div>
                        <!-- Second Member -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-8 text-center">
                                <h5>Andita Restiani Rahma Putri</h5>
                                <p>Bendahara Yayasan</p>
                            </div>
                            <div class="col-md-4 ">
                                <img src="image/andita.png" class="img-fluid" alt="Andita Restiani Rahma Putri"
                                    style="max-width: 80%;">
                            </div>
                        </div>
                        <!-- Third Member -->
                        <div class="row mb-1 align-items-center">
                            <div class="col-md-4 text-center">
                                <img src="image/novi.png" class="img-fluid" alt="Novi Oktaviani"
                                    style="max-width: 60%;">
                            </div>
                            <div class="col-md-8">
                                <h5>Novi Oktaviani</h5>
                                <p>Sekretaris Yayasan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Accordion Item #2 -->
        <!-- Accordion Item #3 -->
    </div>
    <!-- Programs Section -->
    <section class="programs-section">
        <div class="container">
            <h2 class="text-start mb-5" id="programKami">Program Kami</h2>
            <div class="row">
                <!-- Program 1 -->
                @foreach ($program as $program)
                    <div class="col-md-4 mb-4">
                        <div class="program-card">
                            <img src="{{ asset('storage/' . $program->fotoProgram) }}"
                                alt="{{ $program->namaProgram }}" alt="Program 1" width="100">
                            <div class="card-body">
                                <h5>{{ $program->namaProgram }}</h5>
                                <p>{{ $program->jenisProgram }}</p>
                                <p>{{ $program->detailProgram }}</p>
                                <div class="text-center">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal1">Donasi Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Modal 1 -->
        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black" id="modal1Label">Donasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="bank-list">
                            <!-- Bank Items -->
                            <div class="bank-item">
                                <img src="image/mandiri.png" alt="Bank Mandiri Logo">
                                <button class="btn btn-gl text-black" data-bs-toggle="modal"
                                    data-bs-target="#modal2">Bank Mandiri</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal2Label">Bank mandiri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-black">
                        <div class="text-center">
                            <img src="image/mandiri.png" alt="Bank Mandiri Logo" style="max-width: 100px;">
                            <h6 class="mt-3">No. Rekening:</h6>
                            <h3><strong>1320023455141</strong></h3>
                            <button class="btn btn-outline-secondary btn-sm"
                                onclick="copyToClipboard()">Salin</button>
                        </div>
                        <hr>
                        <h6>Petunjuk Pembayaran</h6>
                        <ol>
                            <li>Buka aplikasi Livin'.</li>
                            <li>Pilih menu "Transfer".</li>
                            <li>Pilih jenis transfer (baru, terjadwal, favorit).</li>
                            <li>Isi detail penerima (nama, nomor rekening).</li>
                            <li>Masukkan nominal transfer.</li>
                            <li>Konfirmasi transfer.</li>
                            <li>Masukkan PIN atau otorisasi tambahan.</li>
                            <li>Selesai.</li>
                        </ol>
                        {{-- <a href="#" class="text-primary">Baca Selengkapnya</a> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container gallery-container">
        <h2 class="text-start mb-5">Gallery Kegiatan</h2>
        <div class="row">
            <!-- Repeat this col-md-4 for each gallery item -->
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <!-- Copy above divs for each image -->
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <!-- Add more items as needed -->
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
            <div class="col-md-4 mb-4 gallery-item">
                <div class="card">
                    <img src="image/program3.png" alt="Gallery Item" class="card-img-top">
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start promo-image">
                <img src="image/gita-sekar.png" alt="Mojang Priangan">
            </div>
            <div class="col-md-6 text-center text-md-start promo-text">
                <h1>Jadilah duta budaya Sunda!</h1>
                <p>Mojang Priangan, tunjukkan kecantikan dan kecerdasanmu! Daftar sekarang di Pemilihan Putri Pasundan
                    dan menangkan hadiah menarik!</p>
                <button class="btn btn-coming-soon">Coming soon</button>
            </div>
        </div>
    </div>
    <div class="copyright">
    </div>
    <a href="https://wa.me/your-number" class="whatsapp-icon">
        <img src="image/whatsapp.png" alt="WhatsApp" style="max-width: 50px;">
    </a>
    <footer class="footer">
        <div class="container">
            <h2>Gita Cahaya Karsa Putri Pasundan</h2>
            <p>Slogan here</p>
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fab fa-google"></i></a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="copyright">
            <p>&copy;2024. gitacahayakarsa.com v1.0</p>
        </div>
    </footer>
    <div class="modal fade" id="kataPengantarModal1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-label="Close">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kata Pengantar</h5>
                </div>
                <div class="modal-body">
                    <p>Assalamualaikum warahmatullahi wabarakatuh,</p>
                    <p>Salam sejahtera, Namo buddhaya, Om swastiastu, Salam kebajikan. Sapa rumpaka.</p>
                    <p>Berbekal pengalaman pengalaman perjalanan hidup yang apa adanya, dimana saya bertemu orang-orang
                        penting di jalanan saya menggali dan langsung berproses mencari dingin dan lapar.</p>
                    <p>Saya terinspirasi untuk bergiatkan melayani merdeka dengan memberi sarapan, makan siang, dan
                        makan sore secara gratis.</p>
                    <p>Tidak mudah menjalankan ini, mengingat keterbatasan yang ada, namun berbekal keyakinan yang dalam
                        di dada,</p>
                    <blockquote class="blockquote">
                        <p>"Mereka diberi rezeki dari yang ingin Allah berikan kepada mereka, maka mereka merasa puas
                            dengan rezeki tersebut yang diberikannya, dan mereka merasa puas pula dengan tambahan dari
                            Tuhan mereka: Sesungguhnya mereka berada dalam kaum yang tidak merasa takut (atas sesuatu)
                            dan mereka tidak bersedih hati."</p>
                        <footer class="blockquote-footer">Surah Al-Baqarah (2) ayat 177</footer>
                    </blockquote>
                    <p>Saya melangkah dan bergerak untuk ini, tidak terlepas hanya itu.</p>
                    <p>Setiap Allah SWT juga bergerak nasibnya, di bidang sosial penduduk, keamanan dan keamanan utama.
                    </p>
                    <p>Doanya untuk kita semua yang sejahtera. Dan apa yang kita banggakan hari kelahiran dan
                        keselamatan juga agar.</p>
                    <p>Semoga Allah Subhana wataala. Sedia merendahkan utusan kita semua.</p>
                    <p>Hormat saya, salam sejahtera kami serta ada semua.</p>
                    <p><strong>GITA CAHAYA KARSA PUTRI PASUNDAN</strong></p>
                    <hr>
                    <p class="text-right">
                        Cq: TTD <br>
                        GITA SEKAR CINDEWANGI
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teamModalLabel">Team Members</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container text-center">
                        <!-- First Member -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <img src="image/sekar.png" class="img-fluid" alt="Gita Sekar Cindewangi"
                                    style="max-width: 50%;">
                                <h5>Gita Sekar Cindewangi</h5>
                                <p>Ketua Pengurus Yayasan</p>
                            </div>
                        </div>
                        <!-- Second Member -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <img src="image/andita.png" class="img-fluid" alt="Andita Restiani Rahma Putri"
                                    style="max-width: 50%;">
                                <h5>Andita Restiani Rahma Putri</h5>
                                <p>Bendahara Yayasan</p>
                            </div>
                        </div>
                        <!-- Third Member -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <img src="image/novi.png" class="img-fluid" alt="Novi Oktaviani"
                                    style="max-width: 30%;">
                                <h5>Novi Oktaviani</h5>
                                <p>Sekretaris Yayasan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="allContestantsModal" tabindex="-1" aria-labelledby="allContestantsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allContestantsModalLabel">All Contestants</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row text-center">
                            <!-- Contestant 1 -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="image/participant2.png" class="card-img-top" alt="Nama Peserta 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Peserta</h5>
                                        <button type="button" class="btn btn-primary">Vote</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Contestant 2 -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="image/participant2.png" class="card-img-top" alt="Nama Peserta 2">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Peserta</h5>
                                        <button type="button" class="btn btn-primary">Vote</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Contestant 3 -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="image/participant1.png" class="card-img-top" alt="Nama Peserta 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Peserta</h5>
                                        <button type="button" class="btn btn-primary">Vote</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Contestant 4 -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="image/participant2.png" class="card-img-top" alt="Nama Peserta 4">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Peserta</h5>
                                        <button type="button" class="btn btn-primary">Vote</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Contestant 5 -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="image/participant2.png" class="card-img-top" alt="Nama Peserta 5">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Peserta</h5>
                                        <button type="button" class="btn btn-primary">Vote</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Contestant 6 -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="image/participant2.png" class="card-img-top" alt="Nama Peserta 6">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Peserta</h5>
                                        <button type="button" class="btn btn-primary">Vote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="modal-title" id="putriPasundanLabel">ANDAKAH PUTRI PASUNDAN ITU?</h5>
                    <p>Bila anda terlahir dari salah seorang tua berdarah sunda, baik ayah maupun ibu,</p>
                    <p>Bila anda terlahir dan tinggal di tanah pasundan tercinta,</p>
                    <p>Bila anda menghabiskan lebih dari setengah usia anda di tataran pasundan,</p>
                    <p>Bila anda mengeyam pendidikan, salah satu jenjang pendidikan berikut, s ma, D3, S1, S2, di tanah
                        pasundan,</p>
                    <p>Bila anda memahami dan menguasai bahasa sunda, musik sunda, sejarah sunda, budaya sunda, dengan
                        baik,</p>
                    <p>Ikut <strong>DUTA YAYASAN GITA CAHAYA KARSA PUTRI PASUNDAN</strong>....</p>
                    <p>dan dapatkan, bingkisan penghargaan kami yang menarik, dari mulai seperangkat alat sholat,
                        kesempatan kursus memasak, kursus kecantikan, kursus menjahit, kursus kepribadian, alat rias
                        rumah tangga, hingga kesempatan umroh * (syarat dan ketentuan berlaku)</p>
                    <p>Putri Pasundan yang terpilih berdasarkan penilaian masyarakat luas pengunjung website <a
                            href="http://www.gitacahayakarsapp.com">www.gitacahayakarsapp.com</a></p>
                    <p>Daftar segera dengan mengirimkan data diri anda dengan format pendaftaran</p>
                    <p><a href= "#">(klik disini)</a> kirim melalui email <a
                            href="mailto:yayasangitacahayakarsa@gmail.com">yayasangitacahayakarsa@gmail.com</a></p>
                    <p>Salam hormat dan sayang,</p>
                    <p><strong>GITA SEKAR CINDEWANGI</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Link to Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.getElementById('modal2').addEventListener('hidden.bs.modal', function() {
            // Buka modal pertama kembali jika diperlukan
            const modal1 = new bootstrap.Modal(document.getElementById('modal1'));
            modal1.show();
        });
        document.getElementById('modal2').addEventListener('hidden.bs.modal', function() {
            if (document.querySelectorAll('.modal.show').length === 0) {
                document.body.classList.remove('modal-open'); // Hapus class yang ditambahkan Bootstrap
                document.querySelector('.modal-backdrop')?.remove(); // Hapus overlay
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
