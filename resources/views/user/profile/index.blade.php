@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="sections-panner background-image flex col-100 margin-0-auto padding-0-20 height-150p">
        <div class="section-panner col-100 flex flex-ai-c">
            <div class="panner-section col-100">
                <h1 class="">{{__('_user.text.hello')}}, {{ Auth::user()->full_name }}</h1>
                <p>{{__('_user.text.welcome')}}</p>
            </div>
        </div>
    </div>
    <div class="sections-profile padding-20 margin-0-auto">
        <div class="section-profile">
            <div class="user-information max-width-727p radius-5 margin-0-auto margin-top-20 margin-bottom-20">
                <h3 class="padding-0-20 padding-top-20">{{__('_user.text.user-info')}}</h3>
                <form method="POST" action="{{ route('user.profile.edit.info') }}" class="form-singup flex flex-fw-w flex-jc-c padding-10 margin-0-auto radius-5">
                    <div class="flex flex-fw-w col-100">
                        @method('PUT')
                        @csrf
                        <div class="col-50 padding-10">
                            <label for="name" class="">{{__('_user.field.full-name')}}</label>
                            <input id="name" type="text" name="full_name" value="{{ Auth::user()->full_name }}" placeholder="{{__('_user.text.in-full-name')}}" class="col-100 height-36p radius-5"/>
                            @error('full_name') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                        <div class="col-50 padding-10">
                            <label for="username" class="">{{__('_user.field.username')}}</label>
                            <input id="username" type="text" name="username" value="{{ Auth::user()->username }}" placeholder="{{__('_user.text.in-username')}}" class="col-100 height-36p radius-5"/>
                            @error('username') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                        
                    </div>
                    <div class="flex flex-jc-fe flex-ai-c col-100 padding-10">
                        <div class="">
                            <input class="btn btn-black radius-5 col-100" type="submit" name="submit" value="{{__('_app.text.save')}}"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="user-information max-width-727p radius-5 margin-0-auto margin-top-20 margin-bottom-20">
                <h3 class="padding-0-20 padding-top-20">{{__('_user.field.address')}}</h3>
                <form method="POST" action="{{ route('user.profile.edit.address') }}" class="form-singup flex flex-fw-w flex-jc-c padding-10 margin-0-auto radius-5">
                    <div class="flex flex-fw-w col-100">
                        @csrf
                        @method('PUT')
                        <div class="col-33 padding-10">
                            <label for="country" class="">{{__('_user.field.country')}}</label>
                            <select id="country" name="country" class="col-100 height-36p radius-5" >
                                @foreach ($listCountry as $country)
                                    <option value="{{$country->id()}}" 
                                        @if ($country->id() == $address->country_code)
                                            selected    
                                        @endif>
                                        {{$country->name(App::currentLocale())}}
                                    </option>
                                @endforeach
                            </select>
                            @error('country') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                        <div class="col-33 padding-10">
                            <label for="state" class="">{{__('_user.field.state')}}</label>
                            <select id="state" name="state" class="col-100 height-36p radius-5">
                                @foreach ($listGov as $gov)
                                    <option value="{{$gov->id()}}" 
                                        @if ($gov->id() == $address->state_code)
                                            selected    
                                        @endif>
                                        {{$gov->name(App::currentLocale())}}
                                    </option>
                                @endforeach
                            </select>
                            @error('state') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                        <div class="col-33 padding-10">
                            <label for="city" class="">{{__('_user.field.city')}}</label>
                            <select id="city" name="city" class="col-100 height-36p radius-5">
                                @foreach ($listCity as $city)
                                    <option value="{{$city->id()}}" 
                                        @if ($city->id() == $address->city_code)
                                            selected    
                                        @endif>
                                        {{$city->name(App::currentLocale())}}
                                    </option>
                                @endforeach
                            </select>
                            @error('city') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                        <div class="col-100 padding-10">
                            <label for="address" class="">{{__('_user.field.address')}}</label>
                            <input id="address" type="text" name="address" value="{{ $address->line_two }}" placeholder="{{__('_user.text.in-address')}}" class="col-100 height-36p radius-5"/>
                            @error('address') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="flex flex-jc-fe flex-ai-c col-100 padding-10">
                        <div class="">
                            <input class="btn btn-black radius-5 col-100" type="submit" name="submit" value="{{__('_app.text.save')}}"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="user-information max-width-727p radius-5 margin-0-auto margin-top-20 margin-bottom-20">
                <h3 class="padding-0-20 padding-top-20">{{__('_user.text.acc-contact')}}</h3>
                <form method="POST" action="{{ route('user.profile.edit.account_contact') }}" class="form-singup flex flex-fw-w flex-jc-c padding-10 margin-0-auto radius-5">
                    <div class="flex flex-fw-w col-100">
                        @method('PUT')
                        @csrf
                        <div class="col-100 padding-10">
                            <label for="phone_number" class="">{{__('_user.field.phone')}}</label>
                            <input id="phone_number" type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" placeholder="{{__('_user.text.in-phone')}}" class="col-100 height-36p radius-5"/>
                            @error('phone_number') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                        <div class="col-100 padding-10">
                            <label for="email" class="">{{__('_user.field.email')}}</label>
                            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" placeholder="{{__('_user.text.in-email')}}" class="col-100 height-36p radius-5"/>
                            @error('email') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="flex flex-jc-fe flex-ai-c col-100 padding-10">
                        <div class="">
                            <input class="btn btn-black radius-5 col-100" type="submit" name="submit" value="{{__('_app.text.save')}}"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="user-information max-width-727p radius-5 margin-0-auto margin-top-20 margin-bottom-20">
                <h3 class="padding-0-20 padding-top-20">{{__('_user.text.change-pass')}}</h3>
                <form method="POST" action="{{ route('user.profile.edit.change_password') }}" class="form-singup flex flex-fw-w flex-jc-c padding-10 margin-0-auto radius-5">
                    <div class="flex flex-fw-w col-100">
                        @method('PUT')
                        @csrf
                        <div class="col-100 padding-10">
                            <label for="current_password" class="">{{__('_user.field.cr-password')}}</label>
                            <input id="current_password" type="password" name="current_password" placeholder="**********" class="col-100 height-36p radius-5"/>
                        </div>
                        <div class="col-100 padding-10">
                            <label for="new_password" class="">{{__('_user.field.new-password')}}</label>
                            <input id="new_password" type="password" name="new_password" placeholder="**********" class="col-100 height-36p radius-5"/>
                        </div>
                        <div class="col-100 padding-10">
                            <label for="re_password" class="">{{__('_user.field.re-password')}}</label>
                            <input id="re_password" type="password" name="re_password" placeholder="**********" class="col-100 height-36p radius-5"/>
                        </div>
                    </div>
                    <div class="flex flex-jc-fe flex-ai-c col-100 padding-10">
                        <div class="">
                            <input class="btn btn-black radius-5 col-100" type="submit" name="submit" value="{{__('_app.text.save')}}"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection