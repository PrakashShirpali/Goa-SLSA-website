@extends('gslsa.layout')

@section('firstlayout-title')
    bardez
@endsection

@section('first-layout-content')
    <div class="contain">
        <div class="main_title">{{ __('GOA STATE') }} {{ __('LEGAL SERVICES AUTHORITY') }}</div>
        <div class="sub_title">{{ __('bardez') }} {{ __('taluka legal services committee') }}</div>
        <table class="table table-bordered">
            @if (isset($GslsaBardezMembers) && !$GslsaBardezMembers->isEmpty())
                @foreach ($GslsaBardezMembers as $GslsaBardezMember)
                    <tr class="trs">
                        <td class="tds">
                            <span class="span1">{{ $GslsaBardezMember->title }}</span>
                            <span class="span2">{{ $GslsaBardezMember->name }}</span>
                            <span class="span3">{{ $GslsaBardezMember->post }}</span>
                        </td>
                        <td class="tds">
                            <span class="span4">{{ $GslsaBardezMember->role }}</span>
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
