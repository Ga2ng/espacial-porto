@extends('layouts.app')

@section('title', 'Detail Pesan Kontak - Admin')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="mb-4">
            <h1 class="section-title mb-0">Detail Pesan Kontak</h1>
            <p class="section-subtitle">Lihat detail pesan yang dikirim dari halaman kontak.</p>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">{{ $contact->name }}</dd>

                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{ $contact->email }}</dd>

                    <dt class="col-sm-3">Telepon</dt>
                    <dd class="col-sm-9">{{ $contact->phone }}</dd>

                    <dt class="col-sm-3">Subjek</dt>
                    <dd class="col-sm-9">{{ $contact->subject }}</dd>

                    <dt class="col-sm-3">Dikirim Pada</dt>
                    <dd class="col-sm-9">{{ $contact->created_at?->format('d M Y H:i') }}</dd>

                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9">
                        @if($contact->is_read)
                            <span class="badge bg-secondary">Dibaca</span>
                        @else
                            <span class="badge bg-success">Baru</span>
                        @endif
                    </dd>

                    <dt class="col-sm-3">Pesan</dt>
                    <dd class="col-sm-9">
                        <p class="mb-0" style="white-space: pre-line;">{{ $contact->message }}</p>
                    </dd>
                </dl>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">Kembali</a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus Pesan</button>
            </form>
        </div>
    </div>
</section>
@endsection

