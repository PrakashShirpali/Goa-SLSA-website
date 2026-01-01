@extends('gslsa.layout')

@section('firstlayout-title')
    bicholim
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('bicholim') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaBicholimMembers) && !$GslsaBicholimMembers->isEmpty())
                @foreach ($GslsaBicholimMembers as $GslsaBicholimMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaBicholimMember->title }}</span>
                            <span class="span2">{{ $GslsaBicholimMember->name }}</span>
                            <span class="span3">{{ $GslsaBicholimMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaBicholimMember->role }}</span>
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
