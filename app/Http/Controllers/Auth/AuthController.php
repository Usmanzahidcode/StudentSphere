<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function showRegistrationForm() {
        return view('pages.auth.register');
    }

    public function submitRegistrationForm(RegistrationRequest $request) {
        // TODO: Implement random avatar system (Good to have feature not necessary (maybe for the chat system))
        $user = User::create($request->only([
            'email',
            'password',
            'dob',
            'first_name',
            'last_name',
            'gender',
            'github',
            'linkedin',
            'personal_site'
        ]));

        $educationalBackground = $user->educationalBackground()->create(
            $request->only([
                'educational_background.field_of_study',
                'educational_background.institution',
                'educational_background.degree',
                'educational_background.date_of_completion',
            ])['educational_background']
        );

        auth()->login($user);
        return redirect()->intended(route('homepage'));
    }

    public function showLoginForm() {
        return view('pages.auth.login');
    }

    public function submitLoginForm(LoginRequest $request) {
        if (Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('homepage'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function submitLogout() {
        Auth::logout();
        return redirect()->route('login.form');
    }

}
