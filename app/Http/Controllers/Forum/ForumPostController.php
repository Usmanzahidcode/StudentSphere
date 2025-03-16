<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\ForumPostCreateRequest;
use App\Http\Requests\Forum\ForumPostUpdateRequest;
use App\Models\ForumPost;

class ForumPostController extends Controller {
    public function index() {
        $forumPosts = ForumPost::latest()->paginate(10);
        return view('pages.forum.index', compact('forumPosts'));
    }

    public function store(ForumPostCreateRequest $request) {
        auth()->user()->forumPosts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Forum post created successfully.');
    }

    public function update(ForumPostUpdateRequest $request, ForumPost $forumPost) {
        $forumPost->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Forum post updated successfully.');
    }

    public function destroy(ForumPost $forumPost) {
        $forumPost->delete();

        return back()->with('success', 'Forum post deleted successfully.');
    }
}
