<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\Project\MessageCreateRequest;
use App\Models\Project\Project;
use Illuminate\Http\Request;

class MessageController extends Controller {

    public function index(Request $request, Project $project) {

    }

    public function store(MessageCreateRequest $request, Project $project) {
        $message = $project->messages()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Message sent.');
    }

}
