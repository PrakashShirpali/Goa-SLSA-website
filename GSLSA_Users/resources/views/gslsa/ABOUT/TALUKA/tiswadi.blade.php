@extends('gslsa.layout')

@section('firstlayout-title')
    tiswadi
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('tiswadi') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaTiswadiMembers) && !$GslsaTiswadiMembers->isEmpty())
                @foreach ($GslsaTiswadiMembers as $GslsaTiswadiMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaTiswadiMember->title }}</span>
                            <span class="span2">{{ $GslsaTiswadiMember->name }}</span>
                            <span class="span3">{{ $GslsaTiswadiMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaTiswadiMember->role }}</span>
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
