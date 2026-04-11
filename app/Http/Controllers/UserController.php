<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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

    public function edit(User $user)
    {
        // POLICY

        $title = 'Beállítások' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        return view('admin.users.edit', compact(
            'user',
            'title'
        ));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        // VALIDATION
        $validated = $request->validated();

        // VALUES
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->cv = $validated['cv'];
        $user->cv_en = $validated['cv_en'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'];
        $user->facebook = $validated['facebook'];
        $user->instagram = $validated['instagram'];
        $user->youtube = $validated['youtube'];

        // SAVE, SESSION, REDIRECT
        $user->save();
        return redirect()->route('admin.users.edit', $user)->with('success', config(
            'custom.flash.users.update',
            'A felhasználó frissítése sikeres volt.'
        ));
    }
}
