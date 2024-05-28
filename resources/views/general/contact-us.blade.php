@extends('layouts.app')
@section('title', config('app.name')." | ".__('_pages.contact-us.titlePage'))

@section('content')
    <div class="sections-panner background-image flex col-100 margin-0-auto padding-0-20 height-100p">
        <div class="section-panner col-100 flex flex-ai-c">
            <div class="panner-section col-100">
                <h1 class="">{{__('_pages.contact-us.titlePage')}}</h1>
                <p>{{__('_pages.contact-us.subtitle')}}</p>
            </div>
        </div>
    </div>
    <div class="flex max-width-1250p padding-20">
        {{-- <div class=" col-50 contact-me">
            <header>
                <h2>Contact Me</h2>
            </header>
            <ul class="contact-list">
                <li>
                    Email : <a href="#" >mohammadasaadgo@gmail.com</a>
                </li>
                <li>
                    LinkedIn : <a href="#" >@moasaad</a>
                </li>
                <li>
                    GitHub : <a href="#" >@moassaad</a>
                </li>
            </ul>
        </div> --}}
        <div class="contact-us flex col-50 margin-0-auto padding-20 radius-5">
            <form method="POST" action="{{ route('contact-us') }}" class="form-contact flex flex-fw-w">
                <div class="col-100">
                    <label for="name" class="">{{__('_pages.contact-us.full-name')}}</label>
                    <input id="name" type="text" name="name" placeholder="{{__('_pages.contact-us.in-full-name')}}" class="col-100 radius-5" />
                </div>
                <div class="col-100">
                    <label for="phone_number" class="">{{__('_pages.contact-us.phone')}}</label>
                    <input id="phone_number" type="text" name="phone_number" placeholder="{{__('_pages.contact-us.in-phone')}}" class="col-100 radius-5"/>
                </div>
                <div class="col-100">
                    <label for="email" class="">{{__('_pages.contact-us.email')}}</label>
                    <input id="email" type="email" name="email" placeholder="{{__('_pages.contact-us.in-email')}}" class="col-100 radius-5"/>
                </div>
                <div class="col-100">
                    <label for="subject" class="">{{__('_pages.contact-us.subject')}}</label>
                    <input id="subject" type="text" name="subject" placeholder="{{__('_pages.contact-us.in-subject')}}" class="col-100 radius-5"/>
                </div>
                <div class="col-100">
                    <label for="message" class="">{{__('_pages.contact-us.message')}}</label>
                    <textarea id="message" name="message" placeholder="{{__('_pages.contact-us.in-message')}}" class="col-100 radius-5" rows="4" cols="50"></textarea>
                </div>
                <div class="col-100">
                    <input class="btn btn-primary col-100 radius-5" type="submit" value="{{__('_pages.contact-us.send-message')}}"/>
                </div>
            </form>
        </div>
    </div>
@endsection