<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ParHKI - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    <style>
        
    </style>
</head>
<body>

    <!-- Floating Particles Background -->
    <div class="bg-particles" id="particles"></div>
    
    <!-- Cross Pattern Overlay -->
    <div class="cross-pattern"></div>
    
    <!-- Divine Light -->
    <div class="divine-light"></div>

    <!-- Back to Home Button -->
    <div class="back-home">
        <a href="{{ url()->previous() }}" class="btn-back">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
        </a>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card animate-entrance">
            <div class="login-header">
                <h1 class="login-brand">
                    <i class="fas fa-dove floating-icon"></i> ParHKI
                </h1>
                <p class="login-subtitle">Platform digital untuk perjalanan rohani Anda</p>
                <h2 class="login-welcome">Masuk ke Akun Anda</h2>
                <div class="mt-3">
                    <i class="fas fa-cross" style="font-size: 1.5rem; opacity: 0.7; color: var(--primary-gold); animation: gentle-glow 3s ease-in-out infinite;"></i>
                </div>
            </div>

            <!-- Success Alert (hidden by default) -->
            <div class="alert alert-success d-none" id="successAlert">
                <i class="fas fa-check-circle me-2"></i>
                <span id="successMessage">Login berhasil! Mengarahkan ke dashboard...</span>
            </div>

            <form id="loginForm" method="post" action="{{ route('login.process') }}">
                @csrf
                <div class="form-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi" required>
                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                </div>

                <div class="form-options">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                        <label class="form-check-label" for="rememberMe"> Ingat saya</label>
                    </div>
                    <a href="#" class="forgot-link">
                        Lupa kata sandi?
                    </a>
                </div>

                <button type="submit" class="btn-login" id="loginBtn">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    <span id="loginText">Masuk</span>
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Particles Animation (same as original)
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

        // Password toggle functionality
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = this;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });

        // Form validation
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validatePassword(password) {
            return password.length >= 6;
        }

        function showError(fieldId, errorId, show = true) {
            const field = document.getElementById(fieldId);
            const error = document.getElementById(errorId);
            
            if (show) {
                field.classList.add('error');
                error.classList.add('show');
            } else {
                field.classList.remove('error');
                error.classList.remove('show');
            }
        }

        function showSuccess(message) {
            const alert = document.getElementById('successAlert');
            const messageElement = document.getElementById('successMessage');
            messageElement.textContent = message;
            alert.classList.remove('d-none');
            alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // Real-time validation
        document.getElementById('email').addEventListener('blur', function() {
            const email = this.value;
            if (email && !validateEmail(email)) {
                showError('email', 'emailError', true);
            } else {
                showError('email', 'emailError', false);
            }
        });

        document.getElementById('password').addEventListener('blur', function() {
            const password = this.value;
            if (password && !validatePassword(password)) {
                showError('password', 'passwordError', true);
            } else {
                showError('password', 'passwordError', false);
            }
        });

        // Navigation functions (placeholders)
        function showForgotPassword() {
            // window.location.href = '/forgot-password'; // Uncomment for actual navigation
            alert('Fitur lupa kata sandi akan segera tersedia.');
        }

        // Enhanced form interactions
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.input-icon').style.color = 'var(--primary-blue)';
                this.parentElement.querySelector('.input-icon').style.transform = 'translateY(-50%) scale(1.1)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.input-icon').style.color = 'var(--primary-gold)';
                this.parentElement.querySelector('.input-icon').style.transform = 'translateY(-50%) scale(1)';
            });
        });

        // Keyboard accessibility
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const loginForm = document.getElementById('loginForm');
                const activeElement = document.activeElement;
                
                if (activeElement.tagName === 'INPUT' && activeElement.form === loginForm) {
                    e.preventDefault();
                    loginForm.dispatchEvent(new Event('submit'));
                }
            }
        });

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Add entrance animation delay to form elements
            const formElements = document.querySelectorAll('.form-group, .form-options, .btn-login');
            formElements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, 200 + (index * 100));
            });
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
    </script>
</body>
</html>