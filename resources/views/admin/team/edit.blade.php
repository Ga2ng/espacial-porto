@extends('layouts.app')

@section('title', 'Edit Anggota Tim - Admin')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="mb-4">
            <h1 class="section-title mb-0">Edit Anggota Tim</h1>
            <p class="section-subtitle">Perbarui data anggota tim yang tampil di halaman Tentang Kami.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.team.update', $team) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $team->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Posisi</label>
                        <input type="text" name="position" id="position" class="form-control"
                               value="{{ old('position', $team->position) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio (opsional)</label>
                        <textarea name="bio" id="bio" rows="4" class="form-control">{{ old('bio', $team->bio) }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto (path storage, opsional)</label>
                        <input type="text" name="photo" id="photo" class="form-control"
                               value="{{ old('photo', $team->photo) }}" placeholder="contoh: team/photo.jpg">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email (opsional)</label>
                        <input type="email" name="email" id="email" class="form-control"
                               value="{{ old('email', $team->email) }}">
                    </div>

                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn (opsional)</label>
                        <input type="url" name="linkedin" id="linkedin" class="form-control"
                               value="{{ old('linkedin', $team->linkedin) }}">
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter (opsional)</label>
                        <input type="url" name="twitter" id="twitter" class="form-control"
                               value="{{ old('twitter', $team->twitter) }}">
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan</label>
                        <input type="number" name="order" id="order" class="form-control"
                               value="{{ old('order', $team->order) }}" min="0">
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                               {{ old('is_active', $team->is_active) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Aktif</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

