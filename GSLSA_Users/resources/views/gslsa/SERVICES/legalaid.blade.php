@extends('gslsa.layout')

@section('firstlayout-title')
    legal aid
@endsection

@section('first-layout-content')
    <div class="what_is">
        <span class="legaltitles">{{ __('Q1') }}</span>
        <br>
        <p class="legaldesc">{{ __('Q1 description') }}</p>
    </div>

    @if (isset($legal_heir) && !$legal_heir->isEmpty())
        <div class="legal_heir">
            <div class="contain">
                <div class="img-contain">
                    <img src="{{ $legal_heir->first()->path }}" alt="">
                    <div class="post-div">
                        <span class="name">{{ $legal_heir->first()->name }}</span>
                        <span class="role">{{ $legal_heir->first()->role }}</span>
                    </div>
                </div>
                <div class="info-contain">
                    <p class="info">{{ __('Legal_heir_info p1', ['name' => $legal_heir->first()->name]) }}
                        <br>
                        {{ __('Legal_heir_info p2', ['role' => $legal_heir->first()->role]) }}
                        <br>
                        <span class="contact_no">{{ __('Legal_heir_info p3', ['contact' => $legal_heir->first()->contact_no]) }}</span>
                    </p>
                    <span class="note">{{ __('Note') }}</span>
                </div>
            </div>
        </div>
    @endif

    <div class="what_is legaldesc">
        <span class="legaltitles">{{ __('Q2') }}</span>

        <br>

        {{ __('Q2 desc p1') }}

        <br><br>

        {{ __('Q2 desc p2') }}
        <ul>
            <li>{{ __('Q2 desc l1') }}</li>
            <li>{{ __('Q2 desc l2') }}</li>
            <li>{{ __('Q2 desc l3') }}</li>
            <li>{{ __('Q2 desc l4') }}</li>
            <li>{{ __('Q2 desc l5') }}</li>
        </ul>

        {{ __('Q2 desc p3') }}

        <br><br>

        {{ __('Q2 desc p4') }}

        <br><br>

        <span class="legaltitles"> {{ __('Q3') }}</span>

        <br>

        {{ __('Q3 desc p1') }}
        <ul>
            <li>{{ __('Q3 desc l1') }}</li>
            <li>{{ __('Q3 desc l2') }}</li>
            <li>{{ __('Q3 desc l3') }}</li>
            <li>{{ __('Q3 desc l4') }}</li>
            <li>{{ __('Q3 desc l5') }}</li>
            <li>{{ __('Q3 desc l6') }}</li>
        </ul>

    </div>
@endsection

@push('cssjs')
    @vite(['resources/css/legalaid.css'])
@endpush
