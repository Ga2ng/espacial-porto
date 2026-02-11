<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Espacial Artwork - Solusi IT Profesional')</title>
    <meta name="description" content="@yield('description', 'Espacial Artwork menyediakan layanan Pemetaan, Develop Website, Mobile Apps, dan Consultant IT yang profesional.')">
    <meta name="keywords" content="@yield('keywords', 'pemetaan, survey, develop website, mobile apps, consultant IT, jasa IT, pengembangan website, aplikasi mobile')">
    <meta name="author" content="Espacial Artwork">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Espacial Artwork - Solusi IT Profesional')">
    <meta property="og:description" content="@yield('description', 'Espacial Artwork menyediakan layanan Pemetaan, Develop Website, Mobile Apps, dan Consultant IT yang profesional.')">
    <meta property="og:image" content="@yield('og_image', asset('logo_ea.png'))">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Espacial Artwork - Solusi IT Profesional')">
    <meta property="twitter:description" content="@yield('description', 'Espacial Artwork menyediakan layanan Pemetaan, Develop Website, Mobile Apps, dan Consultant IT yang profesional.')">
    <meta property="twitter:image" content="@yield('og_image', asset('logo_ea.png'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --primary-dark: #0a58ca;
            --primary-light: #6ea8fe;
            --secondary-color: #3b82f6;
            --accent-color: #20c997;
            --dark-color: #1f2937;
            --light-color: #f9fafb;
            /* Navbar top: dark theme agar logo biru menonjol */
            --nav-dark-bg: #0f172a;
            --nav-dark-bg-end: #1e293b;
            --nav-dark-accent: rgba(13, 110, 253, 0.25);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark-color);
        }
        
        /* Modern Navbar with Glassmorphism */
        .navbar-modern {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 1rem 0;
        }

        /* State di atas (belum scroll): tema gelap slate – logo biru menonjol, teks putih */
        .navbar-modern.transparent {
            background: linear-gradient(135deg, var(--nav-dark-bg) 0%, var(--nav-dark-bg-end) 50%, #0f172a 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 2px solid rgba(13, 110, 253, 0.35);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.2), 0 1px 0 0 rgba(255, 255, 255, 0.03) inset;
        }

        .navbar-modern.transparent .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .navbar-modern.transparent .nav-link:hover {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
        }

        .navbar-modern.transparent .nav-link.active {
            color: #fff !important;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            box-shadow: 0 2px 12px rgba(13, 110, 253, 0.4);
            border-radius: 50px;
        }

        /* Logo biru tetap; teks brand putih kontras di atas gelap */
        .navbar-modern.transparent .navbar-brand {
            color: #fff !important;
        }

        .navbar-modern.transparent .navbar-brand img {
            filter: drop-shadow(0 0 8px var(--nav-dark-accent));
        }

        .navbar-modern.transparent .navbar-brand span {
            -webkit-text-fill-color: #fff;
            background: none;
        }

        .navbar-modern.transparent .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.4);
        }

        .navbar-modern.transparent .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Scrolled state - Glassmorphism */
        .navbar-modern.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(13, 110, 253, 0.1);
            padding: 0.75rem 0;
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.4rem;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: translateX(3px);
        }

        .navbar-brand img {
            height: 45px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: rotate(-5deg) scale(1.05);
        }

        .navbar-brand span {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 900;
        }
        
        /* Navigation Links */
        .navbar-nav {
            gap: 0.5rem;
        }

        .nav-link {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--dark-color) !important;
            padding: 0.6rem 1.25rem !important;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
            z-index: -1;
            border-radius: 50px;
        }

        .nav-link:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }
        
        .nav-link:hover {
            color: #fff !important;
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(13, 110, 253, 0.1);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            padding: 0.75rem;
            margin-top: 0.5rem;
            animation: dropdownSlide 0.3s ease;
        }

        @keyframes dropdownSlide {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            font-weight: 500;
            color: var(--dark-color);
            transition: all 0.3s ease;
            margin-bottom: 0.25rem;
        }

        .dropdown-item:last-child {
            margin-bottom: 0;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
            color: #fff;
            transform: translateX(5px);
        }

        .dropdown-divider {
            border-color: rgba(13, 110, 253, 0.1);
            margin: 0.75rem 0;
        }

        /* Mobile Toggle */
        .navbar-toggler {
            border: 2px solid rgba(13, 110, 253, 0.3);
            border-radius: 12px;
            padding: 0.5rem 0.75rem;
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            background: rgba(13, 110, 253, 0.1);
            border-color: var(--primary-color);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Mobile Menu */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                border-radius: 16px;
                padding: 1.5rem;
                margin-top: 1rem;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            }

            .navbar-modern.transparent .navbar-collapse {
                background: rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(20px);
            }

            .navbar-modern.transparent .navbar-collapse .nav-link {
                color: #fff !important;
            }

            .nav-link {
                margin-bottom: 0.5rem;
            }

            .dropdown-menu {
                background: transparent;
                border: none;
                box-shadow: none;
                padding-left: 1rem;
            }
        }
        
        /* Main Content Spacing */
        main {
            margin-top: 80px;
        }

        /* Other Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
        }
        
        .section-padding {
            padding: 5rem 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }
        
        /* Footer */
        footer {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            color: #fff;
            padding: 3rem 0 1rem;
        }
        
        footer a {
            color: #d1d5db;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        footer a:hover {
            color: var(--primary-light);
            transform: translateX(3px);
            display: inline-block;
        }

        footer h5 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        footer h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            border-radius: 2px;
        }

        footer .social-links a {
            display: inline-flex;
            width: 45px;
            height: 45px;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
            margin-right: 0.75rem;
        }

        footer .social-links a:hover {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            transform: translateY(-5px);
            color: #fff;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            color: #fff;
            padding: 6rem 0;
        }
        
        .card {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border-radius: 16px;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(13, 110, 253, 0.15);
        }
        
        .service-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .project-card img {
            height: 200px;
            object-fit: cover;
        }
        
        .blog-card img {
            height: 250px;
            object-fit: cover;
        }

        /* Scroll to top button */
        .scroll-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(13, 110, 253, 0.3);
            z-index: 999;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Modern Navigation -->
    <nav class="navbar navbar-modern navbar-expand-lg transparent" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('logo_ea.png') }}" alt="Espacial Artwork">
                <span>Espacial Artwork</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">
                            <i class="fas fa-tools me-1"></i> Layanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                            <i class="fas fa-briefcase me-1"></i> Proyek
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">
                            <i class="fas fa-blog me-1"></i> Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about.*') ? 'active' : '' }}" href="{{ route('about.index') }}">
                            <i class="fas fa-info-circle me-1"></i> Tentang Kami
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                            <i class="fas fa-envelope me-1"></i> Kontak
                        </a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-shield me-1"></i> Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminMenu">
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.services.index') }}"><i class="fas fa-cogs me-2"></i>Kelola Layanan</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.projects.index') }}"><i class="fas fa-folder me-2"></i>Kelola Proyek</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.blog.index') }}"><i class="fas fa-pen me-2"></i>Kelola Blog</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.about.edit') }}"><i class="fas fa-building me-2"></i>Kelola Tentang Kami</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.team.index') }}"><i class="fas fa-users me-2"></i>Kelola Tim</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.clients.index') }}"><i class="fas fa-handshake me-2"></i>Kelola Client</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.contacts.index') }}"><i class="fas fa-messages me-2"></i>Pesan Kontak</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="px-3">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-danger w-100 text-start">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Espacial Artwork</h5>
                    <p>Solusi IT profesional untuk kebutuhan bisnis Anda. Dari pemetaan hingga pengembangan aplikasi mobile dengan standar internasional.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Layanan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('services.index') }}"><i class="fas fa-chevron-right me-2"></i>Pemetaan & Survey</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}"><i class="fas fa-chevron-right me-2"></i>Develop Website</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}"><i class="fas fa-chevron-right me-2"></i>Mobile Apps</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}"><i class="fas fa-chevron-right me-2"></i>Consultant IT</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Kontak</h5>
                    <p class="mb-3">
                        <i class="fas fa-envelope me-2"></i>info@espacialartwork.com<br>
                        <i class="fas fa-phone me-2"></i>+62 XXX XXX XXXX
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: #374151; opacity: 0.3;">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Espacial Artwork. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('mainNavbar');
        const scrollTop = document.getElementById('scrollTop');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.remove('transparent');
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.add('transparent');
                navbar.classList.remove('scrolled');
            }

            // Scroll to top button
            if (window.scrollY > 300) {
                scrollTop.classList.add('visible');
            } else {
                scrollTop.classList.remove('visible');
            }
        });

        // Scroll to top functionality
        scrollTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            const navbarCollapse = document.getElementById('navbarNav');
            const navbarToggler = document.querySelector('.navbar-toggler');
            
            if (navbarCollapse.classList.contains('show') && 
                !navbarCollapse.contains(e.target) && 
                !navbarToggler.contains(e.target)) {
                navbarToggler.click();
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>