<header class="sections-header">
    <div class="section-header">
        <div class="section-logo">
            <a class="logo-link" href="{{ route('home') }}">
                {{__('_app.logo.tele')}}<span class="x-logo">X</span>{{__('_app.logo.phony')}}
            </a>
        </div>
        <nav class="section-navbar">
            <ul class="menu-list">
                {{-- <li><a class="menu-link-active @class(['menu-link' => $isActive,])" href="/home">Home</a></li> --}}
                <li><a class="menu-link-active" href="{{ route('home') }}">{{__('_layout.header.home')}}</a></li>
                <li><a class="menu-link" href="{{ route('about') }}">{{__('_layout.header.about')}}</a></li>
                <li><a class="menu-link" href="{{ route('contact-us') }}">{{__('_layout.header.contact-us')}}</a></li>
                <li><a class="menu-link" href="{{ route('help') }}">{{__('_layout.header.help')}}</a></li>
                
            </ul>
            @auth
                <div class="button-profile">
                    <label for="profile-name" class="profile-name"><bdi>{{auth()->user()->full_name}}</bdi></label>
                    <input type="checkbox" name="" id="profile-name" class="">
                    <div class="profile-list">
                        <ul class="">
                            <li><a href="{{ route('report.phone.get') }}">{{__('_layout.header.report-phone')}}</a></li>
                            <li><a href="{{ route('phone.create.get') }}">{{__('_layout.header.create-phone')}}</a></li>
                            <li><a href="{{ route('phone.list') }}">{{__('_layout.header.my-phone')}}</a></li>
                            <li><a href="{{ route('user.profile') }}">{{__('_layout.header.profile')}}</a></li>
                            <li><a href="{{ route('logout') }}">{{__('_layout.header.log-out')}}</a></li>
                        </ul>
                    </div>
                </div>
                
            @else
                <ul class="button-list">
                    <li>
                        <a class="btn btn-primary radius-5" href="{{ route('report.phone.get') }}">{{__('_layout.header.report')}}</a>
                    </li>
                    <li>
                        <a class="btn btn-black radius-5" href="{{ route('login') }}">{{__('_layout.header.log-in')}}</a>
                    </li>
                    
                </ul>
            @endauth
            <ul class="button-list margin-0-20">
                @if (App::isLocale('ar')) 
                    <li><a class=" btn-whait radius-5 " href="{{ route('changeLang', 'en') }}">EN</a></li>
                @elseif(App::isLocale('en'))
                    <li><a class=" btn-whait radius-5" href="{{ route('changeLang', 'ar') }}">ع</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>
<div style="height: 75px;"></div>
<button class="up-to-site btn"> <div class="up-to-site-cu"></div></button>
@if(session('success'))
    <div class="messages message-success"> {{ session('success') }} </div>
@elseif(session('error'))
    <div class="messages message-error"> {{ session('error') }} </div>
@endif
