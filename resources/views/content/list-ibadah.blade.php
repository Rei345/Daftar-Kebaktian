<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Ibadah - ParHKI Admin</title>
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

        /* Floating particles background */
        .bg-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--primary-gold);
            border-radius: 50%;
            opacity: 0.3;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.3;
            }
            90% {
                opacity: 0.3;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Modern Navigation */
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="cross" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M10 0v20M0 10h20" stroke="rgba(212,175,55,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23cross)"/></svg>');
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

        /* Main Content Section */
        .main-content {
            padding: 3rem 0;
            background: var(--warm-white);
            position: relative;
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

        .content-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Enhanced Add Button */
        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 50px;
            height: 50px;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
        }

        .Btn .sign {
            width: 100%;
            font-size: 1.8rem;
            color: white;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .Btn .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .Btn:hover {
            width: 140px;
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        .Btn:hover .sign {
            width: 30%;
            padding-left: 15px;
        }

        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            padding-right: 15px;
        }

        .Btn:active {
            transform: translate(2px, 2px);
        }

        /* Table Styles */
        .table-container {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-soft);
            overflow: hidden;
            margin-top: 2rem;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 100%);
            color: white;
            border: none;
            padding: 1.2rem 1rem;
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            transform: translateX(0); 
            will-change: transform; 
        }

        .table tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
            transform: translateX(5px);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border: none;
            color: var(--text-dark);
        }

        .table tbody td:first-child {
            font-weight: 600;
            color: var(--primary-blue);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            box-shadow: var(--shadow-soft);
        }

        .btn-info {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-sm:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        /* Alert Styles */
        .alert {
            border-radius: 15px;
            border: none;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-soft);
            animation: slideInDown 0.5s ease-out;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
            border-left: 4px solid #ef4444;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
            border-left: 4px solid #f59e0b;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: var(--shadow-strong);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 100%) !important;
            color: white !important;
            border-radius: 20px 20px 0 0;
            padding: 1.5rem 2rem;
            border-bottom: none;
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid rgba(212, 175, 55, 0.1);
        }

        .form-select, .form-control {
            border: 2px solid rgba(212, 175, 55, 0.2);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-select:focus, .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
            background: white;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            background: linear-gradient(135deg, #b8941f 0%, var(--primary-gold) 100%);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .btn-danger-delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .btn-danger-delete:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        /* Ende Items */
        .ende-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 1rem;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.05) 0%, rgba(255, 255, 255, 0.8) 100%);
            border-radius: 15px;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease, box-shadow 0.3s ease;
        }

        .ende-item:hover {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1) 0%, rgba(255, 255, 255, 0.9) 100%);
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        .ende-item .form-control {
            flex-grow: 1;
            margin-right: 0.5rem;
            border: 2px solid rgba(212, 175, 55, 0.2);
            border-radius: 15px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .ende-item .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
            background: white;
        }

        .remove-item-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            color: var(--text-light);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            height: 54px;
            width: 57px;
            border: 2px solid rgba(212, 175, 55, 0.2);
            border-radius: 20%;
        }

        .remove-item-btn:hover {
            color: white;
            background: var(--primary-gold);
            border-color: var(--primary-gold);
            transform: scale(1.1);
        }

        .input-group-text {
            background: var(--primary-gold);
            border: 2px solid rgba(212, 175, 55, 0.2);
            border-color: var(--primary-gold);
            color: white;
            font-weight: 600;
            border-radius: 15px;
            height: 53px;
            padding: 0.8rem 1rem;
            transition: all 0.3s ease;
        }

        .btn-outline-primary {
            border: 2px solid var(--primary-gold);
            color: var(--primary-gold);
            background: transparent;
            border-radius: 15px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--primary-gold);
            color: white;
            transform: translateY(-2px);
        }

        /* Pagination */
        .pagination {
            margin-top: 2rem;
            justify-content: center;
        }

        .page-link {
            color: var(--primary-gold);
            border: 2px solid rgba(212, 175, 55, 0.2);
            background: white;
            margin: 0 0.2rem;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: var(--primary-gold);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-soft);
        }

        .page-item.active .page-link {
            background: var(--primary-gold);
            border-color: var(--primary-gold);
            color: white;
        }

        /* No Data State */
        .no-data-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-light);
        }

        .no-data-state i {
            font-size: 4rem;
            color: var(--primary-gold);
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        .no-data-state h5 {
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .no-data-state a {
            color: var(--primary-gold);
            text-decoration: none;
            font-weight: 600;
        }

        .no-data-state a:hover {
            color: var(--primary-blue);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
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
            
            .content-card {
                padding: 1.5rem;
                margin-top: -2rem;
            }
            
            .content-title {
                font-size: 1.5rem;
                flex-direction: column;
                gap: 1rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.3rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .table-responsive {
                font-size: 0.85rem;
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

        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 2rem;
        }

        .loading.active {
            display: block;
        }

        .spinner {
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
    </style>
</head>
<body>
    <div class="bg-particles" id="particles"></div>

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
                        <a class="nav-link" href="{{ route('index.ende') }}">
                            <i class="fas fa-music me-1"></i> Buku Ende
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('ibadah.index') }}">
                            <i class="fas fa-calendar-alt me-1"></i> Manajemen Ibadah
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mt-4 text-center hero-content">
                    <h1 class="hero-title animate__animated animate__fadeInUp">
                        Manajemen Ibadah
                    </h1>
                    <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">
                        Kelola jadwal ibadah dan liturgi dengan mudah dan terorganisir
                    </p>
                    <div class="animate__animated animate__fadeInUp animate__delay-2s">
                        <i class="fas fa-calendar-alt" style="font-size: 3rem; opacity: 0.7;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="content-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="content-title">
                            <div>
                                <i class="fas fa-list-alt me-2" style="color: var(--primary-gold);"></i>
                                Daftar Data Ibadah
                            </div>
                            <button class="Btn" id="createIbadahBtn" data-bs-toggle="modal" data-bs-target="#editIbadahModal">
                                <div class="sign">+</div>
                                <div class="text">Tambah</div>
                            </button>
                        </div>

                        <div id="alertContainer">
                            {{-- Alert untuk Success, Error, dan Validation Errors (akan diisi JS) --}}
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                <i class="fas fa-check-circle me-2"></i>
                                <span id="successMessage"></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <span id="errorMessage"></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <ul id="validationErrors" class="mt-2 mb-0" style="display: none;"></ul> {{-- Untuk menampilkan error validasi --}}
                            </div>
                        </div>

                        <div class="table-container">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">No</th>
                                            <th style="width: 200px;">Tanggal</th>
                                            <th>Nama Minggu</th>
                                            <th>Tema Khotbah</th>
                                            <th style="width: 300px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ibadahTableBody">
                                        {{-- Data akan dimuat oleh JavaScript --}}
                                    </tbody>
                                </table>
                            </div>

                            <div class="no-data-state text-center" id="noDataState" style="display: none;">
                                <i class="fas fa-box-open"></i>
                                <h5>Belum ada data ibadah</h5>
                                <p>Silakan tambahkan data ibadah baru untuk memulai.</p>
                                <a href="#" id="addNewIbadahLink" data-bs-toggle="modal" data-bs-target="#editIbadahModal">
                                    <i class="fas fa-plus-circle me-1"></i> Tambah Ibadah Baru
                                </a>
                            </div>

                            <div class="loading text-center" id="loadingState">
                                <div class="spinner"></div>
                                <p>Memuat data ibadah...</p>
                            </div>

                            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-3">
                                <ul class="pagination" id="paginationControls">
                                    {{-- Pagination links will be generated by JavaScript --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal untuk Tambah/Edit Ibadah --}}
    <div class="modal fade" id="editIbadahModal" tabindex="-1" aria-labelledby="editIbadahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content animate__animated animate__zoomIn">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editIbadahModalLabel"><i class="fas fa-plus-circle me-2"></i> Tambah Data Ibadah Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="ibadahForm" action="" method="POST"> {{-- Changed id to ibadahForm for consistency --}}
                    @csrf
                    {{-- Hidden input for PUT method, will be added/removed by JS --}}
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <div class="modal-body">
                        <input type="hidden" name="ibadah_id" id="ibadahId"> {{-- Hidden field to store ibadah ID for updates --}}

                        <div class="mb-3">
                            <label for="tanggalIbadah" class="form-label">Tanggal Ibadah</label>
                            <input type="date" class="form-control @error('tanggal_ibadah') is-invalid @enderror" id="tanggalIbadah" name="tanggal_ibadah" required value="{{ old('tanggal_ibadah') }}">
                            @error('tanggal_ibadah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="namaMinggu" class="form-label">Nama Minggu</label>
                            <input type="text" class="form-control @error('nama_minggu') is-invalid @enderror" id="namaMinggu" name="nama_minggu" placeholder="Contoh: II Dung Epiphanias" required value="{{ old('nama_minggu') }}">
                            @error('nama_minggu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="temaKhotbah" class="form-label">Tema Khotbah</label>
                            <textarea class="form-control @error('tema_khotbah') is-invalid @enderror" id="temaKhotbah" name="tema_khotbah" rows="3" placeholder="Masukkan tema ibadah di sini" required>{{ old('tema_khotbah') }}</textarea>
                            @error('tema_khotbah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <label for="version_code" class="form-label me-2 mb-0 text-nowrap">Pilih Bahasa/Versi Alkitab:</label>
                            <select class="form-select @error('version_code') is-invalid @enderror" id="version_code" name="version_code">
                                @foreach ($versions as $code => $name)
                                    <option value="{{ $code }}" {{ old('version_code', $selectedVersion ?? '') == $code ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('version_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="evangelium" class="form-label">Evangelium</label>
                            <input type="text" class="form-control @error('evangelium') is-invalid @enderror" id="evangelium" name="evangelium" placeholder="Contoh: Yohanes 1 : 43-51" required value="{{ old('evangelium') }}">
                            @error('evangelium')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="epistel" class="form-label">Epistel</label>
                            <input type="text" class="form-control @error('epistel') is-invalid @enderror" id="epistel" name="epistel" placeholder="Contoh: 1 Samuel 3 : 1-10 (AO : 10)" required value="{{ old('epistel') }}">
                            @error('epistel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sPatik" class="form-label">S.Patik</label>
                            <input type="text" class="form-control @error('s_patik') is-invalid @enderror" id="sPatik" name="s_patik" placeholder="Contoh: Mazmur 2 : 10-11" required value="{{ old('s_patik') }}">
                            @error('s_patik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Daftar Ende</label>
                            <div id="endeInputsContainer">
                                {{-- Ende inputs will be dynamically added here by JavaScript --}}
                                {{-- Jika ada error validasi, isi kembali dari old('daftar_ende') --}}
                                @if(old('daftar_ende'))
                                    @foreach(old('daftar_ende') as $index => $endeItem)
                                        <div class="input-group mb-2 ende-item" id="ende-item-{{ $index }}">
                                            <span class="input-group-text">No. BE</span>
                                            <input type="text" class="form-control ende-nomor @error("daftar_ende.{$index}.nomor") is-invalid @enderror" name="daftar_ende[{{ $index }}][nomor]" placeholder="Nomor Ende (ex: 74:1-2)" value="{{ $endeItem['nomor'] ?? '' }}">
                                            <input type="text" class="form-control ende-catatan @error("daftar_ende.{$index}.catatan") is-invalid @enderror" name="daftar_ende[{{ $index }}][catatan]" placeholder="Catatan (ex: P.Pelean 3)" value="{{ $endeItem['catatan'] ?? '' }}">
                                            <button type="button" class="btn btn-outline-danger remove-item-btn" data-target-id="ende-item-{{ $index }}"><i class="fas fa-times"></i></button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addEndeRowBtn">
                                <i class="fas fa-plus"></i> Tambah Baris Ende
                            </button>
                            @error('daftar_ende')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('daftar_ende.*.nomor')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('daftar_ende.*.catatan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal untuk Konfirmasi Hapus --}}
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content animate__animated animate__zoomIn">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel"><i class="fas fa-exclamation-triangle me-2"></i> Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ibadah ini? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger-delete" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        // Floating Particles Background Script
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const numberOfParticles = 30;

            for (let i = 0; i < numberOfParticles; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.left = `${Math.random() * 100}vw`;
                particle.style.animationDuration = `${10 + Math.random() * 20}s`; // 10-30s
                particle.style.animationDelay = `${-Math.random() * 10}s`; // offset start times
                particlesContainer.appendChild(particle);
            }
        });

        $(document).ready(function() {
            let currentIbadahId = null; // Untuk menyimpan ID ibadah yang sedang diedit/dihapus

            const ibadahTableBody = $('#ibadahTableBody');
            const noDataState = $('#noDataState');
            const loadingState = $('#loadingState');
            const editIbadahModal = new bootstrap.Modal(document.getElementById('editIbadahModal'));
            const deleteConfirmationModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
            // viewDetailModal tidak lagi digunakan karena tombol "Lihat" langsung navigasi
            // const viewDetailModal = new bootstrap.Modal(document.getElementById('viewDetailModal'));

            const alertContainer = $('#alertContainer');
            const successAlert = $('#alertContainer .alert-success');
            const errorAlert = $('#alertContainer .alert-danger');
            const successMessageSpan = $('#successMessage');
            const errorMessageSpan = $('#errorMessage');
            const validationErrorsList = $('#validationErrors');

            // Function to show alert
            function showAlert(type, message, errors = null) {
                successAlert.hide();
                errorAlert.hide();
                validationErrorsList.empty().hide(); // Clear previous validation errors

                const alertDiv = type === 'success' ? successAlert : errorAlert;
                const messageSpan = type === 'success' ? successMessageSpan : errorMessageSpan;

                messageSpan.text(message);

                if (type === 'danger' && errors) {
                    for (const field in errors) {
                        if (errors.hasOwnProperty(field)) {
                            errors[field].forEach(errorText => {
                                validationErrorsList.append(`<li>${errorText}</li>`);
                            });
                        }
                    }
                    validationErrorsList.show();
                }

                alertDiv.fadeIn().delay(5000).fadeOut(); // Show for 5 seconds
            }

            // Helper function to format date
            function formatDate(dateString) {
                if (!dateString) return '';
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateString).toLocaleDateString('id-ID', options);
            }

            // Helper function to truncate text
            function truncateText(text, limit) {
                if (text && text.length > limit) {
                    return text.substring(0, limit) + '...';
                }
                return text;
            }

            // Function to add a new Ende item input field
            function addEndeInputField(nomor = '', catatan = '') {
                const endeInputsContainer = $('#endeInputsContainer'); // Corrected ID
                const newIndex = Date.now() + Math.floor(Math.random() * 1000); 
                const newId = `ende-item-${newIndex}`;

                const newItemHtml = `
                    <div class="input-group mb-2 ende-item" id="${newId}">
                        <span class="input-group-text">No. BE</span>
                        <input type="text" class="form-control ende-nomor" name="daftar_ende[${newIndex}][nomor]" placeholder="No. Ende (ex: 74:1-2)" value="${nomor}">
                        <input type="text" class="form-control ende-catatan" name="daftar_ende[${newIndex}][catatan]" placeholder="Catatan (ex: P.Pelean 3)" value="${catatan}">
                        <button type="button" class="btn btn-outline-danger remove-item-btn" data-target-id="${newId}"><i class="fas fa-times"></i></button>
                    </div>
                `;
                endeInputsContainer.append(newItemHtml);
                updateRemoveButtons(); // Call to update button states
            }

            function updateRemoveButtons() {
                const removeButtons = $('#endeInputsContainer').find('.remove-item-btn');
                removeButtons.each(function() {
                    $(this).prop('disabled', $('#endeInputsContainer').children().length <= 1);
                });
            }

            // Function to reset and (conditionally) initialize ende inputs
            function resetEndeInputs(initialData = null) {
                $('#endeInputsContainer').empty(); // Clear previous
                if (initialData && initialData.length > 0) {
                    initialData.forEach(ende => {
                        addEndeInputField(ende.nomor, ende.catatan);
                    });
                } else {
                    addEndeInputField(); // Add one empty row by default
                }
            }

            // Function to render table rows
            function renderTable(pageUrl = null) {
                ibadahTableBody.empty(); // Clear existing rows
                loadingState.show(); // Show loading indicator
                noDataState.hide(); // Hide no data state
                $('#paginationControls').empty().parent().hide(); // Hide pagination initially

                const requestUrl = pageUrl || '{{ route("ibadah.index") }}'

                $.ajax({
                    url: requestUrl,
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        const ibadahs = response.data || [];
                        const paginationLinks = response.links;

                        if (ibadahs.length === 0) {
                            noDataState.show();
                        } else {
                            ibadahs.forEach((ibadah, index) => {
                                const row = `
                                    <tr>
                                        <td>${index + 1 + (response.current_page - 1) * response.per_page}</td>
                                        <td>${formatDate(ibadah.tanggal_ibadah)}</td>
                                        <td>${ibadah.nama_minggu}</td>
                                        <td>${truncateText(ibadah.tema_khotbah, 70)}</td>
                                        <td>
                                            <div class="action-buttons">
                                                {{-- Tombol Lihat Detail: Langsung navigasi ke halaman detail penuh --}}
                                                <a href="/ibadah/${ibadah.id}" class="btn btn-info btn-sm" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                                <button type="button" class="btn btn-warning btn-sm edit-ibadah-btn"
                                                        data-bs-toggle="modal" data-bs-target="#editIbadahModal"
                                                        data-id="${ibadah.id}"
                                                        data-tanggal_ibadah="${ibadah.tanggal_ibadah}"
                                                        data-nama_minggu="${ibadah.nama_minggu}"
                                                        data-tema_khotbah="${ibadah.tema_khotbah}"
                                                        data-version_code="${ibadah.version_code}"
                                                        data-evangelium="${ibadah.evangelium}"
                                                        data-epistel="${ibadah.epistel}"
                                                        data-s_patik="${ibadah.s_patik}"
                                                        data-daftar_ende='${JSON.stringify(ibadah.daftar_ende || [])}'
                                                        title="Edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm delete-ibadah-btn"
                                                        data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                                        data-id="${ibadah.id}" title="Hapus">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                `;
                                ibadahTableBody.append(row);
                            });
                        }
                        loadingState.hide();
                        updatePagination(paginationLinks, response.current_page);
                    },
                    error: function(xhr, status, error) {
                        loadingState.hide();
                        showAlert('danger', 'Gagal memuat data ibadah: ' + (xhr.responseJSON ? xhr.responseJSON.message : xhr.responseText));
                        console.error("Error fetching data:", error, xhr.responseText);
                    }
                });
            }

            // Function to update pagination controls
            function updatePagination(links, currentPage) {
                const paginationControls = $('#paginationControls');
                paginationControls.empty();

                if (!links || links.length === 0) {
                    paginationControls.parent().hide();
                    return;
                }

                paginationControls.parent().show(); // Show pagination container

                links.forEach(link => {
                    let pageItemClass = 'page-item';
                    if (link.active) {
                        pageItemClass += ' active';
                    }
                    if (!link.url) {
                        pageItemClass += ' disabled';
                    }

                    let label = link.label;
                    if (label.includes('Previous')) {
                        label = '&laquo;';
                    } else if (label.includes('Next')) {
                        label = '&raquo;';
                    }

                    const pageLink = $(`<li class="${pageItemClass}"><a class="page-link" href="#" data-page-url="${link.url}">${label}</a></li>`);
                    paginationControls.append(pageLink);
                });

                // Add click listener for pagination links
                paginationControls.off('click', 'a.page-link').on('click', 'a.page-link', function(e) {
                    e.preventDefault();
                    const pageUrl = $(this).data('page-url');
                    if (pageUrl) {
                        renderTable(pageUrl); // Load data for the clicked page
                    }
                });
            }

            // Initial render of the table when the page loads
            renderTable();

            // Event listener for "Tambah Baris Ende" button (Corrected ID)
            $('#addEndeRowBtn').on('click', function() {
                addEndeInputField();
            });

            // Event listener for removing Ende items (delegated)
            $(document).on('click', '.remove-item-btn', function() {
                const targetId = $(this).data('target-id');
                $(`#${targetId}`).remove();
                updateRemoveButtons(); // Update button states after removal
            });

            // Handle "Tambah" button click
            $('#createIbadahBtn').on('click', function() {
                $('#editIbadahModalLabel').html('<i class="fas fa-plus-circle me-2"></i> Tambah Ibadah Baru');
                $('#ibadahForm')[0].reset(); // Clear form
                $('#ibadahId').val(''); // Clear ID
                $('#formMethod').val('POST'); // Set method untuk tambah
                
                // Clear and add initial empty ende field
                $('#endeInputsContainer').empty(); // Corrected ID
                addEndeInputField();

                // Clear any previous validation errors displayed in the modal
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                validationErrorsList.empty().hide();
            });

            // Handle "Edit" button click
            $(document).on('click', '.edit-ibadah-btn', function() {
                $('#editIbadahModalLabel').html('<i class="fas fa-edit me-2"></i> Edit Data Ibadah');
                $('#formMethod').val('PUT'); // Set method untuk edit

                const ibadahId = $(this).data('id');
                $('#ibadahId').val(ibadahId);
                $('#tanggalIbadah').val($(this).data('tanggal_ibadah'));
                $('#namaMinggu').val($(this).data('nama_minggu'));
                $('#temaKhotbah').val($(this).data('tema_khotbah'));
                $('#version_code').val($(this).data('version_code'));
                $('#evangelium').val($(this).data('evangelium'));
                $('#epistel').val($(this).data('epistel'));
                $('#sPatik').val($(this).data('s_patik'));

                // Clear any previous validation errors displayed in the modal
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                validationErrorsList.empty().hide();

                // Populate Ende items
                $('#endeInputsContainer').empty(); // Corrected ID
                const daftarEnde = $(this).data('daftar_ende'); // jQuery parses JSON data-* attributes automatically
                if (daftarEnde && daftarEnde.length > 0) {
                    daftarEnde.forEach(item => {
                        addEndeInputField(item.nomor || '', item.catatan || '');
                    });
                } else {
                    addEndeInputField(); // Add an empty one if none exist
                }
            });

            // Handle form submission (Add/Edit)
            $('#ibadahForm').on('submit', function(e) {
                e.preventDefault();

                const id = $('#ibadahId').val();
                const method = $('#formMethod').val(); // Will be 'POST' or 'PUT'
                const url = id ? `{{ url('/ibadah') }}/${id}` : '{{ route("ibadah.store") }}';
                
                const formData = new FormData(); // Buat FormData baru
                
                // Tambahkan semua input form kecuali daftar_ende yang akan di-handle terpisah
                $(this).find('input, textarea, select').not('[name^="daftar_ende"]').each(function() {
                    if (this.name) { // Pastikan elemen memiliki atribut 'name'
                        formData.append(this.name, $(this).val());
                    }
                });

                // Untuk PUT requests, FormData needs the _method override
                if (method === 'PUT') {
                    formData.append('_method', 'PUT');
                }

                // Kumpulkan daftar_ende dan tambahkan ke FormData sebagai array
                $('#endeInputsContainer').find('.ende-item').each(function(index) {
                    const nomorInput = $(this).find('.ende-nomor');
                    const catatanInput = $(this).find('.ende-catatan');
                    const nomor = nomorInput.val();
                    const catatan = catatanInput.val();
                    
                    // Hanya tambahkan jika ada nilai, untuk menghindari entri kosong
                    if (nomor || catatan) {
                        formData.append(`daftar_ende[${index}][nomor]`, nomor);
                        formData.append(`daftar_ende[${index}][catatan]`, catatan);
                    }
                });

                formData.append('_token', '{{ csrf_token() }}');


                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        showAlert('success', response.message);
                        editIbadahModal.hide();
                        renderTable();
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
                        let validationErrors = null;
                        if (xhr.responseJSON) {
                            errorMessage = xhr.responseJSON.message || errorMessage;
                            validationErrors = xhr.responseJSON.errors;
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText;
                        }
                        showAlert('danger', errorMessage, validationErrors);
                        console.error("Error submitting form:", error, xhr.responseText);
                    }
                });
            });

            // Handle "Delete" button click (opens confirmation modal)
            $(document).on('click', '.delete-ibadah-btn', function() {
                currentIbadahId = $(this).data('id');
            });

            // Handle confirmation of deletion
            $('#confirmDeleteBtn').on('click', function() {
                if (currentIbadahId) {
                    $.ajax({
                        url: `{{ url('/ibadah') }}/${currentIbadahId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            showAlert('success', response.message);
                            deleteConfirmationModal.hide();
                            renderTable();
                        },
                        error: function(xhr, status, error) {
                            let errorMessage = 'Gagal menghapus data. Silakan coba lagi.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            } else if (xhr.responseText) {
                                errorMessage = xhr.responseText;
                            }
                            showAlert('danger', errorMessage);
                            console.error("Error deleting data:", error, xhr.responseText);
                        }
                    });
                }
            });

            // Handle the "Tambahkan yang pertama!" link if no data
            const addNewIbadahLink = document.getElementById('addNewIbadahLink'); 
            if (addNewIbadahLink) {
                addNewIbadahLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('createIbadahBtn').click();
                });
            }

            // If there are validation errors from a failed submission (non-AJAX fallback), re-open the modal
            @if ($errors->any() || session('error'))
                $(window).on('load', function() { 
                    const editIbadahModalElement = document.getElementById('editIbadahModal');
                    const modalInstance = new bootstrap.Modal(editIbadahModalElement);
                    modalInstance.show();

                    const oldIbadahId = "{{ old('ibadah_id') }}";
                    if (oldIbadahId) {
                        $('#editIbadahModalLabel').html('<i class="fas fa-edit me-2"></i> Edit Data Ibadah');
                        $('#ibadahId').val(oldIbadahId);
                        $('#formMethod').val('PUT');
                    } else {
                        $('#editIbadahModalLabel').html('<i class="fas fa-plus-circle me-2"></i> Tambah Ibadah Baru');
                        $('#ibadahId').val('');
                        $('#formMethod').val('POST');
                    }

                    // Populate ende inputs from old data if validation failed
                    const oldDaftarEnde = @json(old('daftar_ende'));
                    if (oldDaftarEnde) {
                        $('#endeInputsContainer').empty();
                        oldDaftarEnde.forEach(item => {
                            addEndeInputField(item.nomor || '', item.catatan || '');
                        });
                    } else {
                        addEndeInputField(); 
                    }

                    // Add is-invalid class to fields that had validation errors
                    @foreach ($errors->keys() as $key)
                        @php
                            $fieldName = preg_replace('/^daftar_ende\.(\d+)\.(nomor|catatan)$/', 'daftar_ende[$1][$2]', $key);
                        @endphp
                        const errorInput = document.querySelector('[name="{{ $fieldName }}"]');
                        if (errorInput) {
                            errorInput.classList.add('is-invalid');
                            if (!errorInput.nextElementSibling || !errorInput.nextElementSibling.classList.contains('invalid-feedback')) {
                                $(errorInput).after(`<div class="invalid-feedback d-block">{{ $errors->first($key) }}</div>`);
                            }
                        }
                    @endforeach

                    @if (session('error'))
                        showAlert('danger', "{{ session('error') }}");
                    @endif
                });
            @endif

            updateRemoveButtons();
        });
    </script>
</body>
</html>