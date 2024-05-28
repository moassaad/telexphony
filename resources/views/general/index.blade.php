@extends('layouts.app')
@section('title', config('app.name')." | ".__('_pages.home.titlePage'))
@section('content')
    <div class="sections-search background-image height-565p">
        <div class="section-search">
            <div class="search-section">
                <h1>{{__('_pages.home.title')}}</h1>
                <p>{{__('_pages.home.titlemini')}}</p>
                {{-- @error('imei') <div class="alert alert-danger alert-center">{{ $message }}</div> @enderror --}}
                {{-- @if(session('success'))
                    <div class="alert alert-danger alert-center">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-center">{{ session('error') }}</div>
                @endif --}}
                <form action="{{route('phone.search.imei.post')}}" method="POST" class="form-search flex flex-jc-c max-width-727p margin-0-auto">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="search" name="imei" placeholder="{{__('_phone.text.in-imei')}}" class="form-input col-80 radius-5 @error('imei') is-invalid @enderror">
                    <button type="submit" class="custom-button-search btn btn-primary col-20 radius-5">{{__('_pages.home.search')}}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="sections-using">
        <div class="section-using margin-0-auto col-100">
            <div class="subtitle-page">
                <h2>{{__('_pages.home.howUsing')}}</h2>
            </div>
            <ul class="using-steps flex flex-jc-sb ">
                <li class="col-33">
                    <div class="using">
                        <p class="step">1</p>
                        <h3>{{__('_pages.home.title-step1')}}</h3>
                        <p>{{__('_pages.home.order-number')}} <strong><bdi>*#06#</bdi></strong> {{__('_pages.home.step1')}}</p>
                        {{-- <p>Order number <strong>*#06#</strong> to show imei your phone OR go to Setting > About > Information Device</p> --}}
                    </div>
                </li>
                <li class="col-33">
                    <div class="using">
                        <p class="step">2</p>
                        <h3>{{__('_pages.home.title-step2')}}</h3>
                        <p>{{__('_pages.home.step2')}}</p>
                    </div>
                </li>
                <li class="col-33">
                    <div class="using">
                        <p class="step">3</p>
                        <h3>{{__('_pages.home.title-step3')}}</h3>
                        <p>{{__('_pages.home.step3')}}</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection