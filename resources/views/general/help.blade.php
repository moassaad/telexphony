@extends('layouts.app')
@section('title', config('app.name')." | ".__('_pages.help.titlePage'))
@section('content')
    <div class="sections-panner background-image flex col-100 margin-0-auto padding-0-20 height-100p">
        <div class="section-panner col-100 flex flex-ai-c">
            <div class="panner-section col-100">
                <h1 class="">{{__('_pages.help.titlePage')}}</h1>
            </div>
        </div>
    </div>
@endsection

