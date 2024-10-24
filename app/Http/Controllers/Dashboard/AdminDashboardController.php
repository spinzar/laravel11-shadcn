<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Company;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Dashboard/AdminIndex', [
            'totalUsers' => User::count(),
            'totalCompanies' => Company::count(),
        ]);
    }
}
