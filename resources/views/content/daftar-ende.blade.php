<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Alkitab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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

        .input-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            position: relative;
        }

        .input {
            border-style: none;
            height: 50px;
            width: 50px;
            padding: 10px;
            outline: none;
            border-radius: 50%;
            transition: 0.5s ease-in-out;
            background-color: #1557c0;
            box-shadow: 0px 0px 3px #1557c0;
            padding-right: 40px;
            color: #333;
        }

        .input::placeholder,
        .input {
            font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
                "Lucida Sans", Arial, sans-serif;
            font-size: 17px;
        }

        .input::placeholder {
            color: #8f8f8f;
        }

        .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 0px;
            cursor: pointer;
            width: 50px;
            height: 50px;
            outline: none;
            border-style: none;
            border-radius: 50%;
            pointer-events: painted;
            background-color: transparent;
            transition: 0.2s linear;
        }

        .icon:focus ~ .input,
        .input:focus {
            box-shadow: none;
            width: 250px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 3px solid #1557c0;
            transition: all 500ms cubic-bezier(0, 0.11, 0.35, 2);
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <i class="fas fa-book-bible me-2"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.alkitab') }}">Alkitab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index.ende') }}">Buku Ende</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between">
                <h1 class="h4 mb-3 text-primary">Cari Ende</h1>
                <div class="input-wrapper">
                    <button class="icon">
                    <svg
                        width="25px"
                        height="25px"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                            stroke="#fff"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></path>
                        <path
                            d="M22 22L20 20"
                            stroke="#fff"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></path>
                    </svg>
                    </button>
                    <input type="text" name="text" class="input" placeholder="search.." />
                </div>
            </div>

        {{-- Tampilan Hasil Pencarian Alkitab --}}
        {{-- @if (!empty($verses))
            <div class="card p-4">
                <h2 class="h5 mb-3 text-secondary">
                    {{ $bookInfo['name'] ?? 'Kitab' }} {{ $bookInfo['chapter'] ?? '' }}
                    <small class="text-muted">({{ $versionName ?? '' }})</small>
                </h2>
                <div class="passage-content">
                    @foreach ($verses as $verse)
                        <p class="mb-1"><strong>{{ $verse['verse'] }}.</strong> {{ $verse['content'] }}</p>
                    @endforeach
                </div>
            </div>
        @elseif (isset($passageInput) && $passageInput !== '') Tampilkan pesan jika input ada tapi ayat tidak ditemukan --}}
            {{-- <div class="alert alert-info" role="alert">Tidak ada ayat yang ditemukan untuk input "{{ $passageInput }}". Pastikan format benar dan kitab/bab ada.</div>
        @endif --}}

        {{-- Contoh Tampilan Tabel (dari Buku Ende Anda) --}}
        <div class="table-responsive">
            <table class="table table-hover table-striped caption-top">
                <caption>Daftar isi buku Ende</caption>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Ende</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($ende as $data)
                    <tr>
                        <td>{{ $data->song_number }}</td>
                        <td>{{ $data->song_title }}</td>
                        <td><button type="submit" class="btn btn-primary btn-sm">Detail</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>