<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project\Opportunity;
use App\Models\Project\Project;
use App\Models\User\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'bannedUsers' => User::count(),
            'totalProjects' => Project::count(),
            'totalOpportunities' => Opportunity::count(),
        ]);
    }
}
