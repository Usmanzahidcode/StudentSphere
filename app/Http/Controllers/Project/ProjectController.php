<?php

namespace App\Http\Controllers\Project;

use App\Enums\Project\OpportunityStatus;
use App\Enums\Project\ProjectStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Project\ProjectInitializeRequest;
use App\Http\Requests\Project\Project\ProjectRemoveMemberRequest;
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

    public function removeMember(ProjectRemoveMemberRequest $request, Project $project) {
        if ($project->members()->count() <= 1) {
            return back()->with('error', 'You cannot remove all the members');
        }
        $project->members()->detach($request->user_id);
        return back()->with('success', 'Member removed successfully.');
    }


    public function abortProject(Project $project) {
        $project->update(['status' => ProjectStatus::ABORTED]);

        return redirect()->back()->with('success', 'Project has been aborted successfully.');
    }

    public function completeProject(Project $project) {
        $project->update(['status' => ProjectStatus::COMPLETED]);

        return redirect()->back()->with('success', 'Project has been completed successfully.');
    }
}
