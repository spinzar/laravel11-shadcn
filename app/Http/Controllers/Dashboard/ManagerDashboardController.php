<?php

namespace App\Http\Controllers\Dashboard;

use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;

class ManagerDashboardController extends Controller
{
    public function index(): Response
    {
        // Manager-focused dashboard
        return Inertia::render('Dashboard/ManagerIndex');
    }
}
