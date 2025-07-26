<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bible - ParHKI</title>
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

        /* Search Section */
        .search-section {
            padding: 3rem 0;
            background: var(--warm-white);
        }

        .search-card {
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

        .search-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-strong);
        }

        .search-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-select, .form-control {
            border: 2px solid rgba(212, 175, 55, 0.2);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-select:focus, .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
            background: white;
        }

        .btn-search {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .btn-search:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            background: linear-gradient(135deg, #b8941f 0%, var(--primary-gold) 100%);
        }

        .btn-search:active {
            transform: translateY(0);
        }

        /* Results Section */
        .results-section {
            padding: 3rem 0;
            background: var(--soft-gray);
        }

        .verse-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-soft);
            border: none;
            margin-bottom: 2rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .verse-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
        }

        .verse-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 100%);
            color: white;
            padding: 1.5rem 2rem;
            margin: 0;
        }

        .verse-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin: 0;
            font-weight: 600;
        }

        .verse-content {
            padding: 2rem;
            font-size: 1.3rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .verse-number {
            background: var(--primary-gold);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-weight: 600;
            margin-right: 1rem;
            display: inline-block;
            font-size: 0.9rem;
        }

        .verse-text {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            color: var(--text-dark);
        }

        /* Alert Styles */
        .alert {
            border-radius: 15px;
            border: none;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-soft);
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
        }

        .alert-info {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1d4ed8;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
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

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .verse-content {
                font-size: 1.1rem;
            }
            
            .search-card {
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
            
            .verse-content {
                font-size: 1rem;
                padding: 1.5rem;
            }
            
            .search-card {
                padding: 1.5rem;
                margin-top: -2rem;
            }
            
            .form-select, .form-control {
                padding: 0.8rem 1rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .verse-content {
                font-size: 0.9rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
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
    <!-- Floating Particles Background -->
    <div class="bg-particles" id="particles"></div>

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
                        <a class="nav-link active" aria-current="page" href="{{ route('index.alkitab') }}">
                            <i class="fas fa-book-open me-1"></i> Alkitab
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.ende') }}">
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
                        Cari Firman Tuhan
                    </h1>
                    <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">
                        Temukan ayat-ayat suci yang menginspirasi dan memperkuat iman Anda
                    </p>
                    <div class="animate__animated animate__fadeInUp animate__delay-2s">
                        <i class="fas fa-scroll" style="font-size: 3rem; opacity: 0.7;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card search-card animate__animated animate__fadeInUp animate__delay-1s">
                        <h2 class="search-title">
                            <i class="fas fa-search me-2" style="color: var(--primary-gold);"></i>
                            Pencarian Alkitab
                        </h2>
                        
                        <form id="searchForm" action="{{ route('alkitab.search') }}" method="GET">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <select class="form-select" id="version_code" name="version_code">
                                        @foreach ($versions as $code => $name)
                                            <option value="{{ $code }}" {{ $code == $selectedVersion ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="passage_input" name="passage_input" class="form-control" 
                                           placeholder="Contoh: Yohanes 3:16 atau Roma 8:28"
                                           value="{{ old('passage_input', $passageInput ?? '') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-search w-100" type="submit">
                                        <i class="fas fa-search me-2"></i>
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Error Messages -->
                        @error('passage_input')
                            <div class="alert alert-danger mt-3 animate__animated animate__fadeInUp">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        
                        @if (session('error'))
                            <div class="alert alert-danger mt-3 animate__animated animate__fadeInUp">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        @error('api_error')
                            <div class="alert alert-danger mt-3 animate__animated animate__fadeInUp">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        
                        @if (session('error_book_list'))
                            <div class="alert alert-warning mt-3 animate__animated animate__fadeInUp">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ session('error_book_list') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Loading Section -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
        <p>Mencari firman Tuhan...</p>
    </div>

    <!-- Results Section -->
    @if (!empty($verses))
        <section class="results-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="verse-card animate__animated animate__fadeInUp">
                            <div class="verse-header">
                                <h3 class="verse-title">
                                    <i class="fas fa-bookmark me-2"></i>
                                    {{ $passageInput }}
                                </h3>
                            </div>
                            <div class="verse-content">
                                @foreach ($verses as $index => $verse)
                                    <div class="mb-4 animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 0.2 }}s;">
                                        <span class="verse-number">{{ $verse['verse'] }}</span>
                                        <span class="verse-text">{{ $verse['content'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif ($passageInput)
        <section class="results-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="alert alert-info animate__animated animate__fadeInUp">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Tidak ditemukan</strong><br>
                            Tidak ada ayat yang ditemukan untuk pencarian "{{ $passageInput }}". 
                            Silakan periksa ejaan atau coba dengan format yang berbeda.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Bootstrap JS -->
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

        // Form submission with loading
        document.getElementById('searchForm').addEventListener('submit', function() {
            document.getElementById('loading').classList.add('active');
        });

        // Initialize particles
        createParticles();

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

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

        // Add typing effect to placeholder
        const input = document.getElementById('passage_input');
        const placeholders = [
            'Yohanes 3:16',
            'Roma 8:28',
            'Mazmur 23:1',
            'Filipi 4:13',
            'Matius 5:3-12',
            'Galatia 2:20'
        ];
        
        let currentPlaceholder = 0;
        
        function changePlaceholder() {
            if (input.value === '') {
                input.placeholder = `Contoh: ${placeholders[currentPlaceholder]}`;
                currentPlaceholder = (currentPlaceholder + 1) % placeholders.length;
            }
        }
        
        setInterval(changePlaceholder, 3000);
        
        // Add focus effects
        document.querySelectorAll('.form-control, .form-select').forEach(element => {
            element.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            element.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>