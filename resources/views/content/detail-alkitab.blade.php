<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $bookInfo['name'] ?? 'Kitab' }} {{ $bookInfo['chapter'] ?? '' }} ({{ $versionName }})</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
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
            background-color: var(--dark-color);
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            /* scroll-behavior: smooth; Hapus ini dari body */
        }
        .navbar {
            background-color: rgba(33, 37, 41, 0.8) !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }
        .navbar.scrolled {
            background-color: var(--dark-color) !important;
        }

        .hero-section {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)), url('https://source.unsplash.com/1600x900/?bible,cross,church,gospel') no-repeat center center/cover;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            scroll-snap-align: start;
        }
        .verse-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem 5%;
            scroll-snap-align: start;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .verse-content {
            font-size: 3.5rem; /* Perbesar untuk proyektor */
            line-height: 1.6;
            font-weight: 500;
            color: #f8f9fa;
        }
        h1.title {
            font-size: 5rem; /* Perbesar judul */
            font-weight: 700;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
        }
        .verse-number {
            font-size: 3.2rem; /* Nomor ayat sedikit lebih besar dari isi */
            font-weight: bold;
            color: var(--primary-color);
            margin-right: 15px; /* Spasi antara nomor dan isi */
            display: inline-block; /* Agar bisa diatur margin */
        }
        .verse-item p {
            margin-bottom: 0; /* Hapus margin bawah paragraf di dalam item */
        }
        .golden-verse {
            font-weight: bold;
            color: var(--info-color); /* Warna berbeda untuk ayat emas */
            text-decoration: none;
        }
        .scroll-down-arrow {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }
        /* Style for full-page scrolling */
        .scrolling-container {
            overflow-y: scroll;
            height: 100vh;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
        }

        /* Responsiveness for large text on smaller screens */
        @media (max-width: 992px) {
            .verse-content {
                font-size: 2.2rem;
            }
            .verse-number {
                font-size: 2.5rem;
            }
            h1.title {
                font-size: 4rem;
            }
            .subtitle-text {
                font-size: 1.8rem;
            }
        }
        @media (max-width: 768px) {
            .verse-content {
                font-size: 1.8rem;
            }
            .verse-number {
                font-size: 2.1rem;
            }
            h1.title {
                font-size: 3.2rem;
            }
            .subtitle-text {
                font-size: 1.5rem;
            }
        }
        @media (max-width: 576px) {
            .verse-content {
                font-size: 1.5rem;
            }
            .verse-number {
                font-size: 1.8rem;
            }
            h1.title {
                font-size: 2.5rem;
            }
            .subtitle-text {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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

@if (!empty($verses))
<div class="scrolling-container">
    <header class="hero-section">
        <div class="container text-center animate__animated animate__fadeInUp animate__delay-1s">
            <h1 class="title mb-3">{{ $passageInput }}</h1>
            <br><br><br><br>
            <a href="#first-verse" class="scroll-down-arrow text-decoration-none">
                <i class="fas fa-arrow-down fa-2x"></i>
            </a>
        </div>
    </header>

    @foreach ($verses as $index => $verse)
        @php
            $isGoldenVerse = ($goldenVerse && $verse['verse'] == $goldenVerse);
        @endphp
        <section id="verse-{{ $verse['verse'] }}" class="verse-section animate__animated animate__fadeIn" data-sr-id="{{ $index + 1 }}">
            <div class="container d-flex align-items-baseline justify-content-center flex-column flex-md-row">
                <span class="verse-number @if($isGoldenVerse) golden-verse @endif">
                    <strong>{{ $verse['verse'] }}.</strong>
                </span>
                <span class="verse-content @if($isGoldenVerse) golden-verse @endif text-start text-md-center">
                    {{ $verse['content'] }}
                </span>
            </div>
        </section>
    @endforeach
</div>
@else
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="alert alert-danger text-center animate__animated animate__zoomIn" role="alert">
            <h4 class="alert-heading">Ayat Alkitab Tidak Ditemukan!</h4>
            <p>Maaf, tidak ada ayat yang ditemukan untuk input <strong>"{{ $passageInput }}"</strong>.</p>
            <a href="{{ url()->previous() }}" class="btn btn-danger mt-3">Kembali</a>
        </div>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ScrollReveal for animations on scroll
        ScrollReveal().reveal('.verse-section', {
            delay: 200,
            distance: '50px',
            origin: 'bottom',
            opacity: 0,
            easing: 'ease-in-out',
            interval: 0,
            mobile: false
        });

        // Navigasi panah ke bait pertama
        const firstVerseLink = document.querySelector('.scroll-down-arrow');
        if (firstVerseLink) {
            firstVerseLink.addEventListener('click', function(e) {
                e.preventDefault();
                // Mengarahkan ke elemen .verse-section pertama
                document.querySelector('.verse-section:first-of-type').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        }
    });

    // Menambah efek blur pada navbar saat digulir
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
</body>
</html>