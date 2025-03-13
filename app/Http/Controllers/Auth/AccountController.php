<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller {
    // View Methods
    public function profile() {
        $user = auth()->user();
        return view('pages.auth.account.profile', compact('user'));
    }

    public function background() {
        $user = auth()->user();
        $background = $user->background; // Assuming relationship exists
        return view('pages.auth.account.background', compact('background'));
    }

    public function password() {
        return view('pages.auth.account.password');
    }

    public function projects() {
        $user = auth()->user();
        $projects = $user->projects;
        $participatedProjects = $user->participatedProjects;
        $opportunities = $user->opportunities;

        return view('pages.auth.account.projects', compact('projects', 'participatedProjects', 'opportunities'));
    }

    public function management() {
        $user = auth()->user();
        return view('pages.auth.account.management', compact('user'));
    }

    // Update Methods
    public function updateProfile(Request $request) {
        $user = auth()->user();
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updateBackground(Request $request) {
        $user = auth()->user();
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'date_of_completion' => 'required|date',
        ]);

        $user->educationalBackground()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only(['institution', 'degree', 'field_of_study', 'date_of_completion'])
        );

        return back()->with('success', 'Background information updated successfully.');
    }

    public function updatePassword(Request $request) {
        $user = auth()->user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }

    public function updateProjects(Request $request) {
        // Logic for updating projects can be implemented later
        return back()->with('success', 'Projects updated successfully.');
    }

    public function updateManagement(Request $request) {
        // Logic for account management settings
        return back()->with('success', 'Account management settings updated successfully.');
    }

    // Account Actions
    public function deactivate() {
        $user = auth()->user();
        $user->update(['active' => false]);
        return back()->with('success', 'Account deactivated successfully.');
    }

    public function delete() {
        $user = auth()->user();
        $user->delete();
        return redirect('/')->with('success', 'Account deleted successfully.');
    }
}
