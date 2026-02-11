<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();
        
        $featuredProjects = Project::with('photos')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->limit(6)
            ->get();
        
        $recentPosts = BlogPost::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', compact('services', 'featuredProjects', 'recentPosts'));
    }
}
