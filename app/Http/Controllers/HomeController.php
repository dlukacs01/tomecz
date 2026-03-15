<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeSearchRequest;
use App\Services\CategoryService;
use App\Services\PhotoService;
use App\Services\VideoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function __construct(
        protected CategoryService $categoryService,
        protected PhotoService $photoService,
        protected VideoService $videoService
    )
    {}

    public function index()
    {
        $categories = $this->categoryService->getAllWithProjectsAndPhotos();
        $videos = $this->videoService->getRecent();
        return view('home', compact(
            'categories',
            'videos'
        ));
    }

    public function search(HomeSearchRequest $request)
    {
        $validated = $request->validated();
        $search = $validated['search'];
        $title = __('Találatok a következőre') . ': ' . $search . ' &mdash; ' . __('Tomecz Dániel');
        $photos = $this->photoService->getBySearch($search);
        $videos = $this->videoService->getBySearch($search);
        return view('search', compact(
            'search',
            'title',
            'photos',
            'videos'
        ));
    }

    public function locale(Request $request)
    {
        $locale = $request->input('locale');
        session(['locale' => $locale]);
        return redirect()->back();
    }
}
