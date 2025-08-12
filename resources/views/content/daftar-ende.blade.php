<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Ende - ParHKI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="{{ asset('assets/css/daftar-ende.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Floating Particles Background -->
    <div class="bg-particles" id="particles"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-dove"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color: var(--primary-blue);"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.alkitab') }}">
                            <i class="fas fa-book-open me-1"></i> Alkitab
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index.ende') }}">
                            <i class="fas fa-music me-1"></i> Buku Ende
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibadah.index') }}">
                            <i class="fas fa-calendar-alt me-1"></i> Manajemen Ibadah
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mt-4 text-center hero-content">
                    <h1 class="hero-title animate__animated animate__fadeInUp">
                        Buku Ende Digital
                    </h1>
                    <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">
                        Kumpulan nyanyian rohani untuk memperkuat iman dan memuji Tuhan
                    </p>
                    <div class="animate__animated animate__fadeInUp animate__delay-2s">
                        <i class="fas fa-music" style="font-size: 3rem; opacity: 0.7;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card content-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                            <h2 class="page-title mb-3 mb-md-0">
                                <i class="fas fa-list-music me-2" style="color: var(--primary-gold);"></i>
                                Daftar Lagu Ende
                            </h2>
                        </div>

                        <!-- Stats Cards -->
                        <div class="stats-container">
                            <div class="stats-card animate__animated animate__fadeInUp animate__delay-2s">
                                <div class="stats-icon">
                                    <i class="fas fa-music"></i>
                                </div>
                                <div class="stats-number" id="totalSongs">-</div>
                                <div class="stats-label">Total Lagu</div>
                            </div>
                            <div class="stats-card animate__animated animate__fadeInUp animate__delay-3s">
                                <div class="stats-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="stats-number" id="searchResults">-</div>
                                <div class="stats-label">Hasil Pencarian</div>
                            </div>
                            <div class="stats-card animate__animated animate__fadeInUp animate__delay-4s">
                                <div class="stats-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="stats-number">500+</div>
                                <div class="stats-label">Lagu Favorit</div>
                            </div>
                        </div>

                        <!-- Search Form -->
                        <form id="endeSearchForm" class="animate__animated animate__fadeInUp animate__delay-2s">
                            <div class="search-container">
                                <div class="search-wrapper">
                                    <input type="text" id="searchInput" name="query" value="" 
                                            class="search-input" placeholder="Cari nomor atau judul lagu..." />
                                    <button type="submit" class="search-btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Search Message -->
                        <div class="alert alert-info d-none animate__animated animate__fadeInUp" id="searchMessage" role="alert">
                            <i class="fas fa-info-circle me-2"></i>
                            <span id="searchMessageText"></span>
                        </div>

                        <!-- Table Container -->
                        <div class="table-container animate__animated animate__fadeInUp animate__delay-3s">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 15%;">
                                            <i class="fas fa-hashtag me-2"></i>
                                            Nomor
                                        </th>
                                        <th scope="col" style="width: 55%;">
                                            <i class="fas fa-music me-2"></i>
                                            Judul Lagu
                                        </th>
                                        <th scope="col" style="width: 30%;">
                                            <i class="fas fa-cog me-2"></i>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="endeTableBody">
                                    <tr>
                                        <td colspan="3" class="loading-row">
                                            <div class="loading-spinner"></div>
                                            <div>Memuat koleksi lagu Ende...</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Ende Pagination" class="animate__animated animate__fadeInUp animate__delay-4s">
                            <ul class="pagination" id="ajaxPagination">
                                <!-- Pagination will be inserted here by JavaScript -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Particles Animation
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 15) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles
        createParticles();

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.backdropFilter = 'blur(20px)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
            }
        });

        $(document).ready(function() {
            const searchInput = $('#searchInput');
            const endeTableBody = $('#endeTableBody');
            const searchMessage = $('#searchMessage');
            const searchMessageText = $('#searchMessageText');
            const ajaxPagination = $('#ajaxPagination');
            const totalSongsEl = $('#totalSongs');
            const searchResultsEl = $('#searchResults');
            const endeSearchForm = $('#endeSearchForm'); // Get the form element
            
            let typingTimer;
            const doneTypingInterval = 500;
            let currentPage = 1;
            let lastPaginationInfo = null;
            let currentQuery = searchInput.val(); // Get initial query from server-side

            // Update stats function
            function updateStats(total, results) {
                totalSongsEl.text(total || '-');
                searchResultsEl.text(results || '-');
                
                // Add counter animation
                totalSongsEl.addClass('animate__animated animate__pulse');
                searchResultsEl.addClass('animate__animated animate__pulse');
                
                setTimeout(() => {
                    totalSongsEl.removeClass('animate__animated animate__pulse');
                    searchResultsEl.removeClass('animate__animated animate__pulse');
                }, 1000);
            }

            // Enhanced pagination rendering
            function renderPagination(paginationData) {
                ajaxPagination.empty();

                const totalPages = paginationData.last_page;
                const currentPage = paginationData.current_page;
                const maxPagesToShow = 5;

                if (totalPages <= 1 && !paginationData.data.length) { // Only hide if no data and no multiple pages
                    ajaxPagination.hide();
                    return;
                } else {
                    ajaxPagination.show();
                }

                let startPage, endPage;
                if (totalPages <= maxPagesToShow) {
                    startPage = 1;
                    endPage = totalPages;
                } else {
                    const maxPagesBeforeCurrentPage = Math.floor(maxPagesToShow / 2);
                    const maxPagesAfterCurrentPage = Math.ceil(maxPagesToShow / 2) - 1;

                    if (currentPage <= maxPagesBeforeCurrentPage) {
                        startPage = 1;
                        endPage = maxPagesToShow;
                    } else if (currentPage + maxPagesAfterCurrentPage >= totalPages) {
                        startPage = totalPages - maxPagesToShow + 1;
                        endPage = totalPages;
                    } else {
                        startPage = currentPage - maxPagesBeforeCurrentPage;
                        endPage = currentPage + maxPagesAfterCurrentPage;
                    }
                }

                // Previous button
                ajaxPagination.append(`
                    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage - 1}" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                `);

                // First page link
                if (startPage > 1) {
                    ajaxPagination.append(`
                        <li class="page-item">
                            <a class="page-link" href="#" data-page="1">1</a>
                        </li>
                    `);
                    if (startPage > 2) {
                        ajaxPagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
                    }
                }

                // Page numbers
                for (let i = startPage; i <= endPage; i++) {
                    ajaxPagination.append(`
                        <li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `);
                }

                // Last page link
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        ajaxPagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
                    }
                    ajaxPagination.append(`
                        <li class="page-item">
                            <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
                        </li>
                    `);
                }

                // Next button
                ajaxPagination.append(`
                    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" data-page="${currentPage + 1}" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                `);
            }

            // Fetch Ende songs via AJAX
            function fetchEndeSongs(page = 1, query = '') {
                endeTableBody.html(`
                    <tr>
                        <td colspan="3" class="loading-row animate__animated animate__fadeIn">
                            <div class="loading-spinner"></div>
                            <div>Memuat koleksi lagu Ende...</div>
                        </td>
                    </tr>
                `);
                searchMessage.removeClass('d-block').addClass('d-none'); // Hide any previous message
                ajaxPagination.empty().hide(); // Hide pagination while loading

                $.ajax({
                    url: '{{ route('ende.search') }}',
                    method: 'GET',
                    data: { page: page, query: query },
                    success: function(response) {
                        endeTableBody.empty();
                        if (response.data && response.data.length > 0) {
                            $.each(response.data, function(index, song) {
                                endeTableBody.append(`
                                    <tr class="animate__animated animate__fadeInUp animate__delay-${index * 0.1}s">
                                        <td>${song.song_number}</td>
                                        <td>${song.song_title}</td>
                                        <td>
                                            <a href="{{ route('ende-home.search') }}?nomor=${song.song_number}" class="btn-detail">
                                                <i class="fas fa-eye me-1"></i> Lihat
                                            </a>
                                        </td>
                                    </tr>
                                `);
                            });
                            renderPagination(response);
                            searchMessage.removeClass('alert-danger alert-warning').addClass('alert-info');
                            searchMessageText.html(`Ditemukan <strong>${response.total}</strong> lagu.`);
                            searchMessage.removeClass('d-none').addClass('d-block');
                        } else {
                            endeTableBody.html(`
                                <tr>
                                    <td colspan="3" class="text-center py-4">
                                        <div class="alert alert-warning animate__animated animate__fadeIn">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            Tidak ada lagu Ende yang ditemukan untuk pencarian "<strong>${query}</strong>".
                                        </div>
                                    </td>
                                </tr>
                            `);
                            searchMessage.removeClass('d-block alert-info alert-danger').addClass('d-none'); // Hide general info message if no results
                        }
                        updateStats(response.total, response.total);
                    },
                    error: function(xhr, status, error) {
                        endeTableBody.html(`
                            <tr>
                                <td colspan="3" class="text-center py-4">
                                    <div class="alert alert-danger animate__animated animate__fadeIn">
                                        <i class="fas fa-times-circle me-2"></i>
                                        Gagal memuat lagu Ende. Silakan coba lagi nanti.
                                    </div>
                                </td>
                            </tr>
                        `);
                        searchMessage.removeClass('d-block alert-info alert-warning').addClass('d-none'); // Hide any info message
                        updateStats('-', '-'); // Reset stats on error
                        console.error("Error fetching Ende songs:", status, error);
                    }
                });
            }

            // Initial load of songs
            fetchEndeSongs(currentPage, currentQuery);

            // Search input keyup event (for live search with debounce)
            searchInput.on('keyup', function() {
                clearTimeout(typingTimer);
                const newQuery = $(this).val();
                if (newQuery !== currentQuery) {
                    typingTimer = setTimeout(function() {
                        currentQuery = newQuery;
                        currentPage = 1; // Reset to first page on new search
                        fetchEndeSongs(currentPage, currentQuery);
                    }, doneTypingInterval);
                }
            });

            // Handle form submission (e.g., if user presses Enter)
            endeSearchForm.on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                clearTimeout(typingTimer); // Clear any pending debounced search
                currentQuery = searchInput.val();
                currentPage = 1; // Reset to first page on new search
                fetchEndeSongs(currentPage, currentQuery);
            });

            // Handle pagination clicks
            ajaxPagination.on('click', '.page-link', function(e) {
                e.preventDefault();
                const newPage = $(this).data('page');
                if (newPage > 0 && newPage <= (lastPaginationInfo ? lastPaginationInfo.last_page : 9999)) { // Basic validation
                    currentPage = newPage;
                    fetchEndeSongs(currentPage, currentQuery);
                    $('html, body').animate({ scrollTop: $('.main-content').offset().top }, 'slow'); // Scroll to top of content
                }
            });
        });
    </script>
</body>
</html>