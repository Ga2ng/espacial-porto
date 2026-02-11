@extends('layouts.app')

@section('title', 'Admin - Tim')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title mb-0">Kelola Tim</h1>
            <a href="{{ route('admin.team.create') }}" class="btn btn-primary">Tambah Anggota Tim</a>
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
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Email</th>
                        <th>Aktif</th>
                        <th>Urutan</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->position }}</td>
                            <td>{{ $member->email }}</td>
                            <td>
                                @if($member->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>{{ $member->order }}</td>
                            <td>
                                <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus anggota tim ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada anggota tim.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

