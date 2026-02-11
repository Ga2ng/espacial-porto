@extends('layouts.app')

@section('title', 'Tentang Kami - Espacial Artwork')
@section('description', 'Tentang Espacial Artwork - Tim profesional yang berdedikasi untuk memberikan solusi IT terbaik.')

@section('content')
<!-- Page Header -->
<section class="bg-primary text-white py-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="display-4 fw-bold">Tentang Kami</h1>
        <p class="lead">Mengenal lebih dekat Espacial Artwork</p>
    </div>
</section>

<!-- About Section -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="section-title">Visi Kami</h2>
                <p class="lead">
                    {{ $vision ?: 'Menjadi perusahaan teknologi informasi terdepan yang memberikan solusi inovatif dan berkualitas tinggi untuk membantu bisnis berkembang di era digital.' }}
                </p>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Misi Kami</h2>
                @if($mission)
                    <p class="lead">{{ $mission }}</p>
                @else
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i>Menyediakan layanan IT profesional dengan standar kualitas tertinggi</li>
                        <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i>Membangun hubungan jangka panjang dengan klien berdasarkan kepercayaan</li>
                        <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i>Terus berinovasi dan mengikuti perkembangan teknologi terbaru</li>
                        <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i>Memberikan solusi yang tepat sasaran dan efisien</li>
                    </ul>
                @endif
            </div>
        </div>
        
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title text-center mb-4">Layanan Kami</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="p-4">
                            <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                            <h5>Pemetaan & Survey</h5>
                            <p class="text-muted">Kajian dan survey profesional untuk kebutuhan bisnis Anda</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="p-4">
                            <i class="fas fa-laptop-code fa-3x text-primary mb-3"></i>
                            <h5>Develop Website</h5>
                            <p class="text-muted">Pengembangan website modern dan responsif</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="p-4">
                            <i class="fas fa-mobile-alt fa-3x text-primary mb-3"></i>
                            <h5>Mobile Apps</h5>
                            <p class="text-muted">Aplikasi mobile untuk iOS dan Android</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center">
                        <div class="p-4">
                            <i class="fas fa-user-tie fa-3x text-primary mb-3"></i>
                            <h5>Consultant IT</h5>
                            <p class="text-muted">Konsultasi IT untuk solusi bisnis terbaik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($structure)
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title text-center mb-4">Struktur Organisasi</h2>
                <p class="text-center">{{ $structure }}</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Team Section -->
@if($teams->count() > 0)
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Tim Kami</h2>
        <div class="row g-4">
            @foreach($teams as $team)
            <div class="col-md-6 col-lg-4">
                <div class="card text-center h-100">
                    @if($team->photo)
                    <img src="{{ asset('storage/' . $team->photo) }}" class="card-img-top rounded-circle mx-auto mt-4" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $team->name }}">
                    @else
                    <div class="rounded-circle mx-auto mt-4 bg-secondary d-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
                        <i class="fas fa-user fa-4x text-white-50"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $team->name }}</h5>
                        <p class="text-primary fw-bold">{{ $team->position }}</p>
                        @if($team->bio)
                        <p class="card-text">{{ Str::limit($team->bio, 100) }}</p>
                        @endif
                        <div class="mt-3">
                            @if($team->email)
                            <a href="mailto:{{ $team->email }}" class="text-decoration-none me-3">
                                <i class="fas fa-envelope fa-lg text-muted"></i>
                            </a>
                            @endif
                            @if($team->linkedin)
                            <a href="{{ $team->linkedin }}" target="_blank" class="text-decoration-none me-3">
                                <i class="fab fa-linkedin fa-lg text-muted"></i>
                            </a>
                            @endif
                            @if($team->twitter)
                            <a href="{{ $team->twitter }}" target="_blank" class="text-decoration-none">
                                <i class="fab fa-twitter fa-lg text-muted"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="section-padding">
    <div class="container text-center">
        <h2 class="section-title">Mari Bekerja Sama</h2>
        <p class="section-subtitle">Kami siap membantu mewujudkan visi digital Anda</p>
        <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">Hubungi Kami</a>
    </div>
</section>
@endsection
