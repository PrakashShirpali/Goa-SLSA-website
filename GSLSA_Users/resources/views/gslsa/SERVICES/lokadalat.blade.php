@extends('gslsa.layout')

@section('firstlayout-title')
    lok adalat
@endsection

@section('first-layout-content')
    <div class="lok-adalat-container">
        <p>{{ __('Lok_Adalat_desc') }}</p>

        <br>

        <h3 class="lok-titles">{{ __('Nature of Cases to be Referred to Lok Adalat') }}</h3>

        <ol>
            <li>{{ __('Nature of Cases to be Referred to Lok Adalat l1') }}</li>
            <li>{{ __('Nature of Cases to be Referred to Lok Adalat l2') }}</li>
        </ol>

        <span>{{ __('Nature of Cases to be Referred to Lok Adalat p1') }}</span>

        <br><br>

        <h4 class="lok-titles">{{ __('Permanent Lok Adalat') }}</h4>

        <p>{{ __('Permanent Lok Adalat desc') }}</p>

        <br>

        <h4 class="lok-titles">{{ __('Features:') }}</h4>

        <ul>
            <li>{{ __('Features l1') }}</li>
            <li>{{ __('Features l2') }}</li>
            <li>{{ __('Features l3') }}</li>
            <li>{{ __('Features l4') }}</li>
        </ul>

        <span>{{ __('Features p1') }}</span>

        <br><br>

        <h4 class="lok-titles">{{ __('National Lok Adalat') }}</h4>

        <p>{{ __('National Lok Adalat desc') }}</p>

        <h4 class="lok-titles">{{ __('Mobile Lok Adalat') }}</h4>

        <span>{{ __('Mobile Lok Adalat desc') }}</span>
    </div>
@endsection

@push('cssjs')
    @vite('resources/css/lokadalat.css')
@endpush