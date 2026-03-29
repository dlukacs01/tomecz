<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $title = 'Admin felület' . ' &mdash; ' . config('app.name', 'Tomecz Dániel');
        return view('admin.index', compact('title'));
    }
}
