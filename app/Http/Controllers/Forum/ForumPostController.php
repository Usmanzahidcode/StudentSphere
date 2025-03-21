<?php

namespace App\Http\Controllers\Forum;

use App\Enums\Forum\ForumPostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\ForumPostCreateRequest;
use App\Http\Requests\Forum\ForumPostUpdateRequest;
use App\Http\Requests\Forum\ForumPostVoteRequest;
use App\Models\ForumPost;

class ForumPostController extends Controller {
    public function index() {
        $forumPosts = ForumPost::where('status', ForumPostStatus::PUBLISHED)->latest()->paginate(10);
        return view('pages.forum.index', compact('forumPosts'));
    }

    public function adminIndex() {
        $forumPosts = ForumPost::with('user')->latest()->paginate(10);
        return view('pages.admin.forum.forum_management', compact('forumPosts'));
    }

    public function store(ForumPostCreateRequest $request) {
        auth()->user()->forumPosts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => ForumPostStatus::UNDER_REVIEW,
        ]);

        return back()->with('success', 'Forum post created successfully and is under review.');
    }

    public function destroy(ForumPost $forumPost) {
        $forumPost->delete();
        return back()->with('success', 'Forum post deleted successfully.');
    }

    public function vote(ForumPostVoteRequest $request, ForumPost $forumPost) {
        $existingVote = $forumPost->userVote(auth()->user());

        if ($existingVote) {
            if ($existingVote->type->value===$request->type) {
                $existingVote->delete();
            } else {
                $existingVote->update(['type' => $request->type]);
            }
        } else {
            $forumPost->votes()->create([
                'user_id' => auth()->id(),
                'type' => $request->type,
            ]);
        }

        return back();
    }

    public function update(ForumPostUpdateRequest $request, ForumPost $forumPost) {
        $forumPost->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Forum post updated successfully.');
    }

    public function approve(ForumPost $forumPost) {
        $forumPost->update(['status' => ForumPostStatus::PUBLISHED]);
        return back()->with('success', 'Forum post approved and published.');
    }
}
