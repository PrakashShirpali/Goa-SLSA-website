@extends('gslsa.layout')

@section('firstlayout-title')
    canacona
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('canacona') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaCanaconaMembers) && !$GslsaCanaconaMembers->isEmpty())
                @foreach ($GslsaCanaconaMembers as $GslsaCanaconaMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaCanaconaMember->title }}</span>
                            <span class="span2">{{ $GslsaCanaconaMember->name }}</span>
                            <span class="span3">{{ $GslsaCanaconaMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaCanaconaMember->role }}</span>
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
