@extends('layouts.app')
@section('title', config('app.name').' | '.__('_report.pages.list.titlePage'))
@section('content')
    {{-- @if(session('success'))
        <div class="messages message-success"> {{ session('success') }} </div>
        @elseif(session('error'))
        <div class="messages message-success"> {{ session('error') }} </div>
    @endif --}}
    <div class="padding-20 margin-0-auto">
        <div class="flex flex-jc-sb">
            <div class="form">

            </div>
            <div class="flex">
                <a href="{{ route('phone.report.create.get',$phoneID) }}" class="btn btn-successfuly radius-5">{{__('_report.text.new-report')}}</a>
                <a href="{{ route('phone.list') }}" class="btn btn-black margin-0-10 radius-5">{{__('_phone.text.list-phone')}}</a>
            </div>
        </div>
    </div>
    @if (!empty($reports))
        <div>
            <table class="col-100 radius-5">
                <thead>
                    <tr>
                        <td>{{__('_report.field.report-text')}}</td>
                        <td class="w-150p">{{__('_report.field.status')}}</td>
                        <td class="w-140p">{{__('_report.field.updated-at')}}</td>
                        <td class="w-100p">{{__('_app.text.action')}}</td>
                    </tr>
                </thead>
                <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->report_text }}</td>
                        <td>
                            <div class="status status-{{ $status->get($report->status)->status_en() }} radius-5">
                                {{ $status->get($report->status)->status(App::currentLocale()) }}
                            </div>
                        </td>
                        <td>{{ $report->updated_at }}</td>
                        <td>
                            <div class="flex flex-jc-sb col-100">
                                <a href="{{ route('phone.report.edit.get',$report->ReportID) }}" class="btn-icon" title="{{__('_report.text.edit-report')}}">
                                    <i class="icon-edit"></i>
                                </a>
                                {{-- <a href="{{ route('phone.report.list',$phone->PhoneID) }}" class="btn-icon" title="Report List">
                                    <i class="icon-list"></i>
                                </a> --}}
                                <form action="{{ route('phone.report.delete',$report) }}" method="post" class="fit-content">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn-icon" title="{{__('_report.text.delete-report')}}">
                                        <i class="icon-delete"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex flex-jc-c">
            <h3>{{__('_report.text.nf-report')}}</h3>
        </div>
    @endif
@endsection