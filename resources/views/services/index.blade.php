@extends('layouts.app')

@section('title', 'Layanan - Espacial Artwork')
@section('description', 'Layanan profesional Espacial Artwork: Pemetaan & Survey, Develop Website, Mobile Apps, dan Consultant IT.')

@push('styles')
<style>
    :root {
        --primary-color: #0d6efd;
        --primary-dark: #0a58ca;
        --primary-light: #6ea8fe;
        --accent-color: #20c997;
    }

    /* Hero Section */
    .services-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        padding: 6rem 0 4rem;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }

    .services-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        opacity: 0.95;
    }

    /* Roadmap Section - timeline vertikal presisi */
    .roadmap-section {
        padding: 6rem 0;
        background: #f8f9fa;
        position: relative;
    }

    .roadmap-container {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* Garis vertikal lurus di tengah */
    .roadmap-line {
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 4px;
        margin-left: -2px;
        background: linear-gradient(to bottom,
            transparent 0%,
            var(--primary-light) 5%,
            var(--primary-color) 50%,
            var(--accent-color) 95%,
            transparent 100%);
        border-radius: 2px;
        z-index: 0;
        opacity: 0.9;
    }

    /* Satu baris = satu layanan: [ Kartu kiri | Nomor tengah | Kartu kanan ] */
    .service-roadmap-item {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: 1fr 80px 1fr;
        gap: 0;
        align-items: center;
        margin-bottom: 4rem;
        min-height: 200px;
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }

    .service-roadmap-item:last-child {
        margin-bottom: 0;
    }

    .service-roadmap-item:nth-child(1) { animation-delay: 0.1s; }
    .service-roadmap-item:nth-child(2) { animation-delay: 0.2s; }
    .service-roadmap-item:nth-child(3) { animation-delay: 0.3s; }
    .service-roadmap-item:nth-child(4) { animation-delay: 0.4s; }
    .service-roadmap-item:nth-child(5) { animation-delay: 0.5s; }
    .service-roadmap-item:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Kartu ganjil = kiri, genap = kanan – presisi alignment */
    .service-roadmap-item:nth-child(odd) .service-card-roadmap {
        grid-column: 1;
        grid-row: 1;
        margin-right: 1.5rem;
        justify-self: end;
    }

    .service-roadmap-item:nth-child(even) .service-card-roadmap {
        grid-column: 3;
        grid-row: 1;
        margin-left: 1.5rem;
        justify-self: start;
    }

    /* Nomor selalu di kolom tengah, tepat di atas garis */
    .service-number {
        grid-column: 2;
        grid-row: 1;
        width: 80px;
        height: 80px;
        margin: 0 auto;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 900;
        color: #fff;
        box-shadow: 0 8px 24px rgba(13, 110, 253, 0.35);
        flex-shrink: 0;
        transition: transform 0.3s ease;
        border: 4px solid #f8f9fa;
    }

    .service-roadmap-item:hover .service-number {
        transform: scale(1.08);
    }

    /* Service Card */
    .service-card-roadmap {
        background: #fff;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        position: relative;
        z-index: 2;
        border: 2px solid transparent;
    }

    .service-card-roadmap:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(13, 110, 253, 0.2);
        border-color: var(--primary-light);
    }

    .service-icon-box {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
        transition: all 0.4s ease;
    }

    .service-card-roadmap:hover .service-icon-box {
        transform: scale(1.1) rotate(5deg);
    }

    .service-icon-box i {
        font-size: 2.5rem;
        color: #fff;
    }

    .service-card-roadmap h3 {
        font-size: 1.75rem;
        font-weight: 800;
        color: #212529;
        margin-bottom: 1.25rem;
    }

    .service-card-roadmap p {
        font-size: 1rem;
        color: #6c757d;
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .service-long-desc {
        padding-top: 1.5rem;
        border-top: 2px solid #f8f9fa;
        margin-top: 1.5rem;
    }

    .service-long-desc p {
        color: #495057;
        font-size: 0.95rem;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
    }

    .empty-icon {
        font-size: 5rem;
        color: var(--primary-light);
        margin-bottom: 2rem;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .empty-state h3 {
        font-size: 2rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1rem;
    }

    .empty-state p {
        font-size: 1.1rem;
        color: #6c757d;
        margin-bottom: 2rem;
    }

    /* CTA Section */
    .cta-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--accent-color) 100%);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
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
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
    }

    .cta-subtitle {
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
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        text-decoration: none;
        display: inline-block;
    }

    .btn-cta:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        color: var(--primary-dark);
    }

    /* Responsive: mobile & tablet = stack vertikal, garis disembunyikan */
    @media (max-width: 991px) {
        .roadmap-line {
            display: none !important;
        }

        .service-roadmap-item {
            grid-template-columns: 1fr;
            grid-template-rows: auto auto;
            gap: 1rem;
            margin-bottom: 3rem;
            min-height: 0;
            text-align: center;
        }

        .service-roadmap-item:nth-child(odd) .service-card-roadmap,
        .service-roadmap-item:nth-child(even) .service-card-roadmap {
            grid-column: 1;
            margin-left: 0;
            margin-right: 0;
        }

        .service-number {
            grid-column: 1;
            grid-row: 1;
        }
    }

    @media (max-width: 768px) {
        .services-hero {
            padding: 4rem 0 2rem;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .roadmap-section {
            padding: 3rem 0;
        }

        .service-card-roadmap {
            padding: 2rem;
        }

        .cta-title {
            font-size: 1.75rem;
        }

        .cta-subtitle {
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="services-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Layanan Kami</h1>
            <p class="hero-subtitle">Solusi lengkap untuk kebutuhan teknologi informasi Anda</p>
        </div>
    </div>
</section>

<!-- Services Roadmap Section -->
<section class="roadmap-section">
    <div class="container">
        @if($services->count() > 0)
        <div class="roadmap-container">
            <div class="roadmap-line d-none d-lg-block" aria-hidden="true"></div>

            @foreach($services as $index => $service)
            <div class="service-roadmap-item">
                <div class="service-number">{{ sprintf('%02d', $index + 1) }}</div>
                <div class="service-card-roadmap">
                    <div class="service-icon-box">
                        <i class="{{ $service->icon ?? 'fas fa-cog' }}"></i>
                    </div>
                    <h3>{{ $service->name }}</h3>
                    <p>{{ $service->description }}</p>
                    @if($service->long_description)
                    <div class="service-long-desc">
                        <p>{{ $service->long_description }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-tools empty-icon"></i>
            <h3>Layanan Segera Hadir</h3>
            <p>Kami sedang mempersiapkan layanan terbaik untuk Anda. Silakan hubungi kami untuk informasi lebih lanjut.</p>
            <a href="{{ route('contact.index') }}" class="btn-cta">
                <i class="fas fa-envelope me-2"></i>Hubungi Kami
            </a>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Butuh Bantuan?</h2>
            <p class="cta-subtitle">Tim kami siap membantu mewujudkan visi digital Anda</p>
            <a href="{{ route('contact.index') }}" class="btn-cta">
                <i class="fas fa-phone me-2"></i>Konsultasi Gratis
            </a>
        </div>
    </div>
</section>
@endsection