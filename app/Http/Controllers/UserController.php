<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function __construct(
        protected UserService $userService,
    ) {}

    public function about()
    {
        $user = $this->userService->getById(2);
        $title = __('Rólam') . ' &mdash; ' . __('Tomecz Dániel');
        return view('about', compact(
            'user',
            'title'
        ));
    }
}
