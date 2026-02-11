@extends('layouts.app')

@section('title', 'Admin - Kontak')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title mb-0">Pesan Kontak</h1>
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
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Subjek</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>
                                @if($contact->is_read)
                                    <span class="badge bg-secondary">Dibaca</span>
                                @else
                                    <span class="badge bg-success">Baru</span>
                                @endif
                            </td>
                            <td>{{ $contact->created_at?->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info">Lihat</a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada pesan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

