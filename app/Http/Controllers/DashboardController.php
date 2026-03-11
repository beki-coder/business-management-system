<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index()
    {

        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            return Inertia::render('Admin/Dashboard');
        }

        if ($user->hasRole('Manager')) {
            return Inertia::render('Manager/Dashboard');
        }

        return Inertia::render('Employee/Dashboard');
    }
}