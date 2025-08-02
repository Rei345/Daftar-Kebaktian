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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gold: #D4AF37;
            --primary-blue: #1e3a8a;
            --deep-blue: #0f172a;
            --light-gold: #f7f3e9;
            --warm-white: #fefcf7;
            --soft-gray: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --accent-green: #059669;
            --shadow-soft: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 32px rgba(0, 0, 0, 0.12);
            --shadow-strong: 0 16px 48px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--soft-gray) 0%, var(--warm-white) 100%);
            min-height: 100vh;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Musical notes background animation */
        .bg-musical {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
            overflow: hidden;
        }

        .musical-note {
            position: absolute;
            color: var(--primary-gold);
            opacity: 0.1;
            font-size: 2rem;
            animation: float-music 25s infinite linear;
        }

        @keyframes float-music {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.1;
            }
            90% {
                opacity: 0.1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            box-shadow: var(--shadow-soft);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-blue) !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: translateY(-2px);
            color: var(--primary-gold) !important;
        }

        .navbar-brand i {
            color: var(--primary-gold);
            margin-right: 0.5rem;
            font-size: 1.6rem;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
            margin: 0 0.5rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 100%);
            color: white;
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="music" x="0" y="0" width="25" height="25" patternUnits="userSpaceOnUse"><text x="12.5" y="18" font-family="Font Awesome 6 Free" font-size="12" fill="rgba(212,175,55,0.1)" text-anchor="middle">♪</text></pattern></defs><rect width="100" height="100" fill="url(%23music)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Main Content */
        .main-content {
            padding: 3rem 0;
            background: var(--warm-white);
        }

        .content-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-medium);
            border: none;
            padding: 2.5rem;
            margin-top: -4rem;
            position: relative;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-strong);
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--primary-blue);
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            width: 80px;
            height: 3px;
            background: var(--primary-gold);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Modern Search Box */
        .search-container {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            border-radius: 25px;
            padding: 3px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
        }

        .search-container:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        .search-wrapper {
            background: white;
            border-radius: 22px;
            display: flex;
            align-items: center;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .search-input {
            border: none;
            outline: none;
            flex: 1;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            background: transparent;
            color: var(--text-dark);
            font-weight: 500;
        }

        .search-input::placeholder {
            color: var(--text-light);
            font-weight: 400;
        }

        .search-btn {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .search-btn:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: var(--shadow-medium);
        }

        .search-btn:active {
            transform: scale(0.95);
        }

        /* Alert Messages */
        .alert {
            border-radius: 15px;
            border: none;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-soft);
            font-weight: 500;
        }

        .alert-info {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1d4ed8;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        /* Modern Table */
        .table-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            margin-bottom: 2rem;
        }

        .table {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 100%);
            color: white;
            border: none;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
            text-align: center;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.05) 0%, rgba(212, 175, 55, 0.1) 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .table tbody td {
            padding: 1.5rem;
            border: none;
            text-align: center;
            font-weight: 500;
            vertical-align: middle;
        }

        .table tbody td:first-child {
            font-weight: 700;
            color: var(--primary-blue);
            font-size: 1.1rem;
        }

        .table tbody td:nth-child(2) {
            text-align: left;
            font-size: 1.05rem;
            color: var(--text-dark);
        }

        /* Action Button */
        .btn-detail {
            background: linear-gradient(135deg, var(--accent-green) 0%, #047857 100%);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-detail:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            color: white;
        }

        .btn-detail:active {
            transform: translateY(0);
        }

        /* Loading Animation */
        .loading-row {
            text-align: center;
            padding: 3rem;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid rgba(212, 175, 55, 0.3);
            border-top: 3px solid var(--primary-gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Modern Pagination */
        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }

        .pagination .page-item {
            margin: 0 0.2rem;
        }

        .pagination .page-link {
            border: none;
            background: white;
            color: var(--text-dark);
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .pagination .page-link:hover {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 100%);
            color: white;
            box-shadow: var(--shadow-medium);
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
            border-color: var(--primary-gold);
        }

        .stats-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary-gold);
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .stats-label {
            color: var(--text-light);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .content-card {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .content-card {
                padding: 1.5rem;
                margin-top: -2rem;
            }
            
            .search-input {
                font-size: 1rem;
                padding: 0.8rem 1rem;
            }
            
            .table thead th,
            .table tbody td {
                padding: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .page-title {
                font-size: 1.3rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--soft-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gold);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #b8941f;
        }
    </style>
</head>
<body>
    <!-- Musical Notes Background -->
    <div class="bg-musical" id="musicalNotes"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top animate__animated animate__fadeInDown">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-dove"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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
                <div class="col-lg-12">
                    <div class="card content-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="page-title mb-0">
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
                                    <input type="text" id="searchInput" name="query" value="{{ request('query') }}" 
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
                                        <th scope="col">
                                            <i class="fas fa-hashtag me-2"></i>
                                            Nomor
                                        </th>
                                        <th scope="col">
                                            <i class="fas fa-music me-2"></i>
                                            Judul Lagu
                                        </th>
                                        <th scope="col">
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
        // Musical notes animation
        function createMusicalNotes() {
            const musicalContainer = document.getElementById('musicalNotes');
            const notes = ['♪', '♫', '♬', '♩', '♭', '♮', '♯'];
            const noteCount = 30;
            
            for (let i = 0; i < noteCount; i++) {
                const note = document.createElement('div');
                note.className = 'musical-note';
                note.textContent = notes[Math.floor(Math.random() * notes.length)];
                note.style.left = Math.random() * 100 + '%';
                note.style.animationDelay = Math.random() * 25 + 's';
                note.style.animationDuration = (Math.random() * 10 + 20) + 's';
                note.style.fontSize = (Math.random() * 1.5 + 1.5) + 'rem';
                musicalContainer.appendChild(note);
            }
        }

        // Initialize musical notes
        createMusicalNotes();

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
                    url: '{{ route('ende.search') }}', // Assuming this route exists and returns JSON
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
                                            <a href="{{ url('/ende') }}/${song.nomor}" class="btn-detail">
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