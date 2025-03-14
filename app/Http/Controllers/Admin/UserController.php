<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display a specific user.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Ban a user.
     */
    public function ban(User $user)
    {
        $user->update(['status' => 'banned']);
        return back()->with('success', 'User has been banned.');
    }

    /**
     * Unban a user.
     */
    public function unban(User $user)
    {
        $user->update(['status' => 'active']);
        return back()->with('success', 'User has been unbanned.');
    }
}
