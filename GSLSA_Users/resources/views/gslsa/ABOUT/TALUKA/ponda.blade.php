@extends('gslsa.layout')

@section('firstlayout-title')
    ponda
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('ponda') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaPondaMembers) && !$GslsaPondaMembers->isEmpty())
                @foreach ($GslsaPondaMembers as $GslsaPondaMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaPondaMember->title }}</span>
                            <span class="span2">{{ $GslsaPondaMember->name }}</span>
                            <span class="span3">{{ $GslsaPondaMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaPondaMember->role }}</span>
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
