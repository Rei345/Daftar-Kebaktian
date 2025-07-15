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
            background-color: #f8f9fa; 
        }
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
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
                        <a class="nav-link active" aria-current="page" href="{{ route('index.ende') }}">Buku Ende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibadah.index') }}">Manajemen Ibadah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h4 text-primary">Daftar isi buku Ende</h1>
                <form id="endeSearchForm" class="d-flex" action="{{ route('ende.search') }}" method="get">
                    <div class="input-wrapper">
                        <button class="icon" type="submit" id="searchButton">
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
                        <input type="text" id="searchInput" name="query" value="{{ request('query') }}" class="input" placeholder="Cari nomor atau judul!" />
                    </div>
                </form>
            </div>

            <div class="alert alert-info d-none mt-2" id="searchMessage" role="alert"></div>

        {{-- Contoh Tampilan Tabel (dari Buku Ende Anda) --}}
        <div class="table-responsive">
            <table class="table table-hover table-striped caption-top">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Ende</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="endeTableBody" class="table-group-divider">
                    {{-- Data awal akan dimuat oleh performSearch() saat halaman pertama kali dibuka --}}
                    <tr>
                        <td colspan="3" class="text-center">Memuat data...</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <nav aria-label="Page navigation" class="mt-3">
            <ul class="pagination justify-content-center" id="ajaxPagination">
                {{-- Pagiantion links akan di masukkan disini oleh JavaScript --}}
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            const searchInput = $('#searchInput');
            const endeTableBody = $('#endeTableBody');
            const searchMessage = $('#searchMessage');
            const ajaxPagination = $('#ajaxPagination');
            let typingTimer;
            const doneTypingInterval = 500;
            let currentPage = 1;
            let lastPaginationInfo = null;

            // Fungsi untuk menggambar ulang pagination links
            function renderPagination(paginationData) {
                ajaxPagination.empty();

                const totalPages = paginationData.last_page;
                const currentPage = paginationData.current_page;
                const maxPagesToShow = 5; // Jumlah nomor halaman yang ingin ditampilkan

                if (totalPages <= 1) {
                    return; // Tidak perlu pagination jika hanya 1 halaman atau kurang
                }

                let startPage, endPage;
                if (totalPages <= maxPagesToShow) {
                    // Tampilkan semua halaman jika total halaman <= maxPagesToShow
                    startPage = 1;
                    endPage = totalPages;
                } else {
                    // Hitung start dan end page untuk menampilkan maxPagesToShow halaman
                    const maxPagesBeforeCurrentPage = Math.floor(maxPagesToShow / 2);
                    const maxPagesAfterCurrentPage = Math.ceil(maxPagesToShow / 2) - 1;

                    if (currentPage <= maxPagesBeforeCurrentPage) {
                        // Dekat awal
                        startPage = 1;
                        endPage = maxPagesToShow;
                    } else if (currentPage + maxPagesAfterCurrentPage >= totalPages) {
                        // Dekat akhir
                        startPage = totalPages - maxPagesToShow + 1;
                        endPage = totalPages;
                    } else {
                        // Di tengah
                        startPage = currentPage - maxPagesBeforeCurrentPage;
                        endPage = currentPage + maxPagesAfterCurrentPage;
                    }
                }

                // Tombol "Previous"
                ajaxPagination.append(`
                    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage - 1}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                `);

                // Link halaman pertama (jika ada ellipsis di awal)
                if (startPage > 1) {
                    ajaxPagination.append(`
                        <li class="page-item">
                            <a class="page-link" href="#" data-page="1">1</a>
                        </li>
                    `);
                    if (startPage > 2) { // Tampilkan ellipsis jika ada lebih dari 1 halaman di antara 1 dan startPage
                        ajaxPagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
                    }
                }

                // Nomor Halaman di tengah
                for (let i = startPage; i <= endPage; i++) {
                    ajaxPagination.append(`
                        <li class="page-item ${currentPage === i ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `);
                }

                // Link halaman terakhir (jika ada ellipsis di akhir)
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) { // Tampilkan ellipsis jika ada lebih dari 1 halaman di antara endPage dan lastPage
                        ajaxPagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
                    }
                    ajaxPagination.append(`
                        <li class="page-item">
                            <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
                        </li>
                    `);
                }

                // Tombol "Next"
                ajaxPagination.append(`
                    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage + 1}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                `);
            }

            // Fungsi untuk memuat hasil pencarian
            function performSearch() {
                const query = searchInput.val();
                searchMessage.addClass('d-none').text('');

                $.ajax({
                    url: '{{ route('ende.search') }}',
                    method: 'GET',
                    data: { query: query, page: currentPage },
                    beforeSend: function() {
                        endeTableBody.html('<tr><td colspan="3" class="text-center"><div class="spinner-border text-primary spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> Memuat...</td></tr>');
                        ajaxPagination.empty();
                    },
                    success: function(response) {
                        const paginatedData = response.data;
                        lastPaginationInfo = response;

                        if (paginatedData && paginatedData.length > 0) {
                            let tableRows = '';
                            $.each(paginatedData, function(index, ende) {
                                tableRows += `
                                    <tr>
                                        <td>${ende.song_number}</td>
                                        <td>${ende.song_title}</td>
                                        <td><a href="{{ route('ende-home.search', ['nomor' => '']) }} ${ende.song_number}" class="btn btn-info btn-sm">Detail</a></td>
                                    </tr>
                                `;
                            });
                            endeTableBody.html(tableRows);
                            renderPagination(lastPaginationInfo);
                        } else {
                            endeTableBody.html('<tr><td colspan="3" class="text-center">Tidak ada lagu Ende yang ditemukan.</td></tr>');
                            searchMessage.removeClass('d-none').text(`Tidak ada lagu Ende yang ditemukan untuk "${query}".`).removeClass('alert-info').addClass('alert-warning');
                            ajaxPagination.empty();
                        }
                    },
                    error: function(xhr) {
                        console.error('Error fetching search results:', xhr.responseText);
                        endeTableBody.html('<tr><td colspan="3" class="text-center text-danger">Terjadi kesalahan saat mencari. Silakan coba lagi.</td></tr>');
                        searchMessage.removeClass('d-none').text('Gagal memuat hasil pencarian.').removeClass('alert-info').addClass('alert-danger');
                        ajaxPagination.empty();
                    }
                });
            }

            // --- Pemicu AJAX: Ketikan Langsung (Live Search) ---
            searchInput.on('keyup', function() {
                clearTimeout(typingTimer);
                currentPage = 1;
                if (searchInput.val().length > 2 || searchInput.val().length === 0) {
                    typingTimer = setTimeout(performSearch, doneTypingInterval);
                }
            });

            // --- Pemicu AJAX: Tombol "Cari" ---
            $('#endeSearchForm').on('submit', function(e) {
                e.preventDefault();
                clearTimeout(typingTimer);
                currentPage = 1;
                performSearch();
            });

            // --- Pemicu AJAX: Klik Tombol Pagination ---
            $(document).on('click', '#ajaxPagination .page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');

                // PASTIKAN ANDA MENGGUNAKAN 'lastPaginationInfo' DI SINI
                if (lastPaginationInfo && page && page !== currentPage && page > 0 && page <= lastPaginationInfo.last_page) {
                    currentPage = page;
                    performSearch();
                } else if (page) {
                    console.warn('Invalid page click attempted:', page, 'Current page:', currentPage, 'Last page:', lastPaginationInfo ? lastPaginationInfo.last_page : 'N/A');
                }
            });

            // Inisialisasi awal saat halaman dimuat
            performSearch();
        });
    </script>
</body>
</html>