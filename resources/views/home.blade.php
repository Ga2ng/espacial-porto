@extends('layouts.app')

@section('title', 'Beranda - Espacial Artwork')
@section('description', 'Espacial Artwork menyediakan layanan profesional untuk Pemetaan, Develop Website, Mobile Apps, dan Consultant IT.')

@push('styles')
<style>
    :root {
        --primary-color: #0d6efd;
        --primary-dark: #0a58ca;
        --primary-light: #6ea8fe;
        --accent-color: #20c997;
    }

    /* Hero Section - Diagonal Design */
    .hero-modern {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        overflow: hidden;
        margin-top: 80px;
    }

    .hero-modern::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        background: rgba(255, 255, 255, 0.03);
        clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%);
        z-index: 1;
    }

    .hero-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: 1;
    }

    .shape {
        position: absolute;
        opacity: 0.1;
    }

    .shape-1 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
        top: 10%;
        right: 10%;
        border-radius: 50%;
        animation: float 20s ease-in-out infinite;
    }

    .shape-2 {
        width: 300px;
        height: 300px;
        border: 3px solid rgba(255,255,255,0.3);
        bottom: 10%;
        left: 5%;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: morph 15s ease-in-out infinite;
    }

    .shape-3 {
        width: 200px;
        height: 200px;
        background: linear-gradient(45deg, rgba(255,255,255,0.1), transparent);
        top: 40%;
        right: 30%;
        transform: rotate(45deg);
        animation: rotate360 30s linear infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); }
        50% { transform: translateY(-30px) translateX(20px); }
    }

    @keyframes morph {
        0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        50% { border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; }
    }

    @keyframes rotate360 {
        from { transform: rotate(45deg); }
        to { transform: rotate(405deg); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        animation: fadeInUp 1s ease;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        color: #fff;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .hero-title span {
        background: linear-gradient(135deg, #fff 0%, var(--accent-color) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-text {
        font-size: 1.25rem;
        color: rgba(255,255,255,0.95);
        margin-bottom: 2.5rem;
        max-width: 600px;
        line-height: 1.7;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-hero-primary {
        padding: 1rem 2.5rem;
        background: #fff;
        color: var(--primary-color);
        border: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        color: var(--primary-dark);
    }

    .btn-hero-secondary {
        padding: 1rem 2.5rem;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        color: #fff;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-hero-secondary:hover {
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.5);
        transform: translateY(-3px);
        color: #fff;
    }

    .hero-visual {
        position: relative;
        z-index: 2;
        animation: fadeInRight 1.2s ease;
    }

    .floating-card {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 2rem;
        border: 1px solid rgba(255,255,255,0.2);
        animation: floatCard 6s ease-in-out infinite;
    }

    @keyframes floatCard {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 3rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        animation: bounce 2s infinite;
    }

    .scroll-indicator i {
        color: #fff;
        font-size: 2rem;
        opacity: 0.7;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40% { transform: translateX(-50%) translateY(-10px); }
    }

    /* Section Animations */
    .fade-in-section {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .fade-in-section.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Services Section - Bento Grid Style */
    .services-section {
        padding: 6rem 0;
        background: #fff;
        position: relative;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-label {
        display: inline-block;
        padding: 0.5rem 1.5rem;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
        color: #fff;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 2.75rem;
        font-weight: 900;
        color: #212529;
        margin-bottom: 1rem;
    }

    .section-subtitle {
        font-size: 1.15rem;
        color: #6c757d;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Service Cards - Unique Layout */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }

    .service-card {
        background: #fff;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid #f8f9fa;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(13, 110, 253, 0.15);
    }

    .service-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        transition: all 0.4s ease;
    }

    .service-icon i {
        font-size: 2rem;
        color: #fff;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .service-card h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1rem;
    }

    .service-card p {
        font-size: 0.95rem;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .service-link {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: gap 0.3s ease;
    }

    .service-link:hover {
        gap: 1rem;
    }

    /* Projects Section - Masonry Preview */
    .projects-section {
        padding: 6rem 0;
        background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);
    }

    .projects-masonry {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .project-preview-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
    }

    .project-preview-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(13, 110, 253, 0.15);
    }

    .project-image-wrapper {
        position: relative;
        height: 280px;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .project-preview-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .project-preview-card:hover img {
        transform: scale(1.1);
    }

    .project-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.6) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .project-preview-card:hover .project-overlay {
        opacity: 1;
    }

    .project-category-tag {
        position: absolute;
        top: 1.5rem;
        left: 1.5rem;
        padding: 0.5rem 1.25rem;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        color: var(--primary-color);
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        z-index: 2;
    }

    .project-card-body {
        padding: 2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .project-card-body h5 {
        font-size: 1.35rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1rem;
    }

    .project-card-body p {
        font-size: 0.95rem;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
    }

    .btn-project-detail {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border: none;
        padding: 0.75rem 1.75rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        align-self: flex-start;
        text-decoration: none;
    }

    .btn-project-detail:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        color: #fff;
    }

    /* Blog Section - Card Grid */
    .blog-section {
        padding: 6rem 0;
        background: #fff;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .blog-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        border: 1px solid #f8f9fa;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        border-color: var(--primary-light);
    }

    .blog-image {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .blog-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover img {
        transform: scale(1.05);
    }

    .blog-category {
        position: absolute;
        top: 1rem;
        left: 1rem;
        padding: 0.4rem 1rem;
        background: rgba(0,0,0,0.7);
        backdrop-filter: blur(10px);
        color: #fff;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .blog-card-body {
        padding: 2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-card-body h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1rem;
        line-height: 1.4;
    }

    .blog-card-body p {
        font-size: 0.9rem;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
    }

    .btn-read-more {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: gap 0.3s ease;
        align-self: flex-start;
    }

    .btn-read-more:hover {
        gap: 1rem;
        color: var(--primary-dark);
    }

    /* CTA Section - Diagonal Split */
    .cta-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--accent-color) 100%);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
    }

    .cta-title {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    .cta-text {
        font-size: 1.25rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
    }

    .btn-cta {
        padding: 1.25rem 3rem;
        background: #fff;
        color: var(--primary-color);
        border: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        text-decoration: none;
        display: inline-block;
    }

    .btn-cta:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        color: var(--primary-dark);
    }

    /* View All Buttons */
    .btn-view-all {
        padding: 1rem 2.5rem;
        background: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-view-all:hover {
        background: var(--primary-color);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .services-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .projects-masonry {
            grid-template-columns: 1fr;
        }

        .blog-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .hero-modern {
            min-height: 80vh;
            padding: 3rem 0;
        }

        .hero-title {
            font-size: 2.25rem;
        }

        .hero-text {
            font-size: 1rem;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 2rem;
        }

        .cta-title {
            font-size: 2rem;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .btn-hero-primary,
        .btn-hero-secondary {
            width: 100%;
            text-align: center;
            justify-content: center;
        }
    }

    /* Animations */
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

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-modern">
    <div class="hero-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 hero-content">
                <h1 class="hero-title">
                    Solusi IT Profesional untuk <span>Bisnis Anda</span>
                </h1>
                <p class="hero-text">
                    Kami menyediakan layanan lengkap mulai dari pemetaan, pengembangan website, aplikasi mobile, hingga konsultasi IT yang terpercaya dengan standar internasional.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('contact.index') }}" class="btn-hero-primary">
                        <i class="fas fa-envelope me-2"></i>Hubungi Kami
                    </a>
                    <a href="{{ route('projects.index') }}" class="btn-hero-secondary">
                        <i class="fas fa-briefcase me-2"></i>Lihat Proyek
                    </a>
                </div>
            </div>
            <div class="col-lg-5 hero-visual d-none d-lg-block">
                <div class="floating-card">
                    <div class="text-center">
                        <i class="fas fa-laptop-code" style="font-size: 8rem; color: rgba(255,255,255,0.8);"></i>
                        <div class="mt-4">
                            <h5 class="text-white mb-2">Kualitas Terjamin</h5>
                            <p class="text-white-50 mb-0">Lebih dari 100+ proyek sukses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="scroll-indicator">
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- Services Section -->
<section class="services-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Layanan Kami</span>
            <h2 class="section-title">Solusi Lengkap IT</h2>
            <p class="section-subtitle">Berbagai layanan profesional untuk mendukung transformasi digital bisnis Anda</p>
        </div>
        
        <div class="services-grid">
            @forelse($services as $service)
            <div class="service-card">
                <div class="service-icon">
                    <i class="{{ $service->icon ?? 'fas fa-cog' }}"></i>
                </div>
                <h5>{{ $service->name }}</h5>
                <p>{{ Str::limit($service->description, 100) }}</p>
                <a href="{{ route('services.index') }}" class="service-link">
                    Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            @empty
            <div class="col-span-4 text-center py-5">
                <p class="text-muted">Layanan sedang dalam persiapan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Featured Projects -->
@if($featuredProjects->count() > 0)
<section class="projects-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Portfolio</span>
            <h2 class="section-title">Proyek Unggulan</h2>
            <p class="section-subtitle">Beberapa karya terbaik yang telah kami selesaikan dengan hasil maksimal</p>
        </div>
        
        <div class="projects-masonry">
            @foreach($featuredProjects as $project)
            <div class="project-preview-card">
                <div class="project-image-wrapper">
                    <span class="project-category-tag">{{ ucfirst(str_replace('_', ' ', $project->category)) }}</span>
                    @php
                        $coverImage = $project->cover_image_path;
                    @endphp
                    @if($coverImage)
                        <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $project->title }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-image fa-4x text-white opacity-50"></i>
                        </div>
                    @endif
                    <div class="project-overlay"></div>
                </div>
                <div class="project-card-body">
                    <h5>{{ $project->title }}</h5>
                    <p>{{ Str::limit($project->description, 100) }}</p>
                    <a href="{{ route('projects.show', $project->slug) }}" class="btn-project-detail">
                        Lihat Detail <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{ route('projects.index') }}" class="btn-view-all">
                Lihat Semua Proyek <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Blog Section -->
@if($recentPosts->count() > 0)
<section class="blog-section fade-in-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Blog & Artikel</span>
            <h2 class="section-title">Insight Terbaru</h2>
            <p class="section-subtitle">Tips, tutorial, dan informasi terkini dari para ahli kami</p>
        </div>
        
        <div class="blog-grid">
            @foreach($recentPosts as $post)
            <div class="blog-card">
                <div class="blog-image">
                    <span class="blog-category">{{ $post->category ?? 'Umum' }}</span>
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-newspaper fa-3x text-white opacity-50"></i>
                        </div>
                    @endif
                </div>
                <div class="blog-card-body">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ Str::limit($post->excerpt, 100) }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="btn-read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{ route('blog.index') }}" class="btn-view-all">
                Lihat Semua Artikel <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="cta-section fade-in-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Siap Memulai Proyek Anda?</h2>
            <p class="cta-text">Hubungi kami hari ini dan dapatkan konsultasi gratis untuk solusi IT terbaik</p>
            <a href="{{ route('contact.index') }}" class="btn-cta">
                <i class="fas fa-rocket me-2"></i>Konsultasi Gratis Sekarang
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Intersection Observer for Fade In Animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all fade-in sections
    document.querySelectorAll('.fade-in-section').forEach(section => {
        observer.observe(section);
    });

    // Smooth scroll for scroll indicator
    document.querySelector('.scroll-indicator')?.addEventListener('click', () => {
        document.querySelector('.services-section').scrollIntoView({ 
            behavior: 'smooth' 
        });
    });
</script>
@endpush