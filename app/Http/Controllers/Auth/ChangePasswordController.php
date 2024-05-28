<?php

namespace App\Http\Controllers\Auth;
use \App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChangePasswordController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {

        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);
        
        if(!Hash::check($creaditionals['current_password'], $user->password))
        {
            return back()->with(['error'=>__('_user.messages.error.pass-correct')]);
        }

        if($creaditionals['new_password'] !== $creaditionals['re_password'])
        {
            return back()->with(['error'=>__('_user.messages.error.pass-match')]);
        }

        $user->password = Hash::make($creaditionals['new_password']);

        $checkSave = $user->update();
        if(!$checkSave) {
            return back()
                ->with(['error'=>__('_user.messages.error.pass-update')]);
        }
        return back()
            ->with(['success'=>__('_user.messages.success.pass-update')]);

    }
}
