<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - ParHKI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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

        body {
            background: linear-gradient(135deg, #f0f3f7 0%, #e8f2ff 100%);
            min-height: 100vh;
            animation: backgroundShift 20s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { background: linear-gradient(135deg, #f0f3f7 0%, #e8f2ff 100%); }
            50% { background: linear-gradient(135deg, #f7f0f3 0%, #fff2e8 100%); }
        }

        .card {
            border: none;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
            border-radius: 0.75rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        /* navbar */
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
            transform: translateY(-2px) scale(1.05);
            color: var(--primary-gold) !important;
        }

        .navbar-brand i {
            color: var(--primary-gold);
            margin-right: 0.5rem;
            font-size: 1.6rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
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

        .image-text-section {
            background: linear-gradient(135deg, var(--warm-white) 0%, var(--light-gold) 100%);
            border: 1px solid rgba(212, 175, 55, 0.2);
            position: relative;
            overflow: hidden;
        }

        .image-text-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .image-text-section img {
            width: 100px;
            height: auto;
            object-fit: contain;
            max-width: 100%;
            display: block;
            border-radius: 12px;
            transition: all 0.3s ease;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
        }

        .image-text-section img:hover {
            transform: scale(1.05) rotate(2deg);
        }

        .card-body-compact {
            padding: 0.75rem !important;
        }

        .info-boxes .card {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #2563eb 100%);
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .info-boxes .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .info-boxes .card:hover::before {
            transform: translateX(100%);
        }

        /* Improved Theme Display */
        .theme-display {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            text-align: center;
            color: var(--primary-blue);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            padding: 1rem;
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease-out;
            line-height: 1.3;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .theme-display:hover {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }

        @media (max-width: 768px) {
            .fs-1 {
                font-size: 1.8rem !important;
            }
            .fs-2 {
                font-size: 1.3rem !important;
            }
            .image-text-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .image-text-section img {
                margin-bottom: 0.75rem;
            }
            .image-text-section .flex-fill {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
            .theme-display {
                font-size: 1.5rem !important;
            }
        }

        @media (max-width: 576px) {
            .fs-1 {
                font-size: 1.4rem !important;
            }
            .fs-2 {
                font-size: 1.1rem !important;
            }
            .info-boxes .card {
                padding: 0.5rem !important;
            }
            .info-boxes .fw-bold {
                font-size: 1.1rem !important;
            }
            .list-unstyled li {
                margin-bottom: 0.5rem !important;
            }
            .list-unstyled a.fs-2 {
                font-size: 1.1rem !important;
            }
            .row-cols-md-3 .col {
                padding-bottom: 0.25rem;
            }
            .row-cols-md-3 a.fs-2 {
                font-size: 1.1rem !important;
            }
            .navbar-brand {
                font-size: 1.5rem;
            }
            .theme-display {
                font-size: 1.2rem !important;
            }
        }

        /* Section headers */
        .section-header {
            font-family: 'Playfair Display', serif;
            color: var(--primary-blue);
            padding-bottom: 0.3rem;
            margin-bottom: 1rem;
            position: relative;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-gold);
            animation: expandLine 0.8s ease-out forwards;
        }

        @keyframes expandLine {
            0% { width: 0; }
            100% { width: 50px; }
        }

        .section-header:hover::after {
            animation: expandLineHover 0.3s ease-out forwards;
        }

        @keyframes expandLineHover {
            0% { width: 50px; }
            100% { width: 100px; }
        }

        /* Enhanced list items */
        .list-unstyled a {
            display: block;
            padding: 0.2rem 0.6rem;
            margin-bottom: 0.2rem;
            background: linear-gradient(135deg, white 0%, rgba(212, 175, 55, 0.05) 100%);
            border-radius: 12px;
            border-left: 3px solid var(--primary-gold);
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
            position: relative;
            overflow: hidden;
        }

        .list-unstyled a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .list-unstyled a:hover::before {
            left: 100%;
        }

        .list-unstyled a:hover {
            transform: translateX(10px);
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            color: white !important;
            box-shadow: var(--shadow-medium);
        }

        .list-unstyled a:hover i {
            color: white !important;
            transform: scale(1.2) rotate(90deg);
        }

        /* ENDE section styling */
        .ende-grid a {
            display: block;
            padding: 0.2rem;
            background: linear-gradient(135deg, white 0%, rgba(23, 162, 184, 0.05) 100%);
            border-radius: 12px;
            border-left: 3px solid #17a2b8;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
            margin-bottom: 0.2rem;
            position: relative;
            overflow: hidden;
        }

        .ende-grid a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(23, 162, 184, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .ende-grid a:hover::before {
            left: 100%;
        }

        .ende-grid a:hover {
            transform: translateY(-5px);
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white !important;
            box-shadow: var(--shadow-medium);
        }

        .ende-grid a:hover i {
            color: white !important;
            animation: musicBounce 0.6s ease;
        }

        @keyframes musicBounce {
            0%, 20%, 53%, 80%, 100% {
                transform: translate3d(0,0,0) rotate(0deg);
            }
            40%, 43% {
                transform: translate3d(0,-10px,0) rotate(10deg);
            }
            70% {
                transform: translate3d(0,-5px,0) rotate(-5deg);
            }
            90% {
                transform: translate3d(0,-2px,0) rotate(2deg);
            }
        }

        /* Smooth entrance animations */
        .info-boxes .card {
            animation: slideInFromTop 0.6s ease-out;
        }

        .info-boxes .card:nth-child(1) { animation-delay: 0.1s; }
        .info-boxes .card:nth-child(2) { animation-delay: 0.2s; }
        .info-boxes .card:nth-child(3) { animation-delay: 0.3s; }

        @keyframes slideInFromTop {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card.p-3 {
            animation: slideInFromLeft 0.8s ease-out;
        }

        .card.p-3:nth-of-type(even) {
            animation: slideInFromRight 0.8s ease-out;
        }

        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInFromRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Loading animation for dynamic content */
        .loading-pulse {
            animation: contentPulse 2s infinite;
        }

        @keyframes contentPulse {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg animate__animated animate__fadeInDown">
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
                        <a class="nav-link" href="{{ route('index.alkitab') }}"><i class="fas fa-book-open me-1"></i> Alkitab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index.ende') }}"><i class="fas fa-music me-1"></i> Buku Ende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ibadah.index') }}"><i class="fas fa-calendar-alt me-1"></i> Manajemen Ibadah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid py-3">
        
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @if (isset($ibadah) && $ibadah)
            <div class="row g-1 mb-2 info-boxes">
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center">
                        <div class="fw-bold fs-2 text-center" id="displayHariMinggu">
                            @if (isset($ibadah->tanggal_ibadah))
                                {{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->locale('id')->translatedFormat('l') }}
                            @else
                                HARI
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center">
                        <div class="fw-bold fs-2 text-center" id="displayNamaMinggu">{{ $ibadah->nama_minggu }}</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body-compact h-100 d-flex align-items-center justify-content-center">
                        <div class="fw-bold fs-2 text-center" id="displayTanggal">{{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->locale('id')->translatedFormat('d F Y') }}</div>
                    </div>
                </div>
            </div>

            <div class="card p-3 mb-2 image-text-section d-flex flex-md-row align-items-center">
                <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="me-md-3 mb-2 mb-md-0">
                <div class="theme-display flex-fill fs-1" id="displayTema">
                    {{ $ibadah->tema_khotbah }}
                </div>
                <img src="{{ url('assets/img/hki.jpeg') }}" alt="Gambar HKI" class="ms-md-3 mt-2 mt-md-0 d-none d-md-block">
            </div>

            <div class="card p-3 mb-2">
                <h3 class="section-header fw-bold mb-2 fs-3">
                    <i class="fas fa-book-open me-2" style="color: var(--primary-gold);"></i>
                    SIJAHAON
                </h3>
                <ul class="list-unstyled">
                    <li">
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('alkitab-home.search', ['version_code' => $ibadah->version_code, 'passage_input' => $ibadah->evangelium]) }}">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displayEvangelium">Evangelium: {{ $ibadah->evangelium }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('alkitab-home.search', ['version_code' => $ibadah->version_code, 'passage_input' => $ibadah->epistel]) }}">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displayEpistel">Epistel: {{ $ibadah->epistel }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('alkitab-home.search', ['version_code' => $ibadah->version_code, 'passage_input' => $ibadah->s_patik]) }}">
                            <i class="fas fa-chevron-right me-2 text-primary"></i> <span id="displaySPatik">S.Patik: {{ $ibadah->s_patik }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card p-3 mb-2">
                <h3 class="section-header fw-bold mb-2 fs-3">
                    <i class="fas fa-music me-2" style="color: #17a2b8;"></i>
                    ENDE
                </h3>
                <div class="row row-cols-1 row-cols-md-3 g-2 ende-grid" id="displayEndeList">
                    @foreach ($ibadah->daftar_ende as $index => $endeItem) 
                        @if (isset($endeItem['nomor'])) 
                            <div class="col">
                                <a class="fs-2 fw-semibold text-decoration-none text-reset" href="{{ route('ende-home.search', ['nomor' => $endeItem['nomor']]) }}">
                                    <i class="fas fa-music me-2 text-info"></i> 
                                    {{ ($index + 1) }}. {{ $endeItem['nomor'] }}
                                    @if (!empty($endeItem['catatan']))
                                    <small class="text-muted">({{ $endeItem['catatan'] }})</small>
                                    @endif
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        @else
            <div class="alert alert-info text-center" role="alert">
                <h4 class="alert-heading">Selamat Datang di ParHKI!</h4>
                <p>Silakan pilih ibadah dari daftar untuk melihat detailnya.</p>
                <hr>
                <p class="mb-0">Atau Anda dapat kembali ke <a href="{{ route('home.index') }}" class="alert-link">daftar ibadah</a>.</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // Add smooth loading effect for dynamic content
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate loading effect
            const dynamicElements = document.querySelectorAll('#displayTema, #displayEvangelium, #displayEpistel, #displaySPatik');
            dynamicElements.forEach((element, index) => {
                element.style.opacity = '0';
                setTimeout(() => {
                    element.style.transition = 'opacity 0.5s ease-in-out';
                    element.style.opacity = '1';
                }, index * 200);
            });

            // Add intersection observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                    }
                });
            }, observerOptions);

            // Observe cards for scroll animations
            document.querySelectorAll('.card').forEach(card => {
                observer.observe(card);
            });
        });

        // Add click ripple effect for interactive elements
        function createRipple(event) {
            const button = event.currentTarget;
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left - size / 2;
            const y = event.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            button.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        }

        // Add ripple effect to clickable elements
        document.addEventListener('DOMContentLoaded', function() {
            const style = document.createElement('style');
            style.textContent = `
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.4);
                    transform: scale(0);
                    animation: rippleAnimation 0.6s linear;
                    pointer-events: none;
                }
                
                @keyframes rippleAnimation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);

            // Add ripple to buttons and links
            document.querySelectorAll('a, .card').forEach(element => {
                element.style.position = 'relative';
                element.style.overflow = 'hidden';
                element.addEventListener('click', createRipple);
            });
        });
    </script>
</body>
</html>