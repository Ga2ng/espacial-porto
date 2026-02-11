@extends('layouts.app')

@section('title', 'Admin - Blog')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title mb-0">Kelola Blog</h1>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Tambah Artikel</a>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Featured</th>
                        <th>Publikasi</th>
                        <th>Tanggal</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category }}</td>
                            <td>
                                @if($post->is_featured)
                                    <span class="badge bg-warning">Ya</span>
                                @else
                                    <span class="badge bg-secondary">Tidak</span>
                                @endif
                            </td>
                            <td>
                                @if($post->is_published)
                                    <span class="badge bg-success">Dipublikasikan</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td>
                                {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

