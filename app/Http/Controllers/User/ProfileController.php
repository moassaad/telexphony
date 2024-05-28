<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\AccountContactRequest;
use App\Http\Requests\User\Profile\AddressRequest;
use App\Http\Requests\User\Profile\UserInformationRequest;
use App\Models\User;
use App\Support\Address\AddressCode;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function profile() {
        
        // return dd(auth()->user()->address);

        $address = auth()->user()->address;
        $countryObj = AddressCode::country($address->country_code);
        $listCountry = $countryObj->listCountry();
        $govObj = AddressCode::governorate($address->country_code,$address->state_code);
        $listGov = $govObj->listGovernorate();
        $cityObj = AddressCode::city($address->country_code,$address->state_code,$address->city_code);
        $listCity = $cityObj->listCity();

        // return dd($listCity);

        return view('user.profile.index', compact(['address','listCountry','listGov','listCity']));
    }

    public function updateUserInformation(UserInformationRequest $request)
    {
        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);
        $user->full_name = $creaditionals['full_name'];
        $user->username = $creaditionals['username'];
        $checkUpdate = $user->update();
        if(!$checkUpdate) {
            return back()
                ->with(['error'=>__('_user.messages.error.information-update')])
                ->withInput();
        }
        return back()
            ->with(['success'=>__('_user.messages.success.information-update')])
            ->onlyInput('email');
    }

    public function updateAccountContact(AccountContactRequest $request)
    {
        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);
        $user->phone_number = $creaditionals['phone_number'];
        $user->email = $creaditionals['email'];
        // return response([$creaditionals, $user]);
        $checkUpdate = $user->update();
        if(!$checkUpdate) {
            return back()
                ->with(['error'=>__('_user.messages.error.information-update')]);
        }
        return back()->with(['success'=>__('_user.messages.success.information-update')]);
    }

    public function updateAddress(AddressRequest $request)
    {
        $creaditionals = $request->validated();
        $user = User::find(Auth::user()->UserID);

        // Check validate address
        $country = AddressCode::country();
        if(!$country->check($creaditionals['country']))
        {
            return back()->withErrors(['country'=>__('_user.messages.error.country-nf')])
                ->with(['error'=>__('_user.messages.error.country-nf')]);
        }
        $governorate = AddressCode::governorate($creaditionals['country']);
        if(!$governorate->check($creaditionals['state']))
        {
            return back()->withErrors(['state'=>__('_user.messages.error.state-nf')])
                ->with(['error'=>__('_user.messages.error.state-nf')]);
        }
        $city = AddressCode::city($creaditionals['country'],$creaditionals['state']);
        if(!$city->check($creaditionals['city']))
        {
            return back()->withErrors(['city'=>__('_user.messages.error.city-nf')])
                ->with(['error'=>__('_user.messages.error.city-nf')]);
        }
        // return response([$city->check($creaditionals['city'])]);
        $address = json_encode([
                "country"   => $creaditionals['country'],
                "state"     => $creaditionals['state'],
                "city"      => $creaditionals['city'],
                "address"   => $creaditionals['address'],
            ]);
        $user->address = $address;

        // return response([$creaditionals, $user]);

        $checkUpdate = $user->update();
        if(!$checkUpdate) {
            return back()
                ->with(['error'=>__('_user.messages.error.address-update')]);
        }
        return back()->with(['success'=>__('_user.messages.success.address-update')]);
    }
    
}
