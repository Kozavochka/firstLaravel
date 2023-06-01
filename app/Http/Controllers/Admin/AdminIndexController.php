<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminIndexController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());

        return view('layouts.admin');
    }
}
