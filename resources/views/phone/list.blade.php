@extends('layouts.app')
@section('title', config('app.name').' | '.__('_phone.pages.list.titlePage'))
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
            <div>
                <a href="{{ route('phone.create.get') }}" class="btn btn-successfuly radius-5">{{__('_phone.text.new-phone')}}</a>
            </div>
        </div>
    </div>
<div>
    <table class="col-100 radius-5">
        <thead>
            <tr>
                <td>{{__('_phone.field.phone-name')}}</td>
                <td>{{__('_phone.field.model')}}</td>
                <td class="w-150p">{{__('_phone.field.serial-number')}}</td>
                <td class="w-150p">{{__('_phone.field.imei')}}</td>
                <td class="w-150p">{{__('_phone.field.imei2')}}</td>
                <td class="w-140p">{{__('_phone.field.updated-at')}}</td>
                {{-- <td class="w-100p">status</td> --}}
                <td class="w-100p">{{__('_app.text.action')}}</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($phones as $phone)
            <tr>
                <td>{{ $phone->phone_name }}</td>
                <td>{{ $phone->model }}</td>
                <td>{{ $phone->serial_number }}</td>
                <td>{{ $phone->imei }}</td>
                <td>{{ $phone->imei2 }}</td>
                <td>{{ $phone->updated_at }}</td>
                {{-- <td>
                    <div class="status status-{{ $phone->status }} radius-5">
                        {{ $phone->status }}
                    </div>
                </td> --}}
                <td>
                    <div class="flex flex-jc-sb col-100">
                        <a href="{{ route('phone.edit.get',$phone->PhoneID) }}" class="btn-icon" title="{{__('_phone.text.edit-phone')}}">
                            <i class="icon-edit"></i>
                        </a>
                        <a href="{{ route('phone.report.list',$phone->PhoneID) }}" class="btn-icon" title="{{__('_report.text.list-report')}}">
                            <i class="icon-list"></i>
                        </a>
                        <form action="{{ route('phone.delete',$phone) }}" method="post" class="fit-content">
                            @method('DELETE')
                            @csrf
                            <button class="btn-icon" title="{{__('_phone.text.delete-phone')}}">
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
@endsection