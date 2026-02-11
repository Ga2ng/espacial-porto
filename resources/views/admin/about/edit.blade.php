@extends('layouts.app')

@section('title', 'Admin - Tentang Kami')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="mb-4">
            <h1 class="section-title mb-0">Kelola Halaman Tentang Kami</h1>
            <p class="section-subtitle">Atur konten visi, misi, dan struktur organisasi yang tampil di halaman Tentang Kami.</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.about.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="vision" class="form-label">Visi</label>
                <textarea name="vision" id="vision" rows="3" class="form-control">{{ old('vision', $vision) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="mission" class="form-label">Misi</label>
                <textarea name="mission" id="mission" rows="4" class="form-control">{{ old('mission', $mission) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="structure" class="form-label">Struktur Organisasi (teks bebas, opsional)</label>
                <textarea name="structure" id="structure" rows="4" class="form-control">{{ old('structure', $structure) }}</textarea>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</section>
@endsection

