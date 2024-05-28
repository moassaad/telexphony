@extends('layouts.app')
@section('title', config('app.name').' | '.__('_phone.pages.search.titlePage').' : '.$imei)
@section('content')
    <div class="sections-panner background-image flex col-100 margin-0-auto padding-0-20 height-300p">
        <div class="section-panner col-100 flex flex-ai-c">
            <div class="panner-section col-100">
                <h1 class="">{{__('_phone.pages.search.titlePage')}}</h1>
                <p class="margin-bottom-50">{{__('_phone.field.imei')}}: {{ $imei }}</p>
                {{-- @error('imei') <div class="alert alert-danger alert-center">{{ $message }}</div> @enderror --}}
                {{-- @if(session('success'))
                    <div class="alert alert-danger alert-center">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-center">{{ session('error') }}</div>
                @endif --}}
                <form action="{{route('phone.search.imei.post')}}" method="post" class="form-search flex flex-jc-c max-width-727p margin-0-auto">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="search" name="imei" value="{{ $imei }}" placeholder="{{__('_phone.text.in-imei')}}" class="form-input col-80 radius-5 @error('imei') is-invalid @enderror">
                    <button type="submit" class="custom-button-search btn btn-primary col-20 radius-5">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="section-body-phony-list padding-20">
        <ul class="list-cards">
            @if ($table)
                @foreach ($table as $model)
                    <li class="phony-list-card max-width-727p margin-0-auto margin-bottom-20">
                        <div class="data-card">
                            <div class="title-card padding-10 ">
                                <h3 class="phone-name" >{{ $model->phone_name }}</h3>
                                <div>
                                    <span class="status status-{{ $model->status }} radius-5">{{ $model->status }}</span>
                                    <span class="last-update radius-5">{{ $model->updated_at }}</span>
                                </div>
                            </div>
                            <div class="card-baisc-data flex flex-fw-w padding-10">
                                <div class="card-data-bold col-100">
                                    <ul class="flex flex-fw-w card-data-bold col-100">
                                        <li class="col-33 padding-0-10">{{__('_phone.text.pn')}}    : <span>{{ $model->phone_name }}</span></li>
                                        <li class="col-33 padding-0-10">{{__('_phone.field.model')}}: <span>{{ $model->model }}</span></li>
                                        <li class="col-33 padding-0-10">{{__('_phone.field.imei')}} : <span>{{ $imei }}</span></li>
                                        <li class="col-33 padding-0-10">{{__('_phone.text.s/n')}}   : <span>{{ $model->serial_number }}</span></li>
                                        <li class="col-33 padding-0-10">{{__('_user.text.owner')}}  : <span>{{ $model->full_name }}</span></li>
                                        <li class="col-33 padding-0-10">{{__('_user.text.phone')}}  : <span>{{ $model->phone_number }}</span></li>
                                        <li class="report-text col-100 padding-0-10 radius-5">{{__('_report.field.report-text')}}: <span>{{ $model->report_text }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-jc-fs col-100 padding-0-10">
                            <a href="tel::{{ $model->phone_number }}" title="{{__('_phone.text.call-owner')}}" class="btn btn-black radius-5 col-33">{{__('_phone.text.call-owner')}}</a>
                            {{-- <a href="{{ route('phone.search.imei.details.post',$model->ReportID ) }}" title="Show Details" class="btn btn-primary radius-5 margin-0-10 col-33">Show Details</a> --}}
                            {{-- <a href="#" title="Hide" class="btn btn-primary radius-5 col-33">Hide</a> --}}
                        </div>
                    </li>
                @endforeach
            @else
                <h2 class="flex flex-jc-c">{{__('_phone.text.nf-result')}}</h2>
            @endif
            
        </ul>
    </div>
@endsection