<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Opportunity\OpportunityCreateRequest;
use App\Models\FileType;
use Illuminate\Support\Facades\Storage;

class OpportunityController extends Controller {
    public function index() {
        return view('pages.project.opportunities_listing');
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


    public function create() {
        return view('pages.project.opportunities_create');
    }

}
