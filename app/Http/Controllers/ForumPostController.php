<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class ForumPostController extends Controller {
    public function index() {
        $forumPosts = ForumPost::latest()->paginate(10);
        return view('pages.forum.index', compact('forumPosts'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        ForumPost::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content_,
        ]);

        return back()->with('success', 'Forum post created successfully.');
    }

    public function update(Request $request, ForumPost $forumPost) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $forumPost->update([
            'title' => $request->title,
            'content' => $request->content_,
        ]);

        return back()->with('success', 'Forum post updated successfully.');
    }

    public function destroy(ForumPost $forumPost) {
        $forumPost->delete();

        return back()->with('success', 'Forum post deleted successfully.');
    }
}
