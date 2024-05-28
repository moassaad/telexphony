@extends('layouts.app')
@section('title', config('app.name')." | ".__('_pages.about.titlePage'))
@section('content')
    <div class="sections-panner background-image flex col-100 margin-0-auto padding-0-20 height-100p">
        <div class="section-panner col-100 flex flex-ai-c">
            <div class="panner-section col-100">
                <h1>{{__('_pages.about.titlePage')}}</h1>
                <p>{{__('_pages.about.subtitle')}}</p>
            </div>
        </div>
    </div>
    <article class="article col-100">
        <h3 class="subtitle">{{__('_pages.about.title1')}}</h3>
        <p class="paragraph">{{__('_pages.about.para1')}}</p>
        <h3 class="subtitle">{{__('_pages.about.title2')}}</h3>
        <p class="paragraph">{{__('_pages.about.para2')}}</p>
        {{-- <h3 class="subtitle">What is "Find My Phoney" ?</h3> --}}
        {{-- <h4 class="subtitle-1">What is "Find My Phoney" ?</h4> --}}
        {{-- <h5 class="subtitle-2">What is "Find My Phoney" ?</h5> --}}
        {{-- <p class="paragraph">What is "Find My Phoney" ?</p> --}}
        {{-- <a href="" class="link">What is "Find My Phoney" ?</a> --}}

    </article>
@endsection