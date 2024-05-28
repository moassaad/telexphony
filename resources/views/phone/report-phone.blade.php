@extends('layouts.app')
@section('title', config('app.name').' | '.__('_phone.pages.report-phone.titlePage'))
@section('content')
    <div class="sections-report-phony">
        <div class="section-report-phony padding-20 margin-0-auto">
            <form method="POST" action="{{ route('report.phone.post') }}" class="form-report-phony max-width-727p flex flex-fw-w flex-jc-c padding-10 radius-5">
                <div class="section-logo height-64p">
                    <a class="logo-link" href="#">
                        {{__('_app.logo.tele')}}<span class="x-logo">X</span>{{__('_app.logo.phony')}}
                    </a>
                </div>
                {{-- @if(session('success'))
                    <div class="box box-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="box box-danger">{{ session('error') }}</div>
                @endif --}}
                @csrf
                <div class="flex flex-fw-w col-100">
                    <div class="col-100 padding-10">
                        <label for="phone-name" class="">{{__('_phone.field.phone-name')}}</label>
                        <input id="phone-name" type="text" name="phone_name" value="{{ old('phone_name') }}" placeholder="{{__('_phone.text.in-phone-name')}}" class="col-100 height-36p radius-5"/>
                        @error('phone_name') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-50 padding-10">
                        <label for="model" class="">{{__('_phone.field.model')}}</label>
                        <input id="model" type="text" name="model" value="{{ old('model') }}" placeholder="{{__('_phone.text.in-model')}}" class="col-100 height-36p radius-5"/>
                        @error('model') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-50 padding-10">
                        <label for="status" class="">{{__('_report.field.status')}}</label>
                        <select id="status" name="status" value="{{ old('status') }}" class="col-100 height-36p radius-5">
                            <option value="0">-</option>
                            @foreach ($statusList as $status)
                                <option 
                                @if (old('status') == $status->id())
                                    selected
                                @endif
                                value="{{ $status->id() }}">{{ $status->status(App::currentLocale()) }}</option>
                            @endforeach
                        </select>
                        @error('status') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-33 padding-10">
                        <label for="imei" class="">{{__('_phone.field.imei')}}</label>
                        <input id="imei" type="text" name="imei" value="{{ old('imei') }}" placeholder="{{__('_phone.text.in-imei')}}" class="col-100 height-36p radius-5"/>
                        @error('imei') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-33 padding-10">
                        <label for="imei" class="">{{__('_phone.field.imei2-option')}}</label>
                        <input id="imei" type="text" name="imei2" value="{{ old('imei2') }}" placeholder="{{__('_phone.text.in-imei')}}" class="col-100 height-36p radius-5"/>
                        @error('imei2') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-33 padding-10">
                        <label for="serial-number" class="">{{__('_phone.field.serial-number')}}</label>
                        <input id="serial-number" type="text" name="serial_number" value="{{ old('serial_number') }}" placeholder="{{__('_phone.text.in-serial')}}" class="col-100 height-36p radius-5"/>
                        @error('serial_number') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-100 padding-10">
                        <label for="report_text" class="">{{__('_report.field.report-text')}}</label>
                        <textarea id="report_text" name="report_text" placeholder="{{__('_report.text.in-report-text')}}" class="col-100 height-72p radius-5">{{ old('report_text') }}</textarea>
                        @error('report_text') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex flex-jc-sb flex-ai-c col-100 padding-10">
                    <div class="col-100">
                        <button class="btn btn-primary radius-5 col-100" type="submit" name="submit" value="ReportPhoney">{{__('_phone.text.report-phone')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection