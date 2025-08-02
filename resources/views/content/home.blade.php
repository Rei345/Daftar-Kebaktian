<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - ParHKI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gold: #D4AF37;
            --primary-blue: #1e3a8a;
            --deep-blue: #0f172a;
            --light-gold: #f7f3e9;
            --warm-white: #fefcf7;
            --soft-gray: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --shadow-soft: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 32px rgba(0, 0, 0, 0.12);
            --shadow-strong: 0 16px 48px rgba(0, 0, 0, 0.15);
        }

        body {
            background-color: #f0f3f7;
        }
        .card {
            border: none;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            border-radius: 0.75rem;
            overflow: hidden;
        }

        /* navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            box-shadow: var(--shadow-soft);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-blue) !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: translateY(-2px);
            color: var(--primary-gold) !important;
        }

        .navbar-brand i {
            color: var(--primary-gold);
            margin-right: 0.5rem;
            font-size: 1.6rem;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
            margin: 0 0.5rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
            transform: translateY(-2px)
        }

        .image-text-section {
            background: linear-gradient(135deg, var(--warm-white) 0%, var(--light-gold) 100%);
            border: 1px solid rgba(212, 175, 55, 0.2);
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

        .info-boxes .card {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #2563eb 100%);
            color: white;
            border: none;
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
            .navbar-brand {
                font-size: 1.5rem;
            }
        }

        /* Section headers */
        .section-header {
            font-family: 'Playfair Display', serif;
            color: var(--primary-blue);
            padding-bottom: 0.3rem;
            margin-bottom: 1rem;
            position: relative;
        }

        .section-header::after {
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-gold);
        }

        @keyframes expand {
            0% { width: 50px; }
            100% { width: 100px; }
        }

        /* Enhanced list items */
        .list-unstyled a {
            display: block;
            padding: 0.2rem 0.6rem;
            margin-bottom: 0.2rem;
            background: linear-gradient(135deg, white 0%, rgba(212, 175, 55, 0.05) 100%);
            border-radius: 12px;
            border-left: 3px solid var(--primary-gold);
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .list-unstyled a:hover {
            transform: translateX(10px);
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            color: white !important;
            box-shadow: var(--shadow-medium);
        }

        .list-unstyled a:hover i {
            color: white !important;
            transform: scale(1.2);
        }

        /* ENDE section styling */
        .ende-grid a {
            display: block;
            padding: 0.2rem;
            background: linear-gradient(135deg, white 0%, rgba(23, 162, 184, 0.05) 100%);
            border-radius: 12px;
            border-left: 3px solid #17a2b8;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
            margin-bottom: 0.2rem;
        }

        .ende-grid a:hover {
            transform: translateY(-5px);
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white !important;
            box-shadow: var(--shadow-medium);
        }

        .ende-grid a:hover i {
            color: white !important;
            animation: bounce 0.6s;
        }

        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% {
                transform: translate3d(0,0,0);
            }
            40%, 43% {
                transform: translate3d(0,-10px,0);
            }
            70% {
                transform: translate3d(0,-5px,0);
            }
            90% {
                transform: translate3d(0,-2px,0);
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-dove"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.alkitab') }}"><i class="fas fa-book-open me-1"></i> Alkitab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index.ende') }}"><i class="fas fa-music me-1"></i> Buku Ende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibadah.index') }}"><i class="fas fa-calendar-alt me-1"></i> Manajemen Ibadah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid py-3">
        
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @if (isset($ibadah) && $ibadah)
            <div class="row g-1 mb-2 info-boxes">
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center">
                        <div class="fw-bold fs-2 text-center" id="displayHariMinggu">
                            @if (isset($ibadah->tanggal_ibadah))
                                {{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->locale('id')->translatedFormat('l') }}
                            @else
                                HARI
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center">
                        <div class="fw-bold fs-2 text-center" id="displayNamaMinggu">{{ $ibadah->nama_minggu }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center">
                        <div class="fw-bold fs-2 text-center" id="displayTanggal">{{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->locale('id')->translatedFormat('d F Y') }}</div>
                    </div>
                </div>
            </div>

            <div class="card p-3 mb-2 image-text-section d-flex flex-md-row align-items-center">
                <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="me-md-3 mb-2 mb-md-0 rounded-3">
                <div class="fw-semibold text-center flex-fill fs-1" id="displayTema">
                    {{ $ibadah->tema_khotbah }}
                </div>
                <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="ms-md-3 mt-2 mt-md-0 rounded-3 d-none d-md-block">
            </div>

            <div class="card p-3 mb-2">
                <h3 class="section-header fw-bold mb-2 fs-3">
                    <i class="fas fa-book-open me-2" style="color: var(--primary-gold);"></i>
                    SIJAHAON
                </h3>
                <ul class="list-unstyled">
                    <li">
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('alkitab-home.search', ['version_code' => $ibadah->version_code, 'passage_input' => $ibadah->evangelium]) }}">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displayEvangelium">Evangelium: {{ $ibadah->evangelium }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('alkitab-home.search', ['version_code' => $ibadah->version_code, 'passage_input' => $ibadah->epistel]) }}">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displayEpistel">Epistel: {{ $ibadah->epistel }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('alkitab-home.search', ['version_code' => $ibadah->version_code, 'passage_input' => $ibadah->s_patik]) }}">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displaySPatik">S.Patik: {{ $ibadah->s_patik }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card p-3 mb-2">
                <h3 class="section-header fw-bold mb-2 fs-3">
                    <i class="fas fa-music me-2" style="color: #17a2b8;"></i>
                    ENDE
                </h3>
                <div class="row row-cols-1 row-cols-md-3 g-2 ende-grid" id="displayEndeList">
                    @foreach ($ibadah->daftar_ende as $index => $endeItem) 
                        @if (isset($endeItem['nomor'])) 
                            <div class="col">
                                <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('ende-home.search', ['nomor' => $endeItem['nomor']]) }}">
                                    <i class="fas fa-music me-2 text-info"></i> 
                                    {{ ($index + 1) }}. {{ $endeItem['nomor'] }}
                                    @if (!empty($endeItem['catatan']))
                                    <small class="text-muted">({{ $endeItem['catatan'] }})</small>
                                    @endif
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        @else
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