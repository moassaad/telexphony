<?php

namespace App\Http\Controllers\API\Application\Authentication;


use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\UnauthorizedException;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\UserResource;
use App\Services\APIResponse;
use Auth;


class LogoutController extends Controller
{
    public function logout()
    {
        try
        {
            if(Auth::check())
            {
                // Auth::user()->tokens()->delete(); // Logout for all lonin -> delete all tokens
                $user = Auth::user();
                
                Auth::user()->tokens()->find(
                    Auth::user()->currentAccessToken()->id
                )->delete(); // Logout for one lonin -> delete current token
            
                return APIResponse::new()->successOk("logout successful", new UserResource($user));
            }
            else
            {
                return APIResponse::new()->errorUnauthorized("Unauthorized");
            }
        }
        catch(\Exception $error)
        {
            throw new InternalServerErrorException($error->getMessage());
        }
    }
}