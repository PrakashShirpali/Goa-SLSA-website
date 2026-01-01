@extends('gslsa.layout')

@section('firstlayout-title')
    members
@endsection

@section('first-layout-content')

    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('members') }}</div>
        <table class="table table-bordered">
            @if (isset($members) && !$members->isEmpty())
                @foreach ($members as $member)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $member->title }}</span>
                            <span class="span2">{{ $member->name }}</span>
                            <span class="span3">{{ $member->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $member->role }}</span>
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
