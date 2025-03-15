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
        return view('pages.admin.dashboard', [
            // Users
            'totalUsers' => User::count(),
            'activeUsers' => User::where('status', 'active')->count(),
            'bannedUsers' => User::where('status', 'banned')->count(),

            // Projects
            'totalProjects' => Project::count(),
            'abortedProjects' => Project::where('status', 'aborted')->count(),
            'completedProjects' => Project::where('status', 'completed')->count(),
            'inProgressProjects' => Project::where('status', 'in_progress')->count(),

            // Opportunities
            'totalOpportunities' => Opportunity::count(),
            'openOpportunities' => Opportunity::where('status', 'open')->count(),
            'closedOpportunities' => Opportunity::where('status', 'closed')->count(),
            'underReviewOpportunities' => Opportunity::where('status', 'under_review')->count(),
        ]);
    }

}
