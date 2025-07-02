<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
                        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.alkitab') }}">Alkitab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index.ende') }}">Buku Ende</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex">
                <button class="btn btn-warning mx-2 border border-black" type="submit">Edit</button>
                <button class="btn btn-primary border border-black" type="submit">Simpan</button>
            </form>
        </div>
    </nav>
    

    <div class="d-flex justify-content-between m-2">
        <div class="flex-fill border border-2 border-primary rounded text-center fw-bold fs-2">MINGGU</div>
        <div class="mx-3 flex-fill border border-2 border-primary rounded text-center fw-bold fs-2">II Dung Epiphanias</div>
        <div class="flex-fill border border-2 border-primary rounded text-center fw-bold fs-2">14 Januari 2024</div>
    </div>

    <div class="d-flex justify-content-between m-1">
        <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="">
        <div class="p-1 mx-3 fw-semibold flex-fill text-center fs-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </div>
        <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="">
    </div>

    <div class="d-flex flex-column mb-2">
        <a class="flex-fill fs-2 fw-semibold text-decoration-none text-reset">→ Evangelium: Johanes 1 : 43-51</a>
        <a class="flex-fill fs-2 fw-semibold text-decoration-none text-reset">→ Epistel: 1 Samuel 3 : 1-10 (AO : 10)</a>
        <a class="flex-fill fs-2 fw-semibold text-decoration-none text-reset">→ S.Patik: Psalmern 2 : 10-11</a>
    </div>

    <div class="fw-semibold fs-2">
        <div class="mb-2 font-monospace">
            ENDE
        </div>
        <div class="row mb-3"> 
            <div class="col-4">
                <a class="grid-cell">1. 74 : 1-2</a>
            </div>
            <div class="col-4">
                <a class="grid-cell">4. 753 : 1-2</a>
            </div>
            <div class="col-4">
                <a class="grid-cell">7. 222 : 1... (P.Pelean 3)</a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4">
                <a class="grid-cell">2. 432 : 1-2</a>
            </div>
            <div class="col-4">
                <a class="grid-cell">5. 256 : 1... (P.Pelean 1&2)</a>
            </div>
            <div class="col-4">
                <a class="grid-cell">8. </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-4">
                <a class="grid-cell">3. 697 : 1+4</a>
            </div>
            <div class="col-4">
                <a class="grid-cell">6. 192 : 1-2</a>
            </div>
            <div class="col-4">
                <a class="grid-cell">9. </a>
            </div>
        </div>
    </div>
</body>
</html>