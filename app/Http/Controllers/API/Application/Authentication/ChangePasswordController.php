<?php

namespace App\Http\Controllers\API\Application\Authentication;

use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;
use App\Services\APIResponse;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {

        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);
        
        if(!Hash::check($creaditionals['current_password'], $user->password))
        {
            throw new ValidationException(__('_user.messages.error.pass-correct'));
        }

        if($creaditionals['new_password'] !== $creaditionals['re_password'])
        {
            throw new ValidationException(__('_user.messages.error.pass-match'));
        }

        $user->password = Hash::make($creaditionals['new_password']);

        $checkSave = $user->update();
        // $checkSave = false; // error
        // $checkSave = true;
        if(!$checkSave) {
            throw new InternalServerErrorException(__('_user.messages.error.pass-update'));
        }
        return APIResponse::new()->successOk(__('_user.messages.success.pass-update'), $user);
    }
}
