<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Project;
use App\Services\CategoryService;
use App\Services\PhotoService;
use App\Services\ProjectService;
use App\Services\VideoService;

class PhotoController extends Controller
{

    public function __construct(
        protected CategoryService $categoryService,
        protected ProjectService $projectService,
        protected PhotoService $photoService,
        protected VideoService $videoService
    )
    {}

    // PROJECTS
    public function projects()
    {
        $title = __('Munkák') . ' &mdash; ' . __('Tomecz Dániel');
        $categories = $this->categoryService->getAllWithProjects();
        $videos = $this->videoService->getAll();
        return view('projects', compact(
            'title',
            'categories',
            'videos'
        ));
    }

    // PROJECT
    public function project(string $category_slug, string $project_slug, Project $project)
    {
        $this->photoService->validateProjectRoute($category_slug, $project_slug, $project);
        $title = $project->title . ' &mdash; ' . __('Tomecz Dániel');
        $photos = $this->photoService->getByProject($project);
        return view('project', compact(
            'title',
            'project',
            'photos'
        ));
    }

    public function project_admin(Project $project)
    {
        $title = 'Képek megtekintése' . ' &mdash; ' . config('app.name', 'Webgaléria');
        $photos = $this->photoService->getByProjectForAdmin($project);
        return view('admin.photos.project', compact(
            'title',
            'project',
            'photos'
        ));
    }

    // RESOURCE

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function pc()
    {
        $projects = $this->projectService->getByCategoryId(request()->categoryId);
        return view('components.admin.partials.projects.create', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Kép feltöltése' . ' &mdash; ' . config('app.name', 'Webgaléria');
        $allowed_project = $this->projectService->atLeastOneProjectExists();
        $categories = $this->categoryService->getAllForAdminPosition();
        return view('admin.photos.create', compact(
            'title',
            'allowed_project',
            'categories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $inputs['title'] = $validated['title'];
        $inputs['title_en'] = $validated['title_en'];
        $inputs['slug'] = getSlug($inputs['title']);
        $inputs['year'] = $validated['year'];
        $inputs['size'] = $validated['size'];
        $inputs['technique'] = $validated['technique'];
        $inputs['technique_en'] = $validated['technique_en'];
        $inputs['tags'] = $validated['tags'];
        $inputs['tags_en'] = $validated['tags_en'];
        $inputs['body'] = $validated['body'];
        $inputs['body_en'] = $validated['body_en'];

        // fks
        if(isset($validated['project_id'])) $inputs['project_id'] = $validated['project_id'];

        // POSITION
        $project = Project::findOrFail($inputs['project_id']);
        $photos = $project->photos;
        $inputs['position'] = getPosition($photos);

        // ORIGINAL
        $upload = $validated['original'];
        $filename = getFilename();
        $inputs['original'] = $filename;
        $inputs['thumbnail'] = $filename;
        $this->photoService->upload($upload, $filename);

        // SAVE, SESSION, REDIRECT
        Photo::create($inputs);
        return redirect()->back()->with('success', config(
            'custom.flash.photos.store',
            'A műtárgy feltöltése sikeres volt.'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category_slug, string $project_slug, string $photo_slug, Photo $photo)
    {
        //

        $this->photoService->validateShowRoute($category_slug, $project_slug, $photo_slug, $photo);
        $this->photoService->setViews($photo);
        $title = $photo->title . ' &mdash; ' . __('Tomecz Dániel');
        $keywords = $this->photoService->getKeywords($photo);
        $tags = $this->photoService->getTags($photo);
        $previous = $this->photoService->getPrevious($photo);
        $next = $this->photoService->getNext($photo);
        return view('photo', compact(
            'photo',
            'title',
            'keywords',
            'tags',
            'previous',
            'next'
        ));
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
