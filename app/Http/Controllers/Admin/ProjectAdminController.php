<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectAdminController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();
        $tools = Tool::orderBy('name')->get();

        return view('admin.projects.create', compact('clients', 'services', 'tools'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'content' => ['nullable', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'client_id' => ['required', 'exists:clients,id'],
            'project_url' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'video' => ['nullable', 'file', 'mimetypes:video/mp4,video/webm,video/quicktime', 'max:102400'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'tools' => ['nullable', 'array'],
            'tools.*' => ['integer', 'exists:tools,id'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('projects/videos', 'public');
        }

        // client_name diset otomatis dari relasi untuk kompatibilitas tampilan lama
        $client = Client::find($data['client_id']);
        if ($client) {
            $data['client_name'] = $client->name;
        }

        $project = Project::create($data);

        $project->tools()->sync($request->input('tools', []));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $photo) {
                $path = $photo->store('projects/photos', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $path,
                    'order' => $index,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $clients = Client::orderBy('name')->get();
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();
        $tools = Tool::orderBy('name')->get();

        $project->load('photos', 'client', 'tools');

        return view('admin.projects.edit', compact('project', 'clients', 'services', 'tools'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'content' => ['nullable', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'client_id' => ['required', 'exists:clients,id'],
            'project_url' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'video' => ['nullable', 'file', 'mimetypes:video/mp4,video/webm,video/quicktime', 'max:102400'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'tools' => ['nullable', 'array'],
            'tools.*' => ['integer', 'exists:tools,id'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('video')) {
            // Opsional: hapus video lama
            if ($project->video) {
                Storage::disk('public')->delete($project->video);
            }
            $data['video'] = $request->file('video')->store('projects/videos', 'public');
        } else {
            unset($data['video']);
        }

        $client = Client::find($data['client_id']);
        if ($client) {
            $data['client_name'] = $client->name;
        }

        $project->update($data);

        $project->tools()->sync($request->input('tools', []));

        if ($request->hasFile('photos')) {
            $startOrder = (int) ($project->photos()->max('order') ?? 0) + 1;
            foreach ($request->file('photos') as $offset => $photo) {
                $path = $photo->store('projects/photos', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $path,
                    'order' => $startOrder + $offset,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        // Opsional: hapus media terkait
        if ($project->video) {
            Storage::disk('public')->delete($project->video);
        }
        foreach ($project->photos as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyek berhasil dihapus.');
    }

    public function destroyImage(Request $request, Project $project, ProjectImage $image)
    {
        if ($image->project_id !== $project->id) {
            abort(404);
        }

        if ($image->path) {
            Storage::disk('public')->delete($image->path);
        }

        $image->delete();

        return redirect()
            ->route('admin.projects.edit', $project->id)
            ->with('status', 'Gambar proyek berhasil dihapus.');
    }
}

