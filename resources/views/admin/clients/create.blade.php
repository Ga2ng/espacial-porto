@extends('layouts.app')

@section('title', 'Tambah Client - Admin')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="mb-4">
            <h1 class="section-title mb-0">Tambah Client</h1>
            <p class="section-subtitle">Isi data client yang akan ditampilkan (opsional logo).</p>
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

        <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Client</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo (gambar, opsional)</label>
                        <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="province_id" class="form-label">Provinsi</label>
                        <select name="province_id" id="province_id" class="form-select" required>
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="regency_id" class="form-label">Kabupaten/Kota</label>
                        <select name="regency_id" id="regency_id" class="form-select" required>
                            <option value="">-- Pilih Kabupaten/Kota --</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const provinceSelect = document.getElementById('province_id');
        const regencySelect = document.getElementById('regency_id');

        async function loadRegencies(provinceId, selectedId = null) {
            regencySelect.innerHTML = '<option value=\"\">Memuat data...</option>';
            if (!provinceId) {
                regencySelect.innerHTML = '<option value=\"\">-- Pilih Kabupaten/Kota --</option>';
                return;
            }
            try {
                const url = `{{ route('admin.clients.regencies') }}?province_id=${provinceId}`;
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const data = await response.json();
                regencySelect.innerHTML = '<option value=\"\">-- Pilih Kabupaten/Kota --</option>';
                data.forEach(function (item) {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    if (selectedId && Number(selectedId) === Number(item.id)) {
                        option.selected = true;
                    }
                    regencySelect.appendChild(option);
                });
            } catch (e) {
                regencySelect.innerHTML = '<option value=\"\">Gagal memuat kabupaten/kota</option>';
                console.error(e);
            }
        }

        provinceSelect.addEventListener('change', function () {
            loadRegencies(this.value);
        });

        // Jika ada old province_id & regency_id (validasi gagal), muat kembali
        const oldProvince = '{{ old('province_id') }}';
        const oldRegency = '{{ old('regency_id') }}';
        if (oldProvince) {
            loadRegencies(oldProvince, oldRegency);
        }
    });
</script>
@endpush
@endsection

