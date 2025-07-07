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
            <a class="navbar-brand" href="#">
                <i class="fas fa-book-bible me-2"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index.alkitab') }}">Alkitab</a>
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
    <h1>Cari Pasal Alkitab</h1>

    {{-- Form Pencarian --}}
    
    <form action="{{ route('alkitab.search') }}" method="GET" class="mb-2">

        <div class="input-group mb-3">
            <select class="form-select" id="version_code" name="version_code" style="max-width: 300px;">
                @foreach ($versions as $code => $name)
                    <option value="{{ $code }}" {{ $code == $selectedVersion ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            <input  type="text" id="passage_input" name="passage_input" class="form-control" 
                    placeholder="Masukkan Pasal/Ayat"
                    value="{{ old('passage_input', $passageInput ?? '') }}" required>
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
        @error('passage_input')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @error('api_error')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        @if (session('error_book_list'))
            <div class="alert alert-warning">{{ session('error_book_list') }}</div>
        @endif
    </form>

    <hr>

    {{-- Tampilan Hasil Pencarian --}}
    @if (!empty($verses)) {{-- Tampilkan hasil hanya jika ada ayat --}}
        <h2>{{ $bookInfo['name'] ?? 'Kitab' }} {{ $bookInfo['chapter'] ?? '' }} ({{ $versionName }})</h2>
        @foreach ($verses as $verse)
            <p><strong>{{ $verse['verse'] }}.</strong> {{ $verse['content'] }}</p>
        @endforeach
    @elseif ($passageInput) {{-- Tampilkan pesan jika input ada tapi ayat tidak ditemukan --}}
        <div class="alert alert-info">Tidak ada ayat yang ditemukan untuk input "{{ $passageInput }}".</div>
    @endif
</div>
</body>
</html>