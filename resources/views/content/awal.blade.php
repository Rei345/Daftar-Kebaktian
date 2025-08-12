<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParHKI - Alkitab & Buku Ende Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/awal.css') }}">
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