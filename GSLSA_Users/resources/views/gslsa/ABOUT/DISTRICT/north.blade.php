@extends('gslsa.layout')

@section('firstlayout-title')
    north
@endsection

@section('first-layout-content')

    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('north') }} {{ __('district legal services authorities') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaNorthMembers) && !$GslsaNorthMembers->isEmpty())
                @foreach ($GslsaNorthMembers as $GslsaNorthMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaNorthMember->title }}</span>
                            <span class="span2">{{ $GslsaNorthMember->name }}</span>
                            <span class="span3">{{ $GslsaNorthMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaNorthMember->role }}</span>
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
