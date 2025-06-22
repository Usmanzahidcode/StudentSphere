<?php

namespace App\Http\Controllers\Admin;

use App\Enums\User\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User\User;

class UserController extends Controller {
    public function index() {
        $users = User::paginate(10);
        return view('pages.admin.users.index', compact('users'));
    }

    public function show(User $user) {
        return view('pages.admin.users.show', compact('user'));
    }

    public function ban(User $user) {
        if($user->isAdmin()){
            return back()->with('error', 'Cannot ban an admin.');
        }

        $user->update(['status' => UserStatus::BANNED]);
        return back()->with('success', 'User has been banned.');
    }

    public function unban(User $user) {
        $user->update(['status' => UserStatus::ACTIVE]);
        return back()->with('success', 'User has been unbanned.');
    }
}
