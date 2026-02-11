<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function edit()
    {
        $vision = Setting::getValue('about_vision');
        $mission = Setting::getValue('about_mission');
        $structure = Setting::getValue('about_structure');

        return view('admin.about.edit', compact('vision', 'mission', 'structure'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'structure' => ['nullable', 'string'],
        ]);

        Setting::setValue('about_vision', $data['vision'] ?? '');
        Setting::setValue('about_mission', $data['mission'] ?? '');
        Setting::setValue('about_structure', $data['structure'] ?? '');

        return redirect()
            ->route('admin.about.edit')
            ->with('status', 'Konten Tentang Kami berhasil diperbarui.');
    }
}

