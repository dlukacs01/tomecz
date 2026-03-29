<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{

    public function __construct(
        protected CategoryService $categoryService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = 'Kategóriák megtekintése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        $categories = $this->categoryService->getAllForAdminIndex();
        return view('admin.categories.index', compact(
            'title',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Kategória létrehozása' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        return view('admin.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $inputs['name'] = $validated['name'];
        $inputs['name_en'] = $validated['name_en'];
        $inputs['slug'] = getSlug($inputs['name']);

        // POSITION
        $categories = $this->categoryService->getAllForAdminPosition();
        $inputs['position'] = getPosition($categories);

        // SAVE, SESSION, REDIRECT
        Category::create($inputs);
        return redirect()->route('admin.categories.index')->with('success', config(
            'custom.flash.categories.store',
            'A kategória létrehozása sikeres volt.'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

        // POLICY
        $title = 'Kategória szerkesztése' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        return view('admin.categories.edit', compact(
            'title',
            'category'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //

        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $category->name = $validated['name'];
        $category->name_en = $validated['name_en'];
        $category->slug = getSlug($category->name);

        // POSITION
        $old = $category->position;
        $new = $category->position = $validated['position'];
        $categories = $this->categoryService->getAllForAdminPosition();
        updatePosition($old, $new, $categories, 'categories');

        // SAVE, SESSION, REDIRECT
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', config(
            'custom.flash.categories.update',
            'A kategória frissítése sikeres volt.'
        ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
