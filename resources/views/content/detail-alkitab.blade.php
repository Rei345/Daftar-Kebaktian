<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Ayat Alkitab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for a modern look */
        }
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05); /* Subtle shadow */
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-2">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
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
                        <a class="nav-link"  href="{{ route('index.ende') }}">Buku Ende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibadah.index') }}">Manajemen Ibadah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
        <hr>

        {{-- Tampilan Hasil Pencarian --}}
        @if (!empty($verses)) {{-- Tampilkan hasil hanya jika ada ayat --}}
            <h2>
                {{ $bookInfo['name'] ?? 'Kitab' }} {{ $bookInfo['chapter'] ?? '' }} ({{ $versionName }})
                @if (!empty($note))
                    <br><small class="text-muted">Catatan: {{ $note }}</small>
                @endif
            </h2>
            
            @foreach ($verses as $verse)
                @php
                    $isGoldenVerse = ($goldenVerse && $verse['verse'] == $goldenVerse);
                @endphp
                <p>
                    <span class="verse-number @if($isGoldenVerse) fw-bold text-primary @endif">
                        <strong>{{ $verse['verse'] }}.</strong>
                    </span>
                    <span class="verse-content @if($isGoldenVerse) fst-italic text-decoration-underline @endif">
                        {{ $verse['content'] }}
                    </span>
                </p>
            @endforeach
        @elseif ($passageInput) 
            <div class="alert alert-info">Tidak ada ayat yang ditemukan untuk input "{{ $passageInput }}".</div>
        @endif
</div>
</body>
</html>