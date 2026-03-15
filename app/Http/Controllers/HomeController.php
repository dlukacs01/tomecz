<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeSearchRequest;
use App\Services\CategoryService;
use App\Services\PhotoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function __construct(
        protected CategoryService $categoryService,
        protected PhotoService $photoService,
    )
    {}

    public function index()
    {
        $categories = $this->categoryService->getAllWithProjectsAndPhotos();
        return view('home', compact('categories'));
    }

    public function search(HomeSearchRequest $request)
    {
        $validated = $request->validated();
        $search = $validated['search'];
        $title = __('Találatok a következőre') . ': ' . $search . ' &mdash; ' . __('Tomecz Dániel');
        $photos = $this->photoService->getBySearch($search);
        return view('search', compact(
            'search',
            'title',
            'photos'
        ));
    }

    public function locale(Request $request)
    {
        $locale = $request->input('locale');
        session(['locale' => $locale]);
        return redirect()->back();
    }
}
