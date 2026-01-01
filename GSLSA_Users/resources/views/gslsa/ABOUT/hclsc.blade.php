@extends('gslsa.layout')

@section('firstlayout-title')
    hclsc
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('high court legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaHclscMembers) && !$GslsaHclscMembers->isEmpty())
                @foreach ($GslsaHclscMembers as $GslsaHclscMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaHclscMember->title }}</span>
                            <span class="span2">{{ $GslsaHclscMember->name }}</span>
                            <span class="span3">{{ $GslsaHclscMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaHclscMember->role }}</span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection

@push('cssjs')
    @vite(['resources/css/about.css'])
@endpush
