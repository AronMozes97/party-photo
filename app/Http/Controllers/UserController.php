<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logout()
    {
        auth()->logout();

        session()->invalidate();

        return redirect(route('user.login'));
    }
}
