<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{

    // PROJECT
    public function getBySlug($slug): Project
    {
        return Project::whereSlug($slug)->firstOrFail();
    }
}
