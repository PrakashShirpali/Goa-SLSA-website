@extends('gslsa.layout')

@section('firstlayout-title')
    south
@endsection

@section('first-layout-content')

    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('south') }} {{ __('district legal services authorities') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaSouthMembers) && !$GslsaSouthMembers->isEmpty())
                @foreach ($GslsaSouthMembers as $GslsaSouthMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaSouthMember->title }}</span>
                            <span class="span2">{{ $GslsaSouthMember->name }}</span>
                            <span class="span3">{{ $GslsaSouthMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaSouthMember->role }}</span>
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
