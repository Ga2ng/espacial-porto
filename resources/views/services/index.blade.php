@extends('layouts.app')

@section('title', 'Layanan - Espacial Artwork')
@section('description', 'Layanan profesional Espacial Artwork: Pemetaan & Survey, Develop Website, Mobile Apps, dan Consultant IT.')

@section('content')
<!-- Page Header -->
<section class="bg-primary text-white py-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="display-4 fw-bold">Layanan Kami</h1>
        <p class="lead">Solusi lengkap untuk kebutuhan teknologi informasi Anda</p>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            @forelse($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 p-4">
                    <div class="service-icon text-center">
                        <i class="{{ $service->icon ?? 'fas fa-cog' }}"></i>
                    </div>
                    <h3 class="card-title text-center mb-3">{{ $service->name }}</h3>
                    <p class="card-text">{{ $service->description }}</p>
                    @if($service->long_description)
                    <div class="mt-3">
                        <p class="text-muted">{{ $service->long_description }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Layanan sedang dalam persiapan. Silakan hubungi kami untuk informasi lebih lanjut.
                </div>
                <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg mt-3">Hubungi Kami</a>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-light">
    <div class="container text-center">
        <h2 class="section-title">Butuh Bantuan?</h2>
        <p class="section-subtitle">Tim kami siap membantu mewujudkan visi digital Anda</p>
        <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">Konsultasi Gratis</a>
    </div>
</section>
@endsection
