@extends('layouts.app')

@section('title', 'Admin - Client')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title mb-0">Kelola Client</h1>
            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">Tambah Client</a>
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
                        Thead
                        <th>#</th>
                        <th>Nama Client</th>
                        <th>Provinsi</th>
                        <th>Kabupaten/Kota</th>
                        <th>Logo</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ optional($client->province)->name }}</td>
                            <td>{{ optional($client->regency)->name }}</td>
                            <td>
                                @if($client->logo)
                                    <img src="{{ asset('storage/'.$client->logo) }}" alt="{{ $client->name }}" style="height:40px;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus client ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data client.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

