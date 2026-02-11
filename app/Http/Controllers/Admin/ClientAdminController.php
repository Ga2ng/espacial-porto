<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class ClientAdminController extends Controller
{
    public function index()
    {
        $clients = Client::with(['province', 'regency'])->orderBy('name')->get();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        $provinces = Province::orderBy('name')->get();

        return view('admin.clients.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'province_id' => ['required', 'exists:provinces,id'],
            'regency_id' => ['required', 'exists:regencies,id'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Tangani upload logo jika ada
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('clients', 'public');
            $data['logo'] = $path;
        } else {
            unset($data['logo']);
        }

        Client::create($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('status', 'Client berhasil ditambahkan.');
    }

    public function edit(Client $client)
    {
        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::where('province_id', $client->province_id)->orderBy('name')->get();

        return view('admin.clients.edit', compact('client', 'provinces', 'regencies'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'province_id' => ['required', 'exists:provinces,id'],
            'regency_id' => ['required', 'exists:regencies,id'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('clients', 'public');
            $data['logo'] = $path;
        } else {
            unset($data['logo']);
        }

        $client->update($data);

        return redirect()
            ->route('admin.clients.index')
            ->with('status', 'Client berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('admin.clients.index')
            ->with('status', 'Client berhasil dihapus.');
    }

    /**
     * Endpoint AJAX untuk mengambil kabupaten berdasarkan province_id.
     */
    public function regencies(Request $request)
    {
        $request->validate([
            'province_id' => ['required', 'exists:provinces,id'],
        ]);

        $regencies = Regency::where('province_id', $request->province_id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($regencies);
    }
}

