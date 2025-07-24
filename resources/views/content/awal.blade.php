<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParHKI - Alkitab & Buku Ende Online</title>
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

        /* Divine light animation */
        .divine-light {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 20%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
            animation: divine-pulse 8s ease-in-out infinite;
        }

        @keyframes divine-pulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.05); }
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
            animation: gentle-glow 3s ease-in-out infinite;
        }

        @keyframes gentle-glow {
            0%, 100% { text-shadow: 0 0 5px rgba(212, 175, 55, 0.3); }
            50% { text-shadow: 0 0 15px rgba(212, 175, 55, 0.6); }
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

        /* Hero Section dengan Cross Pattern */
        .hero-section {
            height: 70vh;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--deep-blue) 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
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
            opacity: 0.4;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: title-entrance 2s ease-out;
        }

        @keyframes title-entrance {
            0% {
                opacity: 0;
                transform: translateY(50px) scale(0.8);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            animation: subtitle-entrance 2s ease-out 0.5s both;
        }

        @keyframes subtitle-entrance {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 0.9;
                transform: translateY(0);
            }
        }

        .btn-divine {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn-divine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-divine:hover::before {
            left: 100%;
        }

        .btn-divine:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            color: white;
            text-decoration: none;
        }

        /* Content Section */
        .content-section {
            margin-top: -5rem;
            position: relative;
            z-index: 10;
            padding: 2rem 0 4rem;
        }

        /* Service Cards */
        .service-card {
            background: white;
            border-radius: 25px;
            box-shadow: var(--shadow-soft);
            border: none;
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-gold), var(--primary-blue));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-strong);
        }

        .icon-box {
            width: 100px;
            height: 100px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2.5rem;
            color: white;
            position: relative;
            transition: all 0.3s ease;
        }

        .icon-box.bible {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .icon-box.ende {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .icon-box.ibadah {
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }

        .service-card:hover .icon-box {
            transform: scale(1.1) rotate(5deg);
            animation: icon-pulse 1s ease-in-out;
        }

        @keyframes icon-pulse {
            0%, 100% { transform: scale(1.1) rotate(5deg); }
            50% { transform: scale(1.2) rotate(-5deg); }
        }

        .service-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .service-description {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .btn-service {
            background: transparent;
            border: 2px solid var(--primary-gold);
            color: var(--primary-gold);
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-service:hover {
            background: var(--primary-gold);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
            text-decoration: none;
        }

        /* Worship Songs Section */
        .worship-section {
            background: white;
            border-radius: 25px;
            box-shadow: var(--shadow-medium);
            padding: 3rem;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
        }

        .worship-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.02) 0%, rgba(30, 58, 138, 0.02) 100%);
            pointer-events: none;
        }

        .worship-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 2rem;
            position: relative;
        }

        .worship-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary-gold);
            border-radius: 2px;
        }

        .song-item {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
            text-decoration: none;
            color: var(--text-dark);
            display: block;
            position: relative;
            overflow: hidden;
        }

        .song-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-gold);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .song-item:hover::before {
            transform: scaleY(1);
        }

        .song-item:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-medium);
            color: var(--text-dark);
            text-decoration: none;
            background: white;
        }

        .song-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-blue);
        }

        .song-note {
            font-size: 0.9rem;
            color: var(--text-light);
            font-style: italic;
        }

        .song-icon {
            color: var(--primary-gold);
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--deep-blue) 0%, var(--primary-blue) 100%);
            color: white;
            padding: 3rem 0 2rem;
            margin-top: 4rem;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary-gold), transparent);
        }

        .footer-content {
            text-align: center;
            position: relative;
        }

        .footer-icon {
            font-size: 2rem;
            color: var(--primary-gold);
            margin-bottom: 1rem;
            animation: gentle-glow 3s ease-in-out infinite;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .service-card {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }
            
            .worship-section {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .service-card {
                padding: 1.5rem;
            }
            
            .content-section {
                margin-top: -3rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-section {
                height: 60vh;
            }
            
            .worship-section {
                padding: 1.5rem;
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

        /* Entrance animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
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
                        <a class="nav-link" href="{{ route('ibadah.index') }}">
                            <i class="fas fa-calendar-alt me-1"></i> Manajemen Ibadah
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="divine-light"></div>
        <div class="container text-center">
            <div class="hero-content">
                <h1 class="hero-title">Selamat Datang di ParHKI</h1>
                <p class="hero-subtitle mt-3">Panduan digital Alkitab, Buku Ende, dan Liturgi Ibadah yang memberkati perjalanan rohani Anda</p>
                <div class="mt-4">
                    <i class="fas fa-cross" style="font-size: 2rem; opacity: 0.7; margin-bottom: 2rem; animation: gentle-glow 3s ease-in-out infinite;"></i>
                </div>
                <a href="#content" class="btn-divine animate__animated animate__pulse animate__infinite">
                    <i class="fas fa-heart me-2"></i> Jelajahi Berkat Tuhan
                </a>
            </div>
        </div>
    </header>

    <!-- Content Section -->
    <main id="content" class="content-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 animate-on-scroll">
                    <div class="service-card">
                        <div class="icon-box bible">
                            <i class="fas fa-book-bible"></i>
                        </div>
                        <h5 class="service-title">Alkitab Digital</h5>
                        <p class="service-description">Jelajahi Firman Tuhan dengan mudah. Cari ayat-ayat suci dalam berbagai versi dan temukan inspirasi untuk kehidupan sehari-hari Anda.</p>
                        <a href="{{ route('index.alkitab') }}" class="btn-service">
                            Baca Firman <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 animate-on-scroll" style="animation-delay: 0.2s;">
                    <div class="service-card">
                        <div class="icon-box ende">
                            <i class="fas fa-music"></i>
                        </div>
                        <h5 class="service-title">Buku Ende</h5>
                        <p class="service-description">Nikmati kekayaan lagu rohani tradisional. Temukan lirik lengkap dengan melodi yang menyentuh jiwa dan memperkuat iman.</p>
                        <a href="{{ route('index.ende') }}" class="btn-service">
                            Bernyanyi Bersama <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 animate-on-scroll" style="animation-delay: 0.4s;">
                    <div class="service-card">
                        <div class="icon-box ibadah">
                            <i class="fas fa-praying-hands"></i>
                        </div>
                        <h5 class="service-title">Manajemen Ibadah</h5>
                        <p class="service-description">Persiapkan liturgi ibadah yang bermakna. Kelola perayaan hari raya dan ibadah rutin dengan panduan yang lengkap dan terstruktur.</p>
                        <a href="{{ route('ibadah.index') }}" class="btn-service">
                            Kelola Ibadah <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Worship Songs Section -->
            <div class="worship-section animate-on-scroll" style="animation-delay: 0.6s;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="worship-title mb-0">
                        <i class="fas fa-cross me-2" style="color: var(--primary-gold);"></i>
                        Lagu Ibadah Hari Ini
                    </h3>
                    <a href="{{ route('ibadah.show', $ibadah->id) }}" class="btn btn-outline-primary rounded-pill">
                        <i class="fas fa-eye me-2"></i> Lihat Selengkapnya
                    </a>
                </div>
                
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                    @foreach ($ibadah->daftar_ende as $index => $endeItem)
                        @if (isset($endeItem['nomor']))
                            <div class="col">
                                <a class="song-item" href="{{ route('ende.search', ['nomor' => $endeItem['nomor']]) }}">
                                    <i class="fas fa-music song-icon"></i>
                                    <span class="song-number">{{ $endeItem['nomor'] }}</span>
                                    @if (!empty($endeItem['catatan']))
                                        ({{ $endeItem['catatan'] }})
                                    @endif
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-icon">
                    <i class="fas fa-cross"></i>
                </div>
                <p class="mb-2">&copy; 2024 ParHKI. Semua hak dilindungi undang-undang.</p>
                <p class="mb-0" style="opacity: 0.8;">
                    <i class="fas fa-heart" style="color: var(--primary-gold);"></i>
                    Dibuat dengan kasih untuk kemajuan Kerajaan Allah
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Particles Animation
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 60;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 15) + 's';
                
                // Random particle shapes for spiritual theme
                if (Math.random() > 0.7) {
                    particle.innerHTML = '✦';
                    particle.style.background = 'transparent';
                    particle.style.color = 'rgba(212, 175, 55, 0.4)';
                    particle.style.fontSize = '8px';
                }
                
                particlesContainer.appendChild(particle);
            }
        }

        // Scroll Animation Observer
        function initScrollAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        }

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.backdropFilter = 'blur(25px)';
                navbar.style.boxShadow = 'var(--shadow-medium)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
                navbar.style.boxShadow = 'var(--shadow-soft)';
            }
        });

        // Service cards hover effects
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.background = 'linear-gradient(135deg, #ffffff 0%, #fefcf7 100%)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.background = 'white';
            });
        });

        // Divine light animation trigger
        function triggerDivineLight() {
            const divineLight = document.querySelector('.divine-light');
            if (divineLight) {
                divineLight.style.animation = 'divine-pulse 3s ease-in-out';
                setTimeout(() => {
                    divineLight.style.animation = 'divine-pulse 8s ease-in-out infinite';
                }, 3000);
            }
        }

        // Random spiritual quotes (optional enhancement)
        const spiritualQuotes = [
            "Percayalah kepada TUHAN dengan segenap hatimu",
            "Tuhan adalah gembalaku, takkan kekurangan aku",
            "Segala perkara dapat kutanggung di dalam Dia yang memberi kekuatan kepadaku",
            "Kasih itu sabar; kasih itu murah hati",
            "Berbahagialah orang yang percaya kepada TUHAN"
        ];

        // Add random quote to hero section (optional)
        function addInspirationalQuote() {
            const heroContent = document.querySelector('.hero-content');
            if (heroContent && Math.random() > 0.5) {
                const quote = spiritualQuotes[Math.floor(Math.random() * spiritualQuotes.length)];
                const quoteElement = document.createElement('p');
                quoteElement.className = 'mt-3 fst-italic';
                quoteElement.style.opacity = '0.8';
                quoteElement.style.fontSize = '1rem';
                quoteElement.innerHTML = `<i class="fas fa-quote-left me-2"></i>"${quote}"<i class="fas fa-quote-right ms-2"></i>`;
                heroContent.insertBefore(quoteElement, heroContent.querySelector('.mt-4'));
            }
        }

        // Enhanced loading animations
        function enhanceLoadingExperience() {
            // Add staggered animation to service cards
            document.querySelectorAll('.service-card').forEach((card, index) => {
                card.style.animationDelay = `${index * 0.2}s`;
                card.classList.add('animate__animated', 'animate__fadeInUp');
            });

            // Add typing effect to hero title (optional)
            const heroTitle = document.querySelector('.hero-title');
            if (heroTitle) {
                const text = heroTitle.textContent;
                heroTitle.textContent = '';
                let i = 0;
                
                function typeWriter() {
                    if (i < text.length) {
                        heroTitle.textContent += text.charAt(i);
                        i++;
                        setTimeout(typeWriter, 100);
                    }
                }
                
                setTimeout(typeWriter, 1000);
            }
        }

        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-section');
            const speed = scrolled * 0.5;
            
            if (parallax) {
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Add gentle floating animation to icons
        function addFloatingAnimation() {
            const icons = document.querySelectorAll('.icon-box i');
            icons.forEach((icon, index) => {
                icon.style.animation = `gentle-float 3s ease-in-out infinite ${index * 0.5}s`;
            });
        }

        // Gentle floating keyframes (add to CSS)
        const floatingStyle = document.createElement('style');
        floatingStyle.textContent = `
            @keyframes gentle-float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-8px); }
            }
        `;
        document.head.appendChild(floatingStyle);

        // Initialize all enhancements
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            initScrollAnimations();
            addInspirationalQuote();
            enhanceLoadingExperience();
            addFloatingAnimation();
            
            // Trigger divine light animation after page load
            setTimeout(triggerDivineLight, 2000);
        });

        // Add keyboard navigation support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                const focused = document.activeElement;
                if (focused.classList.contains('btn-service') || focused.classList.contains('btn-divine')) {
                    focused.click();
                }
            }
        });

        // Performance optimization: Throttle scroll events
        function throttle(func, limit) {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            }
        }

        // Apply throttling to scroll events
        window.addEventListener('scroll', throttle(function() {
            // Scroll-based animations here
        }, 16)); // ~60fps

    </script>
</body>
</html>