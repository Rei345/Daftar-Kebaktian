<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - ParHKI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QQiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            border-radius: 0.75rem;
            overflow: hidden;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .image-text-section img {
            width: 100px;
            height: auto;
            object-fit: contain;
            max-width: 100%;
            display: block;
        }
        .card-body-compact {
            padding: 0.75rem !important;
        }
        @media (max-width: 768px) {
            .fs-1 {
                font-size: 1.8rem !important;
            }
            .fs-2 {
                font-size: 1.3rem !important;
            }
            .image-text-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .image-text-section img {
                margin-bottom: 0.75rem;
            }
            .image-text-section .flex-fill {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
        }
        @media (max-width: 576px) {
            .fs-1 {
                font-size: 1.4rem !important;
            }
            .fs-2 {
                font-size: 1.1rem !important;
            }
            .info-boxes .card {
                padding: 0.5rem !important;
            }
            .info-boxes .fw-bold {
                font-size: 1.1rem !important;
            }
            .list-unstyled li {
                margin-bottom: 0.5rem !important;
            }
            .list-unstyled a.fs-2 {
                font-size: 1.1rem !important;
            }
            .row-cols-md-3 .col {
                padding-bottom: 0.25rem;
            }
            .row-cols-md-3 a.fs-2 {
                font-size: 1.1rem !important;
            }
        }
        .ende-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .ende-item .form-control {
            flex-grow: 1;
            margin-right: 0.5rem;
        }
        .ende-actions {
            display: flex;
            gap: 0.25rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-2">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-book-bible me-2"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.alkitab') }}">Alkitab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index.ende') }}">Buku Ende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibadah.index') }}">Manajemen Ibadah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container py-3">
        @if (isset($ibadah) && $ibadah) {{-- Cek apakah variabel $ibadah ada dan tidak null --}}
            {{-- Tampilkan detail ibadah --}}
            <div class="row g-1 mb-3 info-boxes">
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center bg-light text-primary border-primary">
                        <div class="fw-bold fs-2 text-center" id="displayHariMinggu">
                            @if (isset($ibadah->tanggal_ibadah))
                                {{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->translatedFormat('l') }} {{-- Menampilkan nama hari, misal "Minggu" --}}
                            @else
                                HARI
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center bg-light text-primary border-primary">
                        <div class="fw-bold fs-2 text-center" id="displayNamaMinggu">{{ $ibadah->nama_minggu }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center bg-light text-primary border-primary">
                        <div class="fw-bold fs-2 text-center" id="displayTanggal">{{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->translatedFormat('d F Y') }}</div>
                    </div>
                </div>
            </div>

            <div class="card p-3 mb-3 image-text-section d-flex flex-md-row align-items-center">
                <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="me-md-3 mb-2 mb-md-0 rounded-3">
                <div class="fw-semibold text-center flex-fill fs-1" id="displayTema">
                    {{ $ibadah->tema_khotbah }} {{-- Menggunakan tema_khotbah sesuai gambar edit modal --}}
                </div>
                <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="ms-md-3 mt-2 mt-md-0 rounded-3 d-none d-md-block">
            </div>

            <div class="card p-3 mb-3">
                <h3 class="fw-bold mb-2 fs-3">Bacaan Alkitab</h3>
                <ul class="list-unstyled">
                    <li class="mb-1">
                        {{-- Pertimbangkan untuk membuat link ini interaktif menuju halaman Alkitab --}}
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="#">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displayEvangelium">Evangelium: {{ $ibadah->evangelium }}</span>
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="#">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displayEpistel">Epistel: {{ $ibadah->epistel }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="#">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displaySPatik">S.Patik: {{ $ibadah->s_patik }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card p-3 mb-3">
                <h3 class="fw-bold mb-2 fs-3">ENDE</h3>
                <div class="row row-cols-1 row-cols-md-3 g-2" id="displayEndeList">
                    {{-- Langsung loop $ibadah->daftar_ende --}}
                    @foreach ($ibadah->daftar_ende as $index => $endeItem) {{-- Tambahkan $index --}}
                        {{-- Cek apakah objek endeItem ada dan memiliki properti 'nomor' --}}
                        @if (isset($endeItem['nomor'])) 
                            <div class="col">
                                <a class="fs-2 fw-semibold text-decoration-none text-reset d-block py-0" href="#">
                                    <i class="fas fa-music me-2 text-info"></i> 
                                    {{ ($index + 1) }}. {{ $endeItem['nomor'] }} {{-- Menambahkan nomor urut --}}
                                    @if (!empty($endeItem['catatan'])) {{-- Gunakan !empty untuk cek string kosong/null --}}
                                        ({{ $endeItem['catatan'] }})
                                    @endif
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        @else
            {{-- Tampilkan pesan default atau komponen beranda jika tidak ada ID ibadah --}}
            <div class="alert alert-info text-center" role="alert">
                <h4 class="alert-heading">Selamat Datang di ParHKI!</h4>
                <p>Silakan pilih ibadah dari daftar untuk melihat detailnya.</p>
                <hr>
                <p class="mb-0">Atau Anda dapat kembali ke <a href="{{ route('home.index') }}" class="alert-link">daftar ibadah</a>.</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>