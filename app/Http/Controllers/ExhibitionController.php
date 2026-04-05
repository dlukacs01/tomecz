<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Http\Requests\StoreExhibitionRequest;
use App\Http\Requests\UpdateExhibitionRequest;
use App\Services\ExhibitionService;
use App\Services\StatusService;

class ExhibitionController extends Controller
{

    public function __construct(
        protected ExhibitionService $exhibitionService,
        protected StatusService $statusService
    )
    {}

    public function exhibitions()
    {
        $title = __('Kiállítások') . ' &mdash; ' . __('Tomecz Dániel');
        $exhibitions = $this->exhibitionService->getAll();
        return view('exhibitions', compact(
            'title',
            'exhibitions'
        ));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = 'Kiállítások megtekintése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $exhibitions = $this->exhibitionService->getAllForAdminIndex();
        return view('admin.exhibitions.index', compact(
            'title',
            'exhibitions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Kiállítás feltöltése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $statuses = $this->statusService->getAll();
        return view('admin.exhibitions.create', compact(
            'title',
            'statuses'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExhibitionRequest $request)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $inputs['title'] = $validated['title'];
        $inputs['title_en'] = $validated['title_en'];
        $inputs['slug'] = getSlug($inputs['title']);
        $inputs['year'] = $validated['year'];
        $inputs['location'] = $validated['location'];

        // fks
        $inputs['status_id'] = $validated['status_id'];

        // ORIGINAL
        $upload = $validated['original'];
        $filename = getFilename();
        $inputs['original'] = $filename;
        $this->exhibitionService->upload($upload, $filename);

        // SAVE, SESSION, REDIRECT
        Exhibition::create($inputs);
        return redirect()->route('admin.exhibitions.index')->with('success', config(
            'custom.flash.exhibitions.store',
            'A kiállítás létrehozása sikeres volt.'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Exhibition $exhibition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exhibition $exhibition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExhibitionRequest $request, Exhibition $exhibition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibition $exhibition)
    {
        //
    }
}
