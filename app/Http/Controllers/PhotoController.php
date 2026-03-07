<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Services\CategoryService;
use App\Services\PhotoService;
use App\Services\ProjectService;

class PhotoController extends Controller
{

    public function __construct(
        protected CategoryService $categoryService,
        protected ProjectService $projectService,
        protected PhotoService $photoService
    )
    {}

    // PROJECTS
    public function projects()
    {
        $title = __('Munkák') . ' &mdash; ' . __('Tomecz Dániel');
        $categories = $this->categoryService->getAllWithProjects();
        return view('projects', compact(
            'title',
            'categories'
        ));
    }

    // PROJECT
    public function project(string $category_slug, string $project_slug)
    {
        $project = $this->projectService->getBySlug($project_slug);
        $title = $project->title . ' &mdash; ' . __('Tomecz Dániel');
        $photos = $this->photoService->getByProject($project);
        return view('project', compact(
            'title',
            'project',
            'photos'
        ));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
