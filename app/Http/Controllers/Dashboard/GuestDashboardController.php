<?php

namespace App\Http\Controllers\Dashboard;

use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;

class GuestDashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard/GuestIndex', [
            'welcomeMessage' => 'Welcome to the Guest Dashboard!',
        ]);
    }
}
