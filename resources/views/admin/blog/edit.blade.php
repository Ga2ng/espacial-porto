@extends('layouts.app')

@section('title', 'Edit Artikel - Admin')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="mb-4">
            <h1 class="section-title mb-0">Edit Artikel</h1>
            <p class="section-subtitle">Perbarui artikel yang tampil di halaman blog.</p>
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

        <form action="{{ route('admin.blog.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" name="title" id="title" class="form-control"
                               value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (opsional)</label>
                        <input type="text" name="slug" id="slug" class="form-control"
                               value="{{ old('slug', $post->slug) }}" placeholder="Jika dikosongkan akan dibuat otomatis">
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt / Ringkasan</label>
                        <textarea name="excerpt" id="excerpt" rows="3" class="form-control" required>{{ old('excerpt', $post->excerpt) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea name="content" id="content" rows="8" class="form-control" required>{{ old('content', $post->content) }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <input type="text" name="category" id="category" class="form-control"
                               value="{{ old('category', $post->category) }}">
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags (pisahkan dengan koma)</label>
                        <input type="text" name="tags" id="tags" class="form-control"
                               value="{{ old('tags', $post->tags) }}">
                    </div>

                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Gambar Utama (path storage, opsional)</label>
                        <input type="text" name="featured_image" id="featured_image" class="form-control"
                               value="{{ old('featured_image', $post->featured_image) }}" placeholder="contoh: blog/image.jpg">
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label">Tanggal Publikasi</label>
                        <input type="datetime-local" name="published_at" id="published_at" class="form-control"
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                    </div>

                    <div class="form-check mb-2">
                        <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input"
                               {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}>
                        <label for="is_featured" class="form-check-label">Tandai sebagai featured</label>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_published" id="is_published" class="form-check-input"
                               {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                        <label for="is_published" class="form-check-label">Publikasikan</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

