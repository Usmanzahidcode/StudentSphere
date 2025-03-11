<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class ProfileController extends Controller {
    public function profile(User $user) {
        return view('pages.auth.user_profile', [
            'user' => $user->load(['educationalBackground', 'projects', 'participatedProjects', 'opportunities'])
        ]);
    }

}
