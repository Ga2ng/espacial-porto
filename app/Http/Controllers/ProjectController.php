<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['client', 'photos'])
            ->where('is_active', true);

        // Filter by kategori (slug layanan)
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $projects = $query->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Ambil daftar kategori dari Service aktif (pemetaan-survey, develop-website, dll.)
        $categories = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show($slug)
    {
        $project = Project::with(['client', 'photos', 'tools'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedProjects = Project::with('photos')
            ->where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
