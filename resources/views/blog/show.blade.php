@extends('layouts.app')

@section('title', $post->title . ' - Blog Espacial Artwork')
@section('description', Str::limit($post->excerpt, 160))

@push('styles')
<style>
    :root {
        --primary-color: #0d6efd;
        --primary-dark: #0a58ca;
    }

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

    .detail-section {
        padding: 3rem 0;
        background: #f8f9fa;
    }

    .content-column { order: 1; }
    .info-column { order: 2; }

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

    .description-box .content,
    .description-box p {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #495057;
        margin-bottom: 0.75rem;
    }

    .description-box .content p:last-child {
        margin-bottom: 0;
    }

    .post-meta-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f8f9fa;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .post-meta-bar i {
        color: var(--primary-color);
    }

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

    .related-post-item {
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f8f9fa;
    }

    .related-post-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .related-post-item a {
        text-decoration: none;
        color: #212529;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .related-post-item a:hover {
        color: var(--primary-color);
    }

    .related-post-item small {
        color: #6c757d;
        font-size: 0.8rem;
    }

    .tags-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid #f8f9fa;
    }

    .tags-wrap .badge {
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.75rem;
        padding: 0.4rem 0.9rem;
    }

    .btn-cta-contact {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        padding: 0.75rem 1.25rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: #fff;
        font-size: 0.9rem;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .btn-cta-contact:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.35);
        color: #fff;
    }

    @media (max-width: 992px) {
        .info-card {
            position: relative;
            top: 0;
        }
    }

    @media (max-width: 768px) {
        .project-hero {
            padding: 3rem 0 1.5rem;
        }
        .project-title {
            font-size: 1.5rem;
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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ Str::limit($post->title, 35) }}</li>
                </ol>
            </nav>
        </div>
        <h1 class="project-title">{{ $post->title }}</h1>
        <p class="project-subtitle mb-0">{{ Str::limit($post->excerpt, 140) }}</p>
    </div>
</section>

<!-- Main Content -->
<section class="detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 content-column">
                <div class="description-box">
                    <div class="post-meta-bar">
                        <span><i class="far fa-calendar me-1"></i>{{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}</span>
                        <span><i class="far fa-eye me-1"></i>{{ $post->views }} dilihat</span>
                        @if($post->category)
                        <span class="badge rounded-pill" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: #fff;">{{ $post->category }}</span>
                        @endif
                    </div>

                    @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid rounded mb-4 w-100" alt="{{ $post->title }}">
                    @endif

                    <div class="content">
                        {!! $post->content !!}
                    </div>

                    @if($post->tags_array && count($post->tags_array) > 0)
                    <div class="tags-wrap">
                        @foreach($post->tags_array as $tag)
                        <span class="badge bg-light text-dark border">#{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 info-column">
                <div class="info-card">
                    <h4 class="info-card-title">Artikel Terkait</h4>
                    @if($relatedPosts->count() > 0)
                    @foreach($relatedPosts as $relatedPost)
                    <div class="related-post-item">
                        <a href="{{ route('blog.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                        <div><small>{{ Str::limit($relatedPost->excerpt, 70) }}</small></div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-muted small mb-0">Tidak ada artikel terkait.</p>
                    @endif

                    <a href="{{ route('contact.index') }}" class="btn-cta-contact">
                        <i class="fas fa-paper-plane"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
