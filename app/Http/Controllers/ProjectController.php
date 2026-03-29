<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Services\CategoryService;
use App\Services\ProjectService;

class ProjectController extends Controller
{

    public function __construct(
        protected CategoryService $categoryService,
        protected ProjectService $projectService,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = 'Projektek megtekintése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $projects = $this->projectService->getAllForAdminIndex();
        return view('admin.projects.index', compact(
            'title',
            'projects'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Projekt létrehozása' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $categories = $this->categoryService->getAllForAdminPosition();
        return view('admin.projects.create', compact(
            'title',
            'categories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $inputs['title'] = $validated['title'];
        $inputs['title_en'] = $validated['title_en'];
        $inputs['slug'] = getSlug($inputs['title']);

        $inputs['year'] = $validated['year'];

        // fks
        $inputs['category_id'] = $validated['category_id'];

        // POSITION
        $projects = $this->projectService->getAllForAdminPosition();
        $inputs['position'] = getPosition($projects);

        // ORIGINAL
        $upload = $validated['original'];
        $filename = getFilename();
        $inputs['original'] = $filename;
        $this->projectService->upload($upload, $filename);

        // SAVE, SESSION, REDIRECT
        Project::create($inputs);
        return redirect()->route('admin.projects.index')->with('success', config(
            'custom.flash.projects.store',
            'A projekt létrehozása sikeres volt.'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //

        // POLICY

        $title = 'Projekt szerkesztése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $categories = $this->categoryService->getAllForAdminPosition();
        return view('admin.projects.edit', compact(
            'title',
            'project',
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $project->title = $validated['title'];
        $project->title_en = $validated['title_en'];
        $project->slug = getSlug($project->title);

        $project->year = $validated['year'];

        // fks
        $project->category_id = $validated['category_id'];

        // POSITION
        $old = $project->position;
        $new = $project->position = $validated['position'];
        $projects = $this->projectService->getAllForAdminPosition();
        updatePosition($old, $new, $projects, 'projects');

        // ORIGINAL
        if (isset($validated['original'])) {

            // old
            $this->projectService->deleteFiles($project);

            // new
            $upload = $validated['original'];
            $filename = getFilename();
            $project->original = $filename;
            $this->projectService->upload($upload, $filename);
        }

        // SAVE, SESSION, REDIRECT
        $project->save();
        return redirect()->route('admin.projects.index')->with('success', config(
            'custom.flash.projects.update',
            'A projekt frissítése sikeres volt.'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    public function select()
    {

    }
}
