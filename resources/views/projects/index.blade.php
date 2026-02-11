@extends('layouts.app')

@section('title', 'Portfolio Proyek - Espacial Artwork')
@section('description', 'Lihat portfolio proyek-proyek terbaik yang telah kami selesaikan di berbagai bidang.')

@push('styles')
<style>
    :root {
        --primary-color: #0d6efd;
        --primary-dark: #0a58ca;
        --primary-light: #6ea8fe;
    }

    /* Hero Section */
    .hero-portfolio {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        padding: 100px 0 80px;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }

    .hero-portfolio::before {
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
        z-index: 1;
    }

    .hero-portfolio h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        animation: fadeInUp 0.8s ease;
    }

    .hero-portfolio p {
        font-size: 1.25rem;
        opacity: 0.95;
        animation: fadeInUp 1s ease;
    }

    /* Filter Section */
    .filter-section {
        background: #fff;
        padding: 2rem 0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        position: sticky;
        top: 80px;
        z-index: 100;
        transition: all 0.3s ease;
    }

    .filter-section.scrolled {
        box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    }

    .filter-container {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .filter-btn {
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        border: 2px solid #e9ecef;
        background: #fff;
        color: #495057;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        position: relative;
        overflow: hidden;
    }

    .filter-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: var(--primary-color);
        transition: width 0.4s ease, height 0.4s ease, top 0.4s ease, left 0.4s ease;
        transform: translate(-50%, -50%);
        z-index: 0;
    }

    .filter-btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .filter-btn span {
        position: relative;
        z-index: 1;
    }

    .filter-btn:hover {
        color: #fff;
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2);
    }

    .filter-btn.active {
        background: var(--primary-color);
        color: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
    }

    /* Projects Grid */
    .projects-grid {
        padding: 4rem 0;
    }

    .project-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUpCard 0.6s ease forwards;
    }

    .project-card:nth-child(1) { animation-delay: 0.1s; }
    .project-card:nth-child(2) { animation-delay: 0.2s; }
    .project-card:nth-child(3) { animation-delay: 0.3s; }
    .project-card:nth-child(4) { animation-delay: 0.4s; }
    .project-card:nth-child(5) { animation-delay: 0.5s; }
    .project-card:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUpCard {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .project-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .project-image-wrapper {
        position: relative;
        overflow: hidden;
        height: 280px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .project-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .project-card:hover img {
        transform: scale(1.1);
    }

    .project-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        display: flex;
        align-items: flex-end;
        padding: 1.5rem;
    }

    .project-card:hover .project-overlay {
        opacity: 1;
    }

    .overlay-icon {
        color: #fff;
        font-size: 2rem;
        margin-left: auto;
        transform: translateX(20px);
        transition: transform 0.4s ease;
    }

    .project-card:hover .overlay-icon {
        transform: translateX(0);
    }

    .project-body {
        padding: 1.75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .project-category {
        display: inline-block;
        padding: 0.4rem 1rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
        align-self: flex-start;
    }

    .project-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .project-description {
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.25rem;
        flex: 1;
    }

    .project-meta {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        font-size: 0.875rem;
        margin-bottom: 1.25rem;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
    }

    .project-meta i {
        color: var(--primary-color);
    }

    .btn-view-project {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .btn-view-project::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255,255,255,0.2);
        transition: left 0.4s ease;
    }

    .btn-view-project:hover::before {
        left: 100%;
    }

    .btn-view-project:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        color: #fff;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
    }

    .empty-icon {
        font-size: 5rem;
        color: #dee2e6;
        margin-bottom: 1.5rem;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .empty-state h3 {
        color: #495057;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #6c757d;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 3rem;
        display: flex;
        justify-content: center;
    }

    .pagination {
        gap: 0.5rem;
    }

    .page-link {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        color: var(--primary-color);
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .page-link:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: #fff;
        transform: translateY(-2px);
    }

    .page-item.active .page-link {
        background: var(--primary-color);
        border-color: var(--primary-color);
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

    /* Responsive */
    @media (max-width: 768px) {
        .hero-portfolio {
            padding: 60px 0 40px;
        }

        .hero-portfolio h1 {
            font-size: 2.5rem;
        }

        .filter-section {
            padding: 1.5rem 0;
            top: 60px;
        }

        .filter-container {
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .project-image-wrapper {
            height: 220px;
        }

        .projects-grid {
            padding: 2rem 0;
        }
    }

    /* Loading Animation */
    .projects-container {
        min-height: 400px;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-portfolio">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="text-white">Portfolio Proyek</h1>
            <p class="text-white mb-0">Karya terbaik yang telah kami hasilkan untuk klien kami</p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section" id="filterSection">
    <div class="container">
        <div class="filter-container">
            <a href="{{ route('projects.index') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">
                <span>Semua Proyek</span>
            </a>
            @foreach($categories as $service)
            <a href="{{ route('projects.index', ['category' => $service->slug]) }}"
               class="filter-btn {{ request('category') == $service->slug ? 'active' : '' }}">
                <span>{{ $service->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="projects-grid">
    <div class="container projects-container">
        @if($projects->count() > 0)
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="project-card">
                    <div class="project-image-wrapper">
                        @php $coverImage = $project->cover_image_path; @endphp
                        @if($coverImage)
                        <img src="{{ url('storage/' . $coverImage) }}" alt="{{ $project->title }}">
                        @else
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-image fa-4x text-white opacity-50"></i>
                        </div>
                        @endif
                        <div class="project-overlay">
                            <i class="fas fa-arrow-right overlay-icon"></i>
                        </div>
                    </div>
                    
                    <div class="project-body">
                        <span class="project-category">{{ ucwords(str_replace(['-', '_'], ' ', $project->category)) }}</span>
                        <h5 class="project-title">{{ $project->title }}</h5>
                        <p class="project-description">{{ Str::limit($project->description, 120) }}</p>
                        
                        @if($project->client || $project->client_name)
                        <div class="project-meta">
                            <i class="fas fa-user"></i>
                            <span>{{ optional($project->client)->name ?? $project->client_name }}</span>
                        </div>
                        @endif
                        
                        <a href="{{ route('projects.show', $project->slug) }}" class="btn-view-project">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $projects->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-folder-open empty-icon"></i>
            <h3>Tidak ada proyek ditemukan</h3>
            <p class="text-muted">Belum ada proyek yang tersedia untuk kategori ini.</p>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Sticky filter section effect
    window.addEventListener('scroll', function() {
        const filterSection = document.getElementById('filterSection');
        if (window.scrollY > 100) {
            filterSection.classList.add('scrolled');
        } else {
            filterSection.classList.remove('scrolled');
        }
    });

    // Smooth scroll untuk filter
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Allow default link behavior but add smooth transition
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush