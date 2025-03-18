<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\Project\Opportunity;

class HomePageController extends Controller {
    public function home() {
        $latestOpportunities = Opportunity::latest()->limit(3)->get();
        $latestForumPosts = ForumPost::where('status', 'published')->latest()->limit(5)->get();

        return view('pages.homepage', compact('latestOpportunities', 'latestForumPosts'));
    }

}
