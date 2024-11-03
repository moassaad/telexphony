<?php

namespace App\Http\Controllers\API\Application\Authentication;

use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\API\UserResource;
use App\Models\User;
use App\Services\APIResponse;
use App\Support\Address\AddressCode;
use App\Traits\GenerateIDsTrait;
use Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use GenerateIDsTrait;
    public function register(RegisterRequest $request) {
        $creaditionals = $request->validated();
        if($creaditionals['password'] !== $creaditionals['re_password'])
        {
            return redirect()
                ->route('register')
                ->with(['error'=>__('_user.messages.error.pass-match')])
                ->withInput();
        }
        $user = new User();
        $creaditionals = $request->validated();

        // Check validate address
        $country = AddressCode::country();
        // if(true)
        if(!$country->check($creaditionals['country']))
        {
            throw new NotFoundException(__('_user.messages.error.country-nf'));
        }
        $governorate = AddressCode::governorate($creaditionals['country']);
        if(!$governorate->check($creaditionals['state']))
        {
            throw new NotFoundException(__('_user.messages.error.state-nf'));
        }
        $city = AddressCode::city($creaditionals['country'],$creaditionals['state']);
        if(!$city->check($creaditionals['city']))
        {
            throw new NotFoundException(__('_user.messages.error.city-nf'));
        }

        $userAtterbute = [
            "UserID"    => self::generateUserID(), // telex-{generate}-phony
            "full_name" => $creaditionals['full_name'],
            "username"  => $creaditionals['username'],
            "address"   => json_encode([
                "address"   => $creaditionals['address'],
                "country"   => $creaditionals['country'],
                "state"     => $creaditionals['state'],
                "city"      => $creaditionals['city']
            ]),
            "phone_number"     => $creaditionals['phone_number'],
            "email"     => $creaditionals['email'],
            "password"  => Hash::make($creaditionals['password']),
        ];
        
        $user->setRawAttributes($userAtterbute);
        $checkSave = $user->save();
        // $checkSave = false; // error
        // $checkSave = true;
        
        if(!$checkSave) {
            throw new InternalServerErrorException(__('_user.messages.error.register-save'));
        }
        $tokenName = $this->generateTokenName($request);
        $token = $user->createToken($tokenName)->plainTextToken;
        // $token = "6|YmVcsJ36IWzKH0Ls9AhxojXiWRkFqmzqBnUsbQQg";
        return APIResponse::new()
            ->successOk(
                __('_user.messages.success.register-save'),
                [
                    "user"=>new UserResource($user),
                    "token"=>$token
                ]
        );
    }
    private function generateTokenName(Request $request): string
    {
        return $request->post('device_name', $request->userAgent());
    }
}
