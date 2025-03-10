<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Opportunity;

class ProjectController extends Controller {
    public function create(Opportunity $opportunity) {
        $applications = $opportunity->applications()->with('user')->get();

        return view('pages.project.project.project_start_user_selection', compact('opportunity', 'applications'));
    }

    public function store(Opportunity $opportunity) {
        dd(request()->all());
    }
}
