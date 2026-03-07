<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function __construct(
        protected CategoryService $categoryService
    )
    {}

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('home', compact('categories'));
    }

    public function locale(Request $request)
    {
        $locale = $request->input('locale');
        session(['locale' => $locale]);
        return redirect()->back();
    }
}
