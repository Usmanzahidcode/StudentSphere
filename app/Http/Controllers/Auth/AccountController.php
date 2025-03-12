<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AccountController extends Controller {
    public function test() {
        return view('pages.auth.account.accountpage');
    }
}
