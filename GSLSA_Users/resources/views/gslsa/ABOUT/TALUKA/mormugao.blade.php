@extends('gslsa.layout')

@section('firstlayout-title')
    mormugao
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('mormugao') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaMormugaoMembers) && !$GslsaMormugaoMembers->isEmpty())
                @foreach ($GslsaMormugaoMembers as $GslsaMormugaoMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaMormugaoMember->title }}</span>
                            <span class="span2">{{ $GslsaMormugaoMember->name }}</span>
                            <span class="span3">{{ $GslsaMormugaoMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaMormugaoMember->role }}</span>
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
