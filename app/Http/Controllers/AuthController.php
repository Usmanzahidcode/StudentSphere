<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegistrationRequest;

class AuthController extends Controller {
    public function showRegistrationForm() {
        return view('pages.auth.register');
    }

    public function submitRegistrationForm(RegistrationRequest $request) {
        // TODO: Services or not, Maybe not just do it here.
    }
}
