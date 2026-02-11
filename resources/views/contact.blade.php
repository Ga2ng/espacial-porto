@extends('layouts.app')

@section('title', 'Kontak - Espacial Artwork')
@section('description', 'Hubungi Espacial Artwork untuk konsultasi gratis mengenai kebutuhan IT bisnis Anda.')

@section('content')
<!-- Page Header -->
<section class="bg-primary text-white py-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="display-4 fw-bold">Hubungi Kami</h1>
        <p class="lead">Kami siap membantu mewujudkan visi digital Anda</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Kirim Pesan</h3>
                        
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif
                        
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                           id="subject" name="subject" value="{{ old('subject') }}">
                                    @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Informasi Kontak</h5>
                        <div class="mb-3">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <strong>Email:</strong><br>
                            <a href="mailto:info@espacialartwork.com">info@espacialartwork.com</a>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <strong>Telepon:</strong><br>
                            +62 XXX XXX XXXX
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <strong>Alamat:</strong><br>
                            Indonesia
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Ikuti Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-facebook fa-2x text-primary"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-twitter fa-2x text-info"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-linkedin fa-2x text-primary"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="fab fa-instagram fa-2x text-danger"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
