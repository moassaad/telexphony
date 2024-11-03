<?php

namespace App\Http\Controllers\API\Application\Authentication;

use App\Exceptions\API\ErrorException;
use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\API\UserResource;
use App\Models\User;
use App\Services\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try
        {
            // return response("yes");
            $valid = $request->validated();
    
            $user = User::where(['email'=>$valid['email']])->first();
            if($this->isEmailAndPasswordValid($user,$valid['password']))
            {
                $tokenName = $this->generateTokenName($request);
                // $token = $user->createToken($tokenName)->plainTextToken;
                $token = "6|YmVcsJ36IWzKH0Ls9AhxojXiWRkFqmzqBnUsbQQg";
    
                return APIResponse::new()
                    ->successOk(
                        __('_user.text.welcome'),
                        [
                            "user"=>new UserResource($user),
                            "token"=>$token
                        ]
                );
            }
            else
            {
                throw new ErrorException( __('_user.messages.error.user-pass-incorrect') );
            }
        }
        catch(\Exception $e)
        {
            throw new InternalServerErrorException($e->getMessage());
        }
        
    }
    private function isEmailAndPasswordValid(User $user, string $password)
    {
        return $user && Hash::check($password, $user->password);
    }
    private function generateTokenName(Request $request): string
    {
        return $request->post('device_name', $request->userAgent());
    }
}
