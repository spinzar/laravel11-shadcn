<?php

namespace App\Http\Controllers\Dashboard;

use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index(): Response
    {
        // Simpler user-focused dashboard
        return Inertia::render('Dashboard/UserIndex');
    }
}
