<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Ende {{ $songNumber }} - {{ $songTitle }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/detail-ende.css') }}">
</head>
<body>

@if ($song)
<div class="scrolling-container">
    <header class="hero-section">
        <div class="container text-center animate__animated animate__fadeInUp animate__delay-1s">
            <h1 class="title mb-3">{{ $songTitle }}</h1>
            <p class="subtitle-text fw-light">
                (BE No. {{ $songNumber }}
                @if ($startVerse !== null)
                    @if ($isInfiniteRange)
                        : {{ $startVerse }}...
                    @elseif ($endVerse && $endVerse !== $startVerse)
                        : {{ $startVerse }}@if($operator === '-')-@elseif($operator === '+') + @endif{{ $endVerse }}
                    @else
                        : {{ $startVerse }}
                    @endif
                @endif
                )
            </p>
            <br><br><br><br>
            <a href="#first-verse" class="scroll-down-arrow text-decoration-none">
                <i class="fas fa-arrow-down fa-2x"></i>
            </a>
        </div>
    </header>

    @php
        $rawVerses = preg_split('/\n\n/', $filteredLyric, -1, PREG_SPLIT_NO_EMPTY);
        $displayVerses = [];
        foreach ($rawVerses as $rawVerse) {
            $displayVerses[] = trim($rawVerse);
        }
    @endphp

    @foreach($displayVerses as $index => $verse)
    <section id="verse-{{ $index + 1 }}" class="verse-section animate__animated animate__fadeIn" data-sr-id="{{ $index + 1 }}">
        <div class="container">
            <div class="verse-content text-center">
                {!! nl2br(e($verse)) !!}
            </div>
        </div>
    </section>
    @endforeach
</div>
@else
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="alert alert-danger text-center animate__animated animate__zoomIn" role="alert">
            <h4 class="alert-heading">Lagu Tidak Ditemukan!</h4>
            <p>Maaf, lagu dengan nomor <strong>{{ $songNumber }}</strong> tidak ditemukan dalam database.</p>
            <a href="{{ url()->previous() }}" class="btn btn-danger mt-3">Kembali</a>
        </div>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
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