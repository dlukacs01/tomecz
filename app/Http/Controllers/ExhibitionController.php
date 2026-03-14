<?php

namespace App\Http\Controllers;

use App\Models\Exhibition;
use App\Http\Requests\StoreExhibitionRequest;
use App\Http\Requests\UpdateExhibitionRequest;
use App\Services\ExhibitionService;

class ExhibitionController extends Controller
{

    public function __construct(
        protected ExhibitionService $exhibitionService,
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
    public function store(StoreExhibitionRequest $request)
    {
        //
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
