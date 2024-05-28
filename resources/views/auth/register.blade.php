@extends('layouts.app')
@section('title', config('app.name')." | ".__('_pages.register.titlePage'))
@section('content')
    <div class="sections-singup">
        <div class="section-singup padding-20 margin-0-auto">
            <form method="POST" action="/register" class="form-singup max-width-727p flex flex-fw-w flex-jc-c padding-10 radius-5">
                <div class="section-logo height-64p">
                    <a class="logo-link" href="#">
                        {{__('_app.logo.tele')}}<span class="x-logo">X</span>{{__('_app.logo.phony')}}
                    </a>
                </div>
                @csrf
                <div class="flex flex-fw-w col-100">
                    <div class="col-50 padding-10">
                        <label for="name" class="requierd">{{__('_user.field.full-name')}}</label>
                        <input id="name" type="text" name="full_name" value="{{old('full_name')}}" placeholder="{{__('_user.text.in-full-name')}}" class="col-100 height-36p radius-5"/>
                        @error('full_name') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-50 padding-10">
                        <label for="username" class="requierd">{{__('_user.field.username')}}</label>
                        <input id="username" type="text" name="username" value="{{old('username')}}" placeholder="{{__('_user.text.in-username')}}" class="col-100 height-36p radius-5"/>
                        @error('username') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-33 padding-10">
                        <label for="country" class="requierd">{{__('_user.field.country')}}</label>
                        <select id="country" name="country" value="{{old('country')}}" class="col-100 height-36p radius-5">
                            @foreach ($listCountry as $country)
                                <option value="{{$country->id()}}">{{$country->name(App::currentLocale())}}</option>
                            @endforeach
                        </select>
                        @error('country') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-33 padding-10">
                        <label for="state" class="requierd">{{__('_user.field.state')}}</label>
                        <select id="state" name="state" value="{{old('state')}}" class="col-100 height-36p radius-5">
                            <option value="0"></option>
                        </select>
                        @error('state') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-33 padding-10">
                        <label for="city" class="requierd">{{__('_user.field.city')}}</label>
                        <select id="city" name="city" value="{{old('city')}}" class="col-100 height-36p radius-5">
                            <option value="0"></option>
                        </select>
                        @error('city') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-100 padding-10">
                        <label for="address" class="requierd">{{__('_user.field.address')}}</label>
                        <input id="address" type="text" name="address" value="{{old('address')}}" placeholder="{{__('_user.text.in-address')}}" class="col-100 height-36p radius-5"/>
                        @error('address') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-50 padding-10">
                        <label for="phone_number" class="requierd">{{__('_user.field.phone')}}</label>
                        <input id="phone_number" type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="{{__('_user.text.in-phone')}}" class="col-100 height-36p radius-5"/>
                        @error('phone_number') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-50 padding-10">
                        <label for="email" class="requierd">{{__('_user.field.email')}}</label>
                        <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="{{__('_user.text.in-email')}}" class="col-100 height-36p radius-5"/>
                        @error('email') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-50 padding-10">
                        <label for="password" class="requierd">{{__('_user.field.password')}}</label>
                        <input id="password" type="password" name="password" placeholder="**********" class="col-100 height-36p radius-5"/>
                        @error('password') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-50 padding-10">
                        <label for="re_password" class="requierd">{{__('_user.field.re-password')}}</label>
                        <input id="re_password" type="password" name="re_password" placeholder="**********" class="col-100 height-36p radius-5"/>
                        @error('re_password') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                        @error('password-compare') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex flex-jc-sb flex-ai-c col-100 padding-10">
                    <div class="col-100">
                        <input class="btn btn-primary radius-5 col-100" type="submit" name="submit" value="{{__('_app.auth.signup')}}"/>
                    </div>
                </div>
                <div class=" flex flex-jc-c col-100 padding-10">
                    <a href="{{ route('login') }}">{{__('_app.auth.i-have')}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection