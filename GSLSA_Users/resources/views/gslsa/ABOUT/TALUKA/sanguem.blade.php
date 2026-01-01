@extends('gslsa.layout')

@section('firstlayout-title')
    sanguem
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('sanguem') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaSanguemMembers) && !$GslsaSanguemMembers->isEmpty())
                @foreach ($GslsaSanguemMembers as $GslsaSanguemMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaSanguemMember->title }}</span>
                            <span class="span2">{{ $GslsaSanguemMember->name }}</span>
                            <span class="span3">{{ $GslsaSanguemMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaSanguemMember->role }}</span>
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
