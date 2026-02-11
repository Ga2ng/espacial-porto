<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogAdminController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderByDesc('published_at')->orderByDesc('created_at')->get();

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');

        BlogPost::create($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('status', 'Artikel berhasil ditambahkan.');
    }

    public function edit(BlogPost $post)
    {
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');

        $post->update($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('status', 'Artikel berhasil diperbarui.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('status', 'Artikel berhasil dihapus.');
    }
}

