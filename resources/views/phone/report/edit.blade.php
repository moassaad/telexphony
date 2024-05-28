@extends('layouts.app')
@section('title', config('app.name').' | '.__('_report.pages.edit.titlePage'))
@section('content')
    <div class="sections-report-phony">
        <div class="section-report-phony padding-20 margin-0-auto">
            <form method="POST" action="{{ route('phone.report.edit.post', $report) }}" class="form-report-phony max-width-727p flex flex-fw-w flex-jc-c padding-10 radius-5">
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
                @method('PUT')
                @csrf
                <div class="flex flex-fw-w col-100">
                    <div class="col-100 padding-10">
                        <label for="status" class="">{{__('_report.field.status')}}</label>
                        {{-- <select id="status" name="status" value="{{ $report->status }}" class="col-100 height-36p radius-5">
                            <option value="0">-</option>
                            <option value="1">stolen</option>
                            <option value="2">missing</option>
                            <option value="3">found</option>
                        </select> --}}
                        <select id="status" name="status" value="{{ old('status') }}" class="col-100 height-36p radius-5">
                            {{-- <option value="0">-</option> --}}
                            @foreach ($statusList as $status)
                                <option 
                                @if ($report->status == $status->id())
                                    selected
                                @endif
                                value="{{ $status->id() }}">{{ $status->status(App::currentLocale()) }}</option>
                            @endforeach
                        </select>
                        @error('status') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                    <div class="col-100 padding-10">
                        <label for="report_text" class="">{{__('_report.field.report-text')}}</label>
                        <textarea id="report_text" name="report_text" placeholder="{{__('_report.text.in-report-text')}}" class="col-100 height-72p radius-5">{{ $report->report_text }}</textarea>
                        @error('report_text') <div class="alert alert-danger">* {{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="flex flex-jc-sb flex-ai-c col-100 padding-10">
                    <div class="col-100 flex">
                        <button class="btn btn-primary radius-5 col-50" type="submit" name="submit" value="Update">{{__('_app.text.update')}}</button>
                        <a href="{{ route('phone.list') }}" class="btn btn-black radius-5 col-25 margin-0-10" >{{__('_app.text.cancel')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection