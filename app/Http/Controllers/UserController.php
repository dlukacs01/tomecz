<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function contact()
    {
        $user = $this->userService->getById(2);
        $title = __('Kapcsolat') . ' &mdash; ' . __('Tomecz Dániel');
        return view('contact', compact(
            'user',
            'title'
        ));
    }

    public function password_edit(User $user)
    {

    }

    public function password_update(User $user)
    {

    }
}
