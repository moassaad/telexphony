@extends('layouts.app')
@section('title', config('app.name')." | ".__('_pages.login.titlePage'))
@section('content')
    <div class="sections-login height-555p">
        <div class="section-login margin-0-auto">
            <form class="form-login radius-5" method="post" action="/login">
                <div class="flex flex-jc-c">
                    <div class="section-logo">
                        <a class="logo-link" href="#">
                            {{__('_app.logo.tele')}}<span class="x-logo">X</span>{{__('_app.logo.phony')}}
                        </a>
                    </div>
                </div>
                {{-- @error('invaled-email-and-password') <div class="flex col-100 box box-danger">{{ $message }}</div> @enderror --}}
                {{-- @if(session('success'))
                    <div class="box box-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="box box-danger">{{ session('error') }}</div>
                @endif --}}
                @csrf
                <div class="form-section-input">
                    <label for="email">{{__('_user.field.email')}}</label> 
                    <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="{{__('_user.text.in-email')}}" class="@error('email') is-invalid @enderror radius-5"/>
                    @error('email') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                </div>
                <div class="form-section-input">
                    <label for="password">{{__('_user.field.password')}}</label>
                    <input id="password" type="password" name="password" value="{{old('password')}}" placeholder="**********" class=" @error('password') is-invalid @enderror radius-5"/>
                    @error('password') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                </div>
                <div class="form-section-button">
                    <input class="btn btn-primary radius-5" type="submit" name="submit" value="{{__('_app.auth.login')}}"/>
                    <a href="/register" class="btn btn-black radius-5">{{__('_app.auth.signup')}}</a>
                </div>
                {{-- <div class="forgot-your-password">
                    <a href="#">{{__('_pages.login.forgot-pass')}}</a>
                </div> --}}
            </form>
        </div>
    </div>
@endsection