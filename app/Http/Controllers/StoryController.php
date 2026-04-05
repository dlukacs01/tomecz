<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Services\StoryService;

class StoryController extends Controller
{

    public function __construct(
        protected StoryService $storyService,
    )
    {}

    public function stories()
    {
        $title = __('Hírek') . ' &mdash; ' . __('Tomecz Dániel');
        $stories = $this->storyService->getAll();
        return view('stories', compact(
            'title',
            'stories'
        ));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = 'Hírek megtekintése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $stories = $this->storyService->getAllForAdminIndex();
        return view('admin.stories.index', compact(
            'title',
            'stories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Hír létrehozása' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        return view('admin.stories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoryRequest $request)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $inputs['title'] = $validated['title'];
        $inputs['title_en'] = $validated['title_en'];
        $inputs['slug'] = getSlug($inputs['title']);
        $inputs['intro'] = $validated['intro'];
        $inputs['intro_en'] = $validated['intro_en'];
        $inputs['body'] = $validated['body'];
        $inputs['body_en'] = $validated['body_en'];
        $inputs['tags'] = $validated['tags'];
        $inputs['tags_en'] = $validated['tags_en'];

        // ORIGINAL
        $upload = $validated['original'];
        $filename = getFilename();
        $inputs['original'] = $filename;
        $this->storyService->upload($upload, $filename);

        // SAVE, SESSION, REDIRECT
        Story::create($inputs);
        return redirect()->route('admin.stories.index')->with('success', config(
            'custom.flash.stories.store',
            'A hír létrehozása sikeres volt.'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $story_slug, Story $story)
    {
        //

        $this->storyService->validateShowRoute($story_slug, $story);
        $title = $story->title . ' &mdash; ' . __('Webgaléria');
        $keywords = $this->storyService->getKeywords($story);
        $tags = $this->storyService->getTags($story);
        return view('story', compact(
            'title',
            'story',
            'keywords',
            'tags'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        //

        // POLICY

        $title = 'Hír szerkesztése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        return view('admin.stories.edit', compact(
            'title',
            'story'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoryRequest $request, Story $story)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $story->title = $validated['title'];
        $story->title_en = $validated['title_en'];
        $story->slug = getSlug($story->title);
        $story->intro = $validated['intro'];
        $story->intro_en = $validated['intro_en'];
        $story->body = $validated['body'];
        $story->body_en = $validated['body_en'];
        $story->tags = $validated['tags'];
        $story->tags_en = $validated['tags_en'];

        // ORIGINAL
        $upload = $validated['original'];
        $filename = getFilename();
        $story->original = $filename;
        $this->storyService->upload($upload, $filename);

        // ORIGINAL
        if (isset($validated['original'])) {

            // old
            $this->storyService->deleteFiles($story);

            // new
            $upload = $validated['original'];
            $filename = getFilename();
            $story->original = $filename;
            $this->storyService->upload($upload, $filename);
        }

        // SAVE, SESSION, REDIRECT
        $story->save();
        return redirect()->route('admin.stories.index')->with('success', config(
            'custom.flash.stories.update',
            'A hír frissítése sikeres volt.'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        //
    }
}
