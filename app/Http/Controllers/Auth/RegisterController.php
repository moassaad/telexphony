<?php

namespace App\Http\Controllers\Auth;
use \App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

use App\Models\User;
use App\Support\Address\AddressCode;
use App\Traits\GenerateIDsTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
class RegisterController extends Controller
{
    use GenerateIDsTrait;
    public function show() {
        if(Auth::check())
        {
            return back();
        }
        $listCountry = AddressCode::country()->listCountry();
        return view('auth.register', compact(['listCountry']));
    }
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

        if(!$checkSave) {
            return redirect()
                ->route('register')
                ->with(['error'=>__('_user.messages.error.register-save')])
                ->withInput();
        }
        return redirect()
            ->route('login')
            ->with(['success'=>__('_user.messages.success.register-save')])
            ->onlyInput('email');
    }
}
