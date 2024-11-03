<?php

namespace App\Http\Controllers\API\Application\User;

use App\Exceptions\API\InternalServerErrorException;
use App\Exceptions\API\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\AccountContactRequest;
use App\Http\Requests\User\Profile\AddressRequest;
use App\Http\Requests\User\Profile\UserInformationRequest;
use App\Http\Resources\API\UserResource;
use App\Models\User;
use App\Services\APIResponse;
use App\Support\Address\AddressCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile() 
    {
        // TODO create message
        return APIResponse::new()->successOk("success",new UserResource(Auth::user()));
    }
    public function updateUserInformation(UserInformationRequest $request)
    {
        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);
        $user->full_name = $creaditionals['full_name'];
        $user->username = $creaditionals['username'];
        $checkUpdate = $user->update();
        // $checkUpdate = true;
        if(!$checkUpdate) {
            throw new InternalServerErrorException(__('_user.messages.error.information-update'));
        }
        return APIResponse::new()->successOk(__('_user.messages.success.information-update'),new UserResource($user));
    }
    public function updateAccountContact(AccountContactRequest $request)
    {
        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);
        $user->phone_number = $creaditionals['phone_number'];
        $user->email = $creaditionals['email'];
        $checkUpdate = $user->update();
        // $checkUpdate = false; // error
        // $checkUpdate = true;
        if(!$checkUpdate) {
            throw new InternalServerErrorException(__('_user.messages.error.information-update'));
        }
        return APIResponse::new()->successOk(__('_user.messages.success.information-update'),new UserResource($user));
    }
    public function updateAddress(AddressRequest $request)
    {
        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);

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

        $address = json_encode([
                "country"   => $creaditionals['country'],
                "state"     => $creaditionals['state'],
                "city"      => $creaditionals['city'],
                "address"   => $creaditionals['address'],
            ]);
        $user->address = $address;

        $checkUpdate = $user->update();
        // $checkUpdate = false; //error
        // $checkUpdate = true;
        if(!$checkUpdate) {
            throw new InternalServerErrorException(__('_user.messages.error.address-update'));
        }
        return APIResponse::new()
            ->successOk(
                __('_user.messages.success.address-update'),
                new UserResource($user)
            );
    }
}
