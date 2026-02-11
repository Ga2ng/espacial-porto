@extends('layouts.app')

@section('title', $project->title . ' - Espacial Artwork')
@section('description', Str::limit($project->description, 160))

@push('styles')
<style>
    :root {
        --primary-color: #0d6efd;
        --primary-dark: #0a58ca;
    }

    /* Compact Hero */
    .project-hero {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        padding: 4rem 0 2rem;
        margin-top: 80px;
    }

    .breadcrumb-nav {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 0.5rem 1rem;
        border-radius: 50px;
        display: inline-flex;
        margin-bottom: 1.5rem;
    }

    .breadcrumb-nav .breadcrumb {
        margin: 0;
        background: transparent;
        padding: 0;
        font-size: 0.875rem;
    }

    .breadcrumb-nav a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.6);
    }

    .project-title {
        font-size: 2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 0.75rem;
    }

    .project-subtitle {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
    }

    /* Main Content Layout */
    .detail-section {
        padding: 3rem 0;
        background: #f8f9fa;
    }

    /* Left Column - Gallery + Description */
    .content-column {
        order: 1;
    }

    /* Right Column - Sticky Info */
    .info-column {
        order: 2;
    }

    /* Project Info Card */
    .info-card {
        background: #fff;
        border-radius: 12px;
        padding: 1.75rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 100px;
        margin-bottom: 1.5rem;
    }

    .info-card-title {
        font-size: 1rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #f8f9fa;
    }

    .info-item {
        margin-bottom: 1.25rem;
    }

    .info-item:last-child {
        margin-bottom: 0;
    }

    .info-label {
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        font-weight: 600;
        margin-bottom: 0.4rem;
    }

    .info-value {
        font-size: 0.95rem;
        color: #212529;
        font-weight: 500;
    }

    .category-tag {
        display: inline-block;
        padding: 0.4rem 1rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .project-tools-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
        max-height: 140px;
        overflow-y: auto;
        padding-right: 2px;
    }

    .project-tool-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.3rem 0.7rem;
        background: #f9fafb;
        border: 1px solid #e9ecef;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 600;
        color: #495057;
        white-space: nowrap;
        transition: all 0.25s ease;
    }

    .project-tool-badge:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        box-shadow: 0 2px 8px rgba(13, 110, 253, 0.15);
    }

    .project-tool-badge i {
        font-size: 0.7rem;
        color: var(--primary-color);
    }

    .project-url-link {
        color: var(--primary-color);
        text-decoration: none;
        word-break: break-all;
        font-size: 0.9rem;
    }

    .project-url-link:hover {
        text-decoration: underline;
    }

    .btn-live {
        width: 100%;
        padding: 0.875rem;
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        color: #fff;
        font-weight: 700;
        border-radius: 10px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        margin-top: 1.25rem;
    }

    .btn-live:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(40, 167, 69, 0.3);
        color: #fff;
    }

    /* Statistik ringkas di info card */
    .info-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
        margin-bottom: 1.25rem;
        padding-bottom: 1.25rem;
        border-bottom: 2px solid #f8f9fa;
    }

    .info-stat-item {
        text-align: center;
        padding: 0.6rem 0.4rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #f1f3f5 100%);
        border-radius: 10px;
        border: 1px solid #e9ecef;
        transition: all 0.25s ease;
    }

    .info-stat-item:hover {
        border-color: var(--primary-color);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.12);
    }

    .info-stat-item i {
        display: block;
        font-size: 1.1rem;
        color: var(--primary-color);
        margin-bottom: 0.35rem;
    }

    .info-stat-item .info-stat-value {
        font-size: 1rem;
        font-weight: 800;
        color: #212529;
        line-height: 1.2;
    }

    .info-stat-item .info-stat-label {
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        font-weight: 600;
    }

    .info-featured-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.35rem 0.85rem;
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        color: #212529;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 700;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px rgba(255, 193, 7, 0.3);
    }

    .info-featured-badge i {
        font-size: 0.75rem;
    }

    /* CTA portofolio: ajak kontak */
    .info-cta-box {
        margin-top: 1.25rem;
        padding: 1rem 1.25rem;
        background: linear-gradient(135deg, rgba(13, 110, 253, 0.08) 0%, rgba(10, 88, 202, 0.06) 100%);
        border: 1px solid rgba(13, 110, 253, 0.2);
        border-radius: 12px;
        text-align: center;
    }

    .info-cta-box .info-cta-text {
        font-size: 0.85rem;
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.6rem;
    }

    .info-cta-box .btn-cta-contact {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        font-size: 0.8rem;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .info-cta-box .btn-cta-contact:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.35);
        color: #fff;
    }

    /* Description Box */
    .description-box {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .description-box h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1rem;
    }

    .description-box p {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #495057;
        margin-bottom: 0.75rem;
    }

    /* Masonry Gallery Section */
    .gallery-section {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .gallery-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f8f9fa;
    }

    .gallery-header h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #212529;
        margin: 0;
    }

    .gallery-count-badge {
        background: var(--primary-color);
        color: #fff;
        padding: 0.4rem 0.9rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    /* Masonry Grid Layout - E-commerce Style */
    .masonry-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 12px;
        margin-top: 1.5rem;
    }

    .masonry-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        background: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    /* Varying heights for masonry effect */
    .masonry-item:nth-child(6n+1) {
        grid-row: span 2;
    }

    .masonry-item:nth-child(6n+3) {
        grid-row: span 2;
    }

    .masonry-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .masonry-item:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(-3px);
    }

    .masonry-item:hover img {
        transform: scale(1.08);
    }

    .masonry-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .masonry-item:hover .masonry-overlay {
        opacity: 1;
    }

    .masonry-overlay i {
        color: #fff;
        font-size: 1.5rem;
    }

    .item-number {
        position: absolute;
        top: 8px;
        left: 8px;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 0.25rem 0.6rem;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 600;
        z-index: 2;
    }

    /* Video Section */
    .video-section {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .video-section h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f8f9fa;
    }

    .video-wrapper {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        border-radius: 8px;
        overflow: hidden;
        background: #000;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .video-wrapper video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* Technologies */
    .tech-section {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .tech-section h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f8f9fa;
    }

    .tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem;
    }

    .tech-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.5rem 1rem;
        background: #f8f9fa;
        border: 1.5px solid #e9ecef;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.8rem;
        color: #495057;
        transition: all 0.3s ease;
    }

    .tech-tag:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(13, 110, 253, 0.15);
    }

    .tech-tag i {
        font-size: 0.7rem;
        color: var(--primary-color);
    }

    /* Related Projects */
    .related-section {
        padding: 3rem 0;
        background: #fff;
    }

    .related-title {
        text-align: center;
        font-size: 1.75rem;
        font-weight: 800;
        color: #212529;
        margin-bottom: 2.5rem;
    }

    .related-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .related-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .related-img {
        position: relative;
        height: 180px;
        overflow: hidden;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .related-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .related-card:hover img {
        transform: scale(1.1);
    }

    .related-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .related-card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.75rem;
    }

    .related-text {
        color: #6c757d;
        font-size: 0.85rem;
        line-height: 1.6;
        margin-bottom: 1.25rem;
        flex: 1;
    }

    .btn-related {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        border: none;
        padding: 0.6rem 1.4rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        align-self: flex-start;
    }

    .btn-related:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        color: #fff;
    }

    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        justify-content: center;
        align-items: center;
    }

    .lightbox.active {
        display: flex;
    }

    .lightbox-content {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        border-radius: 4px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }

    .lightbox-close,
    .lightbox-nav {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border: none;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .lightbox-close:hover,
    .lightbox-nav:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }

    .lightbox-close {
        top: 1.5rem;
        right: 1.5rem;
    }

    .lightbox-prev {
        left: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
    }

    .lightbox-next {
        right: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
    }

    .lightbox-counter {
        position: absolute;
        bottom: 1.5rem;
        left: 50%;
        transform: translateX(-50%);
        color: #fff;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(10px);
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .info-card {
            position: relative;
            top: 0;
            margin-top: 2rem;
        }

        .content-column {
            order: 1;
        }

        .info-column {
            order: 2;
        }
    }

    @media (max-width: 768px) {
        .project-hero {
            padding: 3rem 0 1.5rem;
        }

        .project-title {
            font-size: 1.5rem;
        }

        .masonry-grid {
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 10px;
        }

        .lightbox-close,
        .lightbox-nav {
            width: 40px;
            height: 40px;
        }
    }

    @media (max-width: 576px) {
        .masonry-grid {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 8px;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="project-hero">
    <div class="container">
        <div class="breadcrumb-nav">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                    <li class="breadcrumb-item active text-white">{{ Str::limit($project->title, 30) }}</li>
                </ol>
            </nav>
        </div>
        
        <h1 class="project-title">{{ $project->title }}</h1>
        <p class="project-subtitle">{{ $project->description }}</p>
    </div>
</section>

<!-- Main Content -->
<section class="detail-section">
    <div class="container">
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-8 content-column">
                
                <!-- Description -->
                @if($project->content)
                <div class="description-box">
                    <h3>Deskripsi Proyek</h3>
                    <div>{!! nl2br(e($project->content)) !!}</div>
                </div>
                @endif

                <!-- Video -->
                @if($project->video)
                <div class="video-section">
                    <h3>Video Proyek</h3>
                    <div class="video-wrapper">
                        <video controls>
                            <source src="{{ asset('storage/' . $project->video) }}" type="video/mp4">
                            Browser tidak mendukung video.
                        </video>
                    </div>
                </div>
                @endif

                <!-- Gallery Masonry -->
                @php
                    $allImages = collect();
                    $coverImage = $project->cover_image_path;
                    
                    if($coverImage) {
                        $allImages->push((object)['path' => $coverImage]);
                    }
                    
                    if($project->photos) {
                        $allImages = $allImages->merge($project->photos);
                    }
                @endphp

                @if($allImages->count() > 0)
                <div class="gallery-section">
                    <div class="gallery-header">
                        <h3>Galeri Proyek</h3>
                        <span class="gallery-count-badge">{{ $allImages->count() }} Foto</span>
                    </div>
                    
                    <div class="masonry-grid">
                        @foreach($allImages as $index => $image)
                        <div class="masonry-item" data-index="{{ $index }}">
                            <span class="item-number">{{ $index + 1 }}</span>
                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $project->title }}">
                            <div class="masonry-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Technologies -->
                @if($project->technologies)
                <div class="tech-section">
                    <h3>Teknologi yang Digunakan</h3>
                    <div class="tech-tags">
                        @foreach($project->technologies_array as $tech)
                        <span class="tech-tag">
                            <i class="fas fa-check-circle"></i>
                            {{ trim($tech) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Info Sidebar -->
            <div class="col-lg-4 info-column">
                <div class="info-card">
                    <h4 class="info-card-title">Informasi Proyek</h4>

                    @if($project->is_featured)
                    <div class="info-featured-badge">
                        <i class="fas fa-star"></i>
                        Proyek Unggulan
                    </div>
                    @endif

                    @php
                        $photoCount = count($project->gallery_paths);
                        $toolsCount = $project->tools->count();
                    @endphp
                    <div class="info-stats">
                        <div class="info-stat-item">
                            <i class="fas fa-images"></i>
                            <span class="info-stat-value">{{ $photoCount }}</span>
                            <span class="info-stat-label">Foto</span>
                        </div>
                        <div class="info-stat-item">
                            <i class="fas fa-tools"></i>
                            <span class="info-stat-value">{{ $toolsCount }}</span>
                            <span class="info-stat-label">Tools</span>
                        </div>
                        <div class="info-stat-item">
                            @if($project->video)
                                <i class="fas fa-video"></i>
                                <span class="info-stat-value">Ya</span>
                            @else
                                <i class="fas fa-video" style="opacity:0.35;"></i>
                                <span class="info-stat-value">—</span>
                            @endif
                            <span class="info-stat-label">Video</span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">KATEGORI</div>
                        <div class="info-value">
                            <span class="category-tag">{{ ucfirst(str_replace('_', ' ', $project->category)) }}</span>
                        </div>
                    </div>
                    
                    @if($project->client || $project->client_name)
                    <div class="info-item">
                        <div class="info-label">KLIEN</div>
                        <div class="info-value">{{ optional($project->client)->name ?? $project->client_name }}</div>
                    </div>
                    @endif
                    
                    @if($project->project_date)
                    <div class="info-item">
                        <div class="info-label">TANGGAL</div>
                        <div class="info-value">{{ $project->project_date->format('d F Y') }}</div>
                    </div>
                    @endif
                    
                    @if($project->tools->count() > 0)
                    <div class="info-item">
                        <div class="info-label">TOOLS YANG DIGUNAKAN</div>
                        <div class="info-value">
                            <div class="project-tools-list">
                                @foreach($project->tools as $tool)
                                    <span class="project-tool-badge" title="{{ $tool->name }}">
                                        @if($tool->icon)
                                            <i class="{{ $tool->icon }}"></i>
                                        @endif
                                        <span>{{ $tool->name }}</span>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($project->category === 'develop-website' && $project->project_url)
                    <div class="info-item">
                        <div class="info-label">WEBSITE</div>
                        <div class="info-value">
                            @php
                                $displayUrl = \Illuminate\Support\Str::of($project->project_url)
                                    ->replace(['https://', 'http://'], '');
                            @endphp
                            <a href="{{ $project->project_url }}" target="_blank" class="project-url-link">
                                {{ \Illuminate\Support\Str::limit($displayUrl, 40) }}
                            </a>
                        </div>
                    </div>
                    @endif
                    
                    @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" class="btn-live">
                        <i class="fas fa-external-link-alt"></i>
                        Lihat Proyek Live
                    </a>
                    @endif

                    <div class="info-cta-box">
                        <p class="info-cta-text mb-0">Butuh proyek serupa?</p>
                        <a href="{{ route('contact.index') }}" class="btn-cta-contact">
                            <i class="fas fa-paper-plane"></i>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects->count() > 0)
<section class="related-section">
    <div class="container">
        <h2 class="related-title">Proyek Terkait</h2>
        
        <div class="row g-3">
            @foreach($relatedProjects as $relatedProject)
            <div class="col-md-6 col-lg-4">
                <div class="related-card">
                    <div class="related-img">
                        @php
                            $relatedCoverImage = $relatedProject->cover_image_path;
                        @endphp
                        @if($relatedCoverImage)
                            <img src="{{ asset('storage/' . $relatedCoverImage) }}" alt="{{ $relatedProject->title }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <i class="fas fa-image fa-3x text-white opacity-50"></i>
                            </div>
                        @endif
                    </div>
                    <div class="related-body">
                        <h5 class="related-card-title">{{ $relatedProject->title }}</h5>
                        <p class="related-text">{{ Str::limit($relatedProject->description, 90) }}</p>
                        <a href="{{ route('projects.show', $relatedProject->slug) }}" class="btn-related">
                            Lihat Detail <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
    <button class="lightbox-close" id="lightboxClose">
        <i class="fas fa-times"></i>
    </button>
    <button class="lightbox-nav lightbox-prev" id="lightboxPrev">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="lightbox-nav lightbox-next" id="lightboxNext">
        <i class="fas fa-chevron-right"></i>
    </button>
    <img class="lightbox-content" id="lightboxImage">
    <div class="lightbox-counter" id="lightboxCounter"></div>
</div>
@endsection

@push('scripts')
<script>
    // Lightbox
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImage');
    const lightboxClose = document.getElementById('lightboxClose');
    const lightboxPrev = document.getElementById('lightboxPrev');
    const lightboxNext = document.getElementById('lightboxNext');
    const lightboxCounter = document.getElementById('lightboxCounter');
    const masonryItems = document.querySelectorAll('.masonry-item');
    
    let currentIndex = 0;
    let images = [];

    masonryItems.forEach((item, index) => {
        const img = item.querySelector('img');
        images.push(img.src);
        
        item.addEventListener('click', () => {
            currentIndex = index;
            openLightbox();
        });
    });

    function openLightbox() {
        lightboxImg.src = images[currentIndex];
        updateCounter();
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function updateCounter() {
        lightboxCounter.textContent = `${currentIndex + 1} / ${images.length}`;
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        lightboxImg.src = images[currentIndex];
        updateCounter();
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % images.length;
        lightboxImg.src = images[currentIndex];
        updateCounter();
    }

    lightboxClose.addEventListener('click', closeLightbox);
    lightboxPrev.addEventListener('click', showPrev);
    lightboxNext.addEventListener('click', showNext);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });
</script>
@endpush