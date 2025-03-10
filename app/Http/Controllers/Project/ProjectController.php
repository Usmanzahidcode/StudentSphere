<?php

namespace App\Http\Controllers\Project;

use App\Enums\Project\OpportunityStatus;
use App\Enums\Project\ProjectStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Project\ProjectInitializeRequest;
use App\Models\Project\Opportunity;
use App\Models\Project\Project;

class ProjectController extends Controller {
    public function store(ProjectInitializeRequest $request, Opportunity $opportunity) {
        $project = $opportunity->project()->create([
            'user_id' => $opportunity->user_id,
            'status' => ProjectStatus::IN_PROGRESS,
        ]);

        $opportunity->update([
            'status' => OpportunityStatus::CLOSED,
        ]);

        $project->members()->attach($request->input('selected_applicants'));

        return redirect()->route('projects.show', ['project' => $project])
            ->with('success', 'Project has been started, good luck!');
    }

    public function create(Opportunity $opportunity) {
        $applications = $opportunity->applications()->with('user')->get();

        return view('pages.project.project.project_start_user_selection', compact('opportunity', 'applications'));
    }

    public function show(Project $project) {
        return view('pages.project.project.project_details', ['project' => $project->load(['members', 'opportunity'])]);
    }
}
