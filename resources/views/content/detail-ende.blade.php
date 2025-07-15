<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Home Ende</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05); }
        .navbar-brand { font-weight: bold; }
        .song-lyric-display {
            white-space: pre-wrap; /* Mempertahankan spasi dan baris baru */
            font-size: 1.1rem;
            line-height: 1.6;
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
                        <a class="nav-link" aria-current="page" href="{{ route('index.ende') }}">Buku Ende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibadah.index') }}">Manajemen Ibadah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">Kembali</a>
        <hr>

        @if ($song)
            <div class="card p-4">
                <h2 class="mb-3 text-center">{{ $songTitle }} (No. {{ $songNumber }})</h2>
                
                @if ($startVerse && $endVerse && $operator)
                    <p class="text-center text-muted">
                        Menampilkan ayat {{ $startVerse }} 
                        @if ($operator === '-') sampai @elseif ($operator === '+') dan @endif 
                        {{ $endVerse }}
                    </p>
                @elseif ($startVerse)
                    <p class="text-center text-muted">Menampilkan ayat {{ $startVerse }}</p>
                @endif

                <div class="song-lyric-display">
                    {!! nl2br(e($filteredLyric)) !!} {{-- Gunakan nl2br untuk baris baru, e() untuk sanitasi --}}
                </div>
            </div>
        @else
            <div class="alert alert-danger text-center">
                <h4 class="alert-heading">Lagu Tidak Ditemukan!</h4>
                <p>Maaf, lagu dengan nomor <strong>{{ $songNumber }}</strong> tidak ditemukan dalam database.</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>