@extends('layouts.app')

@section('title', 'Admin - Proyek')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title mb-0">Kelola Proyek</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Tambah Proyek</a>
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
                        <th>Klien</th>
                        <th>Featured</th>
                        <th>Aktif</th>
                        <th>Urutan</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->category }}</td>
                            <td>{{ optional($project->client)->name ?? $project->client_name }}</td>
                            <td>
                                @if($project->is_featured)
                                    <span class="badge bg-warning">Ya</span>
                                @else
                                    <span class="badge bg-secondary">Tidak</span>
                                @endif
                            </td>
                            <td>
                                @if($project->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>{{ $project->order }}</td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data proyek.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

