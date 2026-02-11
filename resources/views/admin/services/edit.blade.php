@extends('layouts.app')

@section('title', 'Edit Layanan - Admin')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="mb-4">
            <h1 class="section-title mb-0">Edit Layanan</h1>
            <p class="section-subtitle">Perbarui informasi layanan yang tampil di landing page.</p>
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

        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Layanan</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $service->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (opsional)</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                               value="{{ old('slug', $service->slug) }}" placeholder="Jika dikosongkan akan dibuat otomatis">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat</label>
                        <textarea name="description" id="description" rows="3" class="form-control" required>{{ old('description', $service->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="long_description" class="form-label">Deskripsi Panjang (opsional)</label>
                        <textarea name="long_description" id="long_description" rows="4" class="form-control">{{ old('long_description', $service->long_description) }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon (Font Awesome)</label>
                        <input type="text" name="icon" id="icon" class="form-control"
                               value="{{ old('icon', $service->icon) }}" placeholder="contoh: fas fa-map-marked-alt">
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan</label>
                        <input type="number" name="order" id="order" class="form-control"
                               value="{{ old('order', $service->order) }}" min="0">
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                               {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Aktif</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

