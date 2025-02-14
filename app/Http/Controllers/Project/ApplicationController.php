<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;

class ApplicationController extends Controller {
    public function index(Opportunity $opportunity) {
        $applications = $opportunity->applications()
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate();

        return view('pages.project.application.applications_listing', compact('opportunity', 'applications'));
    }

    public function create(Opportunity $opportunity){
        return view('pages.project.application.opportunities_create', compact('opportunity'));
    }
}
