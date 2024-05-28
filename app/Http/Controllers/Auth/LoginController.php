<?php

namespace App\Http\Controllers\Auth;
use \App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function show() {
        if(Auth::check())
        {
            return back();
        }
        return view('auth.login');
    }
    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        $checkUserInput = Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
        if(!$checkUserInput) {            
            return back()->with(['error' => __('_user.messages.error.user-pass-incorrect')]);
            // return response(["Incorrect username or password"], Response::HTTP_NOT_FOUND);
        }
        $request->session()->regenerate();
        
        return redirect()->intended(route('home'));
    }
    // public function logout(LoginRequest $request) {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('home');
    // }
}
