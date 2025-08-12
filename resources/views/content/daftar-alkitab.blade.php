<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bible - ParHKI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/daftar-alkitab.css') }}">
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