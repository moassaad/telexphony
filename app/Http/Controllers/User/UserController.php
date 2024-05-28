<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    public function profile() {
        return view('user.profile.index');
    }
}
