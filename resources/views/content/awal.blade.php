<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParHKI - Alkitab & Buku Ende Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --info-color: #0dcaf0;
            --success-color: #198754;
            --dark-color: #212529;
            --light-color: #f8f9fa;
        }
        body {
            background-color: var(--light-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden; /* Mencegah overflow horizontal dari animasi */
        }
        .navbar {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .hero-section {
            height: 60vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url('https://source.unsplash.com/1600x900/?church,bible') no-repeat center center/cover;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
        }
        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 300;
        }
        .content-section {
            margin-top: -80px; /* Overlap dengan hero section */
            position: relative;
            z-index: 10;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%; /* Memastikan tinggi kartu sama */
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .icon-box {
            font-size: 3rem;
            color: var(--primary-color);
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: inline-block;
        }
        .icon-box.bible { background-color: var(--info-color); }
        .icon-box.ende { background-color: var(--success-color); }
        .icon-box.ibadah { background-color: var(--secondary-color); }

        .search-box {
            background-color: white;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
        }
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold animate__animated animate__fadeInLeft" href="{{ route('home') }}">
            <i class="fas fa-church me-2"></i> ParHKI
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 animate__animated animate__fadeInRight">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.alkitab') }}">Alkitab</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.ende') }}">Buku Ende</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ibadah.index') }}">Manajemen Ibadah</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="hero-section">
    <div class="container text-center animate__animated animate__fadeInUp animate__delay-1s">
        <h1 class="hero-title fw-bold">Selamat Datang di ParHKI</h1>
        <p class="hero-subtitle mt-3">Panduan digital Alkitab, Buku Ende, dan Liturgi Ibadah Anda.</p>
        <a href="#content" class="btn btn-primary btn-lg mt-4 animate__animated animate__pulse animate__infinite">Jelajahi Sekarang</a>
    </div>
</header>

<main id="content" class="content-section">
    <div class="container">
        <div class="row g-4 animate__animated animate__fadeInUp animate__delay-2s">
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="icon-box bible mx-auto">
                        <i class="fas fa-book-bible"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Alkitab</h5>
                    <p class="text-muted">Baca dan cari ayat-ayat Alkitab dengan mudah dan cepat dalam berbagai versi.</p>
                    <a href="{{ route('index.alkitab') }}" class="btn btn-outline-info mt-auto">Mulai Baca <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="icon-box ende mx-auto">
                        <i class="fas fa-music"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Buku Ende</h5>
                    <p class="text-muted">Telusuri lirik lagu rohani Buku Ende lengkap dengan nomor dan liriknya.</p>
                    <a href="{{ route('index.ende') }}" class="btn btn-outline-success mt-auto">Telusuri <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="icon-box ibadah mx-auto">
                        <i class="fas fa-list-alt"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Manajemen Ibadah</h5>
                    <p class="text-muted">Kelola dan siapkan liturgi ibadah untuk perayaan hari raya atau ibadah rutin.</p>
                    <a href="{{ route('ibadah.index') }}" class="btn btn-outline-secondary mt-auto">Kelola <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>

        @if(isset($ibadah) && $ibadah->daftar_ende && count($ibadah->daftar_ende) > 0) 
        <div class="card p-4 mt-5 animate__animated animate__fadeInUp animate__delay-3s">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold mb-0">Lagu Ibadah Hari Ini</h3>
                <a href="{{ route('ibadah.show', $ibadah->id) }}" class="btn btn-sm btn-outline-primary">Lihat Selengkapnya</a>
            </div>
            
            <div class="row row-cols-1 row-cols-md-3 g-2">
                @foreach ($ibadah->daftar_ende as $index => $endeItem) 
                    @if (isset($endeItem['nomor']))
                        <div class="col">
                            <a class="fs-2 fw-semibold text-decoration-none text-reset d-block py-0" href="{{ route('ende.search', ['nomor' => $endeItem['nomor']]) }}">
                                <i class="fas fa-music me-2 text-primary"></i> 
                                {{ $endeItem['nomor'] }}
                                @if (!empty($endeItem['catatan']))
                                    <small class="text-muted">({{ $endeItem['catatan'] }})</small>
                                @endif
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif

    </div>
</main>

<footer class="footer text-center">
    <div class="container">
        <p>&copy; 2024 ParHKI. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>