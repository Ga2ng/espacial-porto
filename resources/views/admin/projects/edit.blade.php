@extends('layouts.app')

@section('title', 'Edit Proyek - Admin')

@push('styles')
<style>
    .edit-project-shell .edit-panel {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        padding: 1.25rem;
    }

    .edit-project-shell .form-label {
        font-weight: 600;
        margin-bottom: 0.4rem;
    }

    .edit-project-shell .form-control,
    .edit-project-shell .form-select {
        border-radius: 12px;
    }

    .tools-box {
        max-height: 220px;
        overflow-y: auto;
        border-radius: 12px;
    }

    .photo-card {
        border-radius: 12px;
        overflow: hidden;
    }

    .photo-card img {
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }

    .btn-delete-photo {
        border-radius: 999px;
    }
</style>
@endpush

@section('content')
<section class="section-padding">
    <div class="container edit-project-shell">
        <div class="mb-4">
            <h1 class="section-title mb-0">Edit Proyek</h1>
            <p class="section-subtitle">Perbarui data proyek yang tampil di landing page.</p>
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

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="edit-panel">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Proyek</label>
                        <input type="text" name="title" id="title" class="form-control"
                               value="{{ old('title', $project->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (opsional)</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                               value="{{ old('slug', $project->slug) }}" placeholder="Jika dikosongkan akan dibuat otomatis">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat</label>
                        <textarea name="description" id="description" rows="3" class="form-control" required>{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Deskripsi Lengkap (opsional)</label>
                        <textarea name="content" id="content" rows="6" class="form-control">{{ old('content', $project->content) }}</textarea>
                    </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="edit-panel">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori (Layanan)</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">-- Pilih Layanan --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->slug }}" {{ old('category', $project->category) == $service->slug ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="client_id" class="form-label">Client</label>
                        <select name="client_id" id="client_id" class="form-control" required>
                            <option value="">-- Pilih Client --</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="project_url" class="form-label">URL Website (opsional)</label>
                        <input type="url"
                               name="project_url"
                               id="project_url"
                               class="form-control"
                               value="{{ old('project_url', $project->project_url) }}"
                               placeholder="https://contoh-website.com">
                        <div class="form-text">Isi jika proyek ini kategori <strong>Develop Website</strong>.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Tools / Framework yang Digunakan</label>
                        <div class="border rounded p-3 tools-box">
                            @forelse($tools as $tool)
                                <div class="form-check">
                                    @php $checked = in_array($tool->id, old('tools', $project->tools->pluck('id')->toArray())); @endphp
                                    <input type="checkbox" name="tools[]" id="tool-{{ $tool->id }}" value="{{ $tool->id }}"
                                           class="form-check-input" {{ $checked ? 'checked' : '' }}>
                                    <label for="tool-{{ $tool->id }}" class="form-check-label">
                                        @if($tool->icon)
                                            <i class="{{ $tool->icon }} me-1 text-muted"></i>
                                        @endif
                                        {{ $tool->name }}
                                    </label>
                                </div>
                            @empty
                                <p class="text-muted small mb-0">Belum ada data tools. Jalankan: <code>php artisan db:seed --class=ToolSeeder</code></p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="video" class="form-label">Video Proyek (max 100MB, opsional)</label>
                        <input type="file" name="video" id="video" class="form-control" accept="video/*">
                        @if($project->video)
                            <div class="mt-2">
                                <video width="100%" height="240" controls>
                                    <source src="{{ asset('storage/' . $project->video) }}">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="photos" class="form-label">Tambah Foto Proyek (bisa lebih dari satu)</label>
                        <input type="file" name="photos[]" id="photos" class="form-control" accept="image/*" multiple>
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Urutan</label>
                        <input type="number" name="order" id="order" class="form-control"
                               value="{{ old('order', $project->order) }}" min="0">
                    </div>

                    <div class="form-check mb-2">
                        <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input"
                               {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                        <label for="is_featured" class="form-check-label">Tampilkan sebagai proyek unggulan</label>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                               {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Aktif</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>

        @if($project->photos->count())
            <div class="mt-4">
                <label class="form-label d-block">Foto Saat Ini</label>
                <div class="row g-3">
                    @foreach($project->photos as $image)
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="card h-100 photo-card" data-photo-card>
                                <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top" alt="{{ $project->title }}">
                                <div class="card-body text-center p-2">
                                    <form action="{{ route('admin.projects.images.destroy', [$project, $image]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus foto ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-delete-photo">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

