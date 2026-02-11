<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'category',
        'client_id',
        'image',
        'images',
        'client_name',
        'project_date',
        'technologies',
        'project_url',
        'video',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
        'images' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'project_tool');
    }

    public function photos()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function getTechnologiesArrayAttribute()
    {
        if (is_string($this->technologies)) {
            return explode(',', $this->technologies);
        }
        return $this->technologies ?? [];
    }

    /** Path cover. Di view: asset('storage/' . $project->cover_image_path) */
    public function getCoverImagePathAttribute(): ?string
    {
        if (!empty($this->image)) {
            return $this->image;
        }
        $photo = $this->relationLoaded('photos') ? $this->photos->first() : $this->photos()->orderBy('order')->first();
        if ($photo) {
            return $photo->path;
        }
        $images = $this->images ?? [];
        return (is_array($images) && count($images) > 0) ? $images[0] : null;
    }

    /** Daftar path galeri. Di view: asset('storage/' . $path) */
    public function getGalleryPathsAttribute(): array
    {
        $paths = $this->photos->pluck('path')->toArray();
        if ($paths !== []) {
            return $paths;
        }
        $images = $this->images ?? [];
        return is_array($images) ? $images : [];
    }
}
