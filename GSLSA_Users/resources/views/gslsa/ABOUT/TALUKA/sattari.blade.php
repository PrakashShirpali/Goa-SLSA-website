@extends('gslsa.layout')

@section('firstlayout-title')
    sattari
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('sattari') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaSattariMembers) && !$GslsaSattariMembers->isEmpty())
                @foreach ($GslsaSattariMembers as $GslsaSattariMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaSattariMember->title }}</span>
                            <span class="span2">{{ $GslsaSattariMember->name }}</span>
                            <span class="span3">{{ $GslsaSattariMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaSattariMember->role }}</span>
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
