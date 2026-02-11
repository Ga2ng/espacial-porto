@extends('layouts.app')

@section('title', 'Tambah Proyek - Admin')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="mb-4">
            <h1 class="section-title mb-0">Tambah Proyek</h1>
            <p class="section-subtitle">Isi data proyek yang akan ditampilkan di landing page.</p>
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

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Proyek</label>
                        <input type="text" name="title" id="title" class="form-control"
                               value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (opsional)</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                               value="{{ old('slug') }}" placeholder="Jika dikosongkan akan dibuat otomatis">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat</label>
                        <textarea name="description" id="description" rows="3" class="form-control" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Deskripsi Lengkap (opsional)</label>
                        <textarea name="content" id="content" rows="6" class="form-control">{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori (Layanan)</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">-- Pilih Layanan --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->slug }}" {{ old('category') == $service->slug ? 'selected' : '' }}>
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
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
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
                               value="{{ old('project_url') }}"
                               placeholder="https://contoh-website.com">
                        <div class="form-text">Isi jika proyek ini kategori <strong>Develop Website</strong>.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Tools / Framework yang Digunakan</label>
                        <div class="border rounded p-3" style="max-height: 220px; overflow-y: auto;">
                            @forelse($tools as $tool)
                                <div class="form-check">
                                    <input type="checkbox" name="tools[]" id="tool-{{ $tool->id }}" value="{{ $tool->id }}"
                                           class="form-check-input" {{ in_array($tool->id, old('tools', [])) ? 'checked' : '' }}>
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
                    </div>

                    <div class="mb-3">
                        <label for="photos" class="form-label">Foto Proyek (bisa lebih dari satu, opsional)</label>
                        <input type="file" name="photos[]" id="photos" class="form-control" accept="image/*" multiple>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

