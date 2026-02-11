@extends('layouts.app')

@section('title', 'Blog - Espacial Artwork')
@section('description', 'Artikel, tips, dan insight terbaru tentang teknologi, pengembangan website, pemetaan, dan konsultasi.')

@push('styles')
<style>
    :root {
        --primary-color: #0d6efd;
        --primary-dark: #0a58ca;
        --primary-light: #6ea8fe;
    }

    /* Hero - sama dengan portfolio */
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

    /* Filter / Search - sama konsep portfolio */
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

    .filter-btn span { position: relative; z-index: 1; }

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

    /* Search inline di filter */
    .blog-search-form {
        display: flex;
        gap: 0.5rem;
        align-items: center;
        max-width: 320px;
    }

    .blog-search-form .form-control {
        border-radius: 50px;
        border: 2px solid #e9ecef;
        padding: 0.5rem 1rem;
    }

    .blog-search-form .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .blog-search-form .btn {
        border-radius: 50px;
        padding: 0.5rem 1rem;
    }

    /* Grid - card seperti portfolio */
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
        to { opacity: 1; transform: translateY(0); }
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

    .blog-badges {
        margin-bottom: 0.75rem;
    }

    .blog-badges .badge {
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.7rem;
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
    }

    .btn-view-project:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        color: #fff;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
    }

    .empty-icon {
        font-size: 5rem;
        color: #dee2e6;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        color: #495057;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    /* Pagination - sama dengan portfolio */
    .pagination-wrapper {
        margin-top: 3rem;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .pagination {
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .pagination .page-link {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        color: var(--primary-color);
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: #fff;
        transform: translateY(-2px);
    }

    .pagination .page-item.active .page-link {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: #fff;
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.6;
        pointer-events: none;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

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
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="hero-portfolio">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="text-white">Blog</h1>
            <p class="text-white mb-0">Artikel, tips, dan insight terbaru dari tim kami</p>
        </div>
    </div>
</section>

<!-- Filter + Search -->
<section class="filter-section" id="filterSection">
    <div class="container">
        <div class="filter-container">
            <form action="{{ route('blog.index') }}" method="GET" class="blog-search-form">
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" class="form-control" placeholder="Cari artikel..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <a href="{{ route('blog.index') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">
                <span>Semua</span>
            </a>
            @foreach($categories as $category)
            <a href="{{ route('blog.index', ['category' => $category]) }}" class="filter-btn {{ request('category') == $category ? 'active' : '' }}">
                <span>{{ $category }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Posts Grid -->
<section class="projects-grid">
    <div class="container">
        @if($posts->count() > 0)
        <div class="row g-4">
            @foreach($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="project-card">
                    <a href="{{ route('blog.show', $post->slug) }}" class="project-image-wrapper text-decoration-none d-block">
                        @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                        @else
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-newspaper fa-4x text-white opacity-50"></i>
                        </div>
                        @endif
                        <div class="project-overlay">
                            <i class="fas fa-arrow-right overlay-icon"></i>
                        </div>
                    </a>
                    <div class="project-body">
                        <div class="blog-badges">
                            @if($post->category)
                            <span class="project-category">{{ $post->category }}</span>
                            @endif
                            @if($post->is_featured)
                            <span class="badge bg-warning text-dark">Unggulan</span>
                            @endif
                        </div>
                        <h5 class="project-title">{{ $post->title }}</h5>
                        <p class="project-description">{{ Str::limit($post->excerpt, 120) }}</p>
                        <div class="project-meta">
                            <i class="far fa-calendar"></i>
                            <span>{{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn-view-project">
                            Baca Artikel <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $posts->withQueryString()->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-search empty-icon"></i>
            <h3>Tidak ada artikel ditemukan</h3>
            <p class="text-muted">
                @if(request('search'))
                Tidak ada artikel yang sesuai dengan pencarian "{{ request('search') }}".
                @else
                Belum ada artikel yang tersedia.
                @endif
            </p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary mt-3">Lihat Semua Artikel</a>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
    window.addEventListener('scroll', function() {
        const filterSection = document.getElementById('filterSection');
        if (filterSection && window.scrollY > 100) {
            filterSection.classList.add('scrolled');
        } else if (filterSection) {
            filterSection.classList.remove('scrolled');
        }
    });
</script>
@endpush
