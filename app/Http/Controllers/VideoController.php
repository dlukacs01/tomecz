<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Services\VideoService;

class VideoController extends Controller
{

    public function __construct(
        protected VideoService $videoService,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = 'Videók megtekintése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $videos = $this->videoService->getAllForAdminIndex();
        return view('admin.videos.index', compact(
            'title',
            'videos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Videó létrehozása' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        return view('admin.videos.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $inputs['title'] = $validated['title'];
        $inputs['title_en'] = $validated['title_en'];
        $inputs['slug'] = getSlug($inputs['title']);
        $inputs['year'] = $validated['year'];
        $inputs['url'] = $validated['url'];
        $inputs['body'] = $validated['body'];
        $inputs['body_en'] = $validated['body_en'];
        $inputs['tags'] = $validated['tags'];
        $inputs['tags_en'] = $validated['tags_en'];

        // POSITION
        $videos = $this->videoService->getAllForAdminPosition();
        $inputs['position'] = getPosition($videos);

        // ORIGINAL
        $upload = $validated['original'];
        $filename = getFilename();
        $inputs['original'] = $filename;
        $this->videoService->upload($upload, $filename);

        // SAVE, SESSION, REDIRECT
        Video::create($inputs);
        return redirect()->route('admin.videos.index')->with('success', config(
            'custom.flash.videos.store',
            'A videó létrehozása sikeres volt.'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }
}
