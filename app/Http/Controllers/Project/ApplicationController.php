<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Application\ApplicationCreateRequest;
use App\Models\Project\Application;
use App\Models\Project\FileType;
use App\Models\Project\Opportunity;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller {
    public function index(Opportunity $opportunity) {
        $applications = $opportunity->applications()
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate();

        return view('pages.project.application.applications_listing', compact('opportunity', 'applications'));
    }

    public function create(Opportunity $opportunity){
        return view('pages.project.application.applications_create', compact('opportunity'));
    }

    public function store(ApplicationCreateRequest $request, Opportunity $opportunity){
        $application = $opportunity->applications()->create([
            'user_id' => auth()->id(),
            'body' => $request->input('body')
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = 'applications/' . $application->id . '/';
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            Storage::disk('documents')->putFileAs($path, $file, $filename);

            $fileRecord = $application->file()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'filename' => $filename,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'file_type_id' => FileType::where('name', 'Document')->value('id'),
            ]);
        }

        // Return success response
        return back()->with('success', 'The Application has been submitted!');
    }

    public function show(Opportunity $opportunity, Application $application){
        return view('pages.project.application.applications_details', ['opportunity' => $opportunity, 'application' => $application]);
    }
}
