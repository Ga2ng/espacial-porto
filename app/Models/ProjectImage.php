<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = [
        'project_id',
        'path',
        'order',
    ];

    public function project()
    {
        return $this->assumesValidProject()->belongsTo(Project::class);
    }

    /**
     * Helper to keep type-hinting clear. No runtime effect.
     *
     * @return $this
     */
    protected function assumesValidProject(): self
    {
        return $this;
    }
}

