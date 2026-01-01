@extends('gslsa.layout')

@section('firstlayout-title')
    pernem
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('pernem') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaPernemMembers) && !$GslsaPernemMembers->isEmpty())
                @foreach ($GslsaPernemMembers as $GslsaPernemMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaPernemMember->title }}</span>
                            <span class="span2">{{ $GslsaPernemMember->name }}</span>
                            <span class="span3">{{ $GslsaPernemMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaPernemMember->role }}</span>
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
