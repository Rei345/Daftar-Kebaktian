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
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg animate__animated animate__fadeInDown">
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