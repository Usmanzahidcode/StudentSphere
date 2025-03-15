<?php

namespace App\Http\Controllers\Project;

use App\Enums\Project\OpportunityStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Opportunity\OpportunityCreateRequest;
use App\Http\Requests\Project\Opportunity\OpportunityUpdateRequest;
use App\Models\FileType;
use App\Models\Project\Opportunity;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller {
    // Admin
    public function adminIndex() {
        $opportunities = Opportunity::where('status', OpportunityStatus::UNDER_REVIEW)
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('pages.admin.opportunities.index', compact('opportunities'));
    }

    public function adminShow(Opportunity $opportunity) {
        $opportunity->load('user');
        return view('pages.admin.opportunities.show', compact('opportunity'));
    }

    public function approve(Opportunity $opportunity) {
        $opportunity->update(['status' => OpportunityStatus::OPEN]);
        return back()->with('success', 'Opportunity has been approved.');
    }

    public function update(OpportunityUpdateRequest $request, Opportunity $opportunity) {
        // Update basic fields
        $opportunity->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
        ]);

        // Handle file update
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = 'opportunities/' . $opportunity->id . '/';
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Delete old file if exists
            if ($opportunity->file) {
                Storage::disk('documents')->delete($opportunity->file->path . $opportunity->file->filename);
                $opportunity->file()->delete();
            }

            // Store new file
            Storage::disk('documents')->putFileAs($path, $file, $filename);

            // Create new file record
            $opportunity->file()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'filename' => $filename,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'file_type_id' => FileType::where('name', 'Document')->value('id'),
            ]);
        }

        return redirect()->route('opportunities.show', ['opportunity' => $opportunity->id])->with('success', 'Opportunity updated successfully!');
    }

    public function create() {
        return view('pages.project.opportunities_create');
    }

    public function reject(Opportunity $opportunity) {
        $opportunity->update(['status' => OpportunityStatus::CLOSED]);
        return back()->with('success', 'Opportunity has been rejected.');
    }

    public function index() {
        $opportunities = Opportunity::orderByDesc('created_at')
            ->paginate(5);

        return view('pages.project.opportunities_listing', compact('opportunities'));
    }

    public function store(OpportunityCreateRequest $request) {
        $opportunity = auth()->user()->opportunities()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = 'opportunities/' . $opportunity->id . '/';
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            Storage::disk('documents')->putFileAs($path, $file, $filename);

            $fileRecord = $opportunity->file()->create([
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'filename' => $filename,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'file_type_id' => FileType::where('name', 'Document')->value('id'),
            ]);
        }

        // Return success response
        return back()->with('success', 'The Opportunity has been created and is under review!');
    }

    public function show(Opportunity $opportunity) {
        return view('pages.project.opportunities_details', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity) {
        return view('pages.project.opportunities_edit', compact('opportunity'));
    }

    public function destroy(Opportunity $opportunity) {
        $opportunity->delete();
        return redirect()->route('opportunities.index');
    }


}
