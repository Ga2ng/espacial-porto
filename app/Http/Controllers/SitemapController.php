<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Homepage
        $sitemap .= $this->url(url('/'), now(), 'daily', '1.0');
        
        // Static pages
        $sitemap .= $this->url(route('services.index'), now(), 'weekly', '0.8');
        $sitemap .= $this->url(route('projects.index'), now(), 'weekly', '0.8');
        $sitemap .= $this->url(route('blog.index'), now(), 'daily', '0.8');
        $sitemap .= $this->url(route('about.index'), now(), 'monthly', '0.7');
        $sitemap .= $this->url(route('contact.index'), now(), 'monthly', '0.7');
        
        // Projects
        $projects = Project::where('is_active', true)->get();
        foreach ($projects as $project) {
            $sitemap .= $this->url(route('projects.show', $project->slug), $project->updated_at, 'weekly', '0.7');
        }
        
        // Blog posts
        $posts = BlogPost::where('is_published', true)->get();
        foreach ($posts as $post) {
            $sitemap .= $this->url(route('blog.show', $post->slug), $post->updated_at, 'weekly', '0.7');
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
    
    private function url($loc, $lastmod, $changefreq, $priority)
    {
        return "  <url>\n" .
               "    <loc>{$loc}</loc>\n" .
               "    <lastmod>{$lastmod->format('Y-m-d')}</lastmod>\n" .
               "    <changefreq>{$changefreq}</changefreq>\n" .
               "    <priority>{$priority}</priority>\n" .
               "  </url>\n";
    }
}
