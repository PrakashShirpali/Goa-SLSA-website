@extends('gslsa.layout')

@section('firstlayout-title')
    about
@endsection

@section('first-layout-content')
    @if (isset($members) && !$members->isEmpty())
        <div class="container">
            <div class="row justify-content-center p-4">
                @foreach ($members as $index => $member)
                    @if ($index == 0)
                        <div class="col-12 text-center mb-3">
                            <div class="card mx-auto" style="width: 18rem;">
                                <span class="role">{{ $member->role }}</span>
                                <img src="{{ $member->image_path }}" class="card-img-top">
                                <span class="title">{{ $member->title }}</span>
                                <span class="name">{{ $member->name }}</span>
                            </div>
                        </div>
                    @elseif ($index == 1 || $index == 2)
                        <div class="col-md-6 d-flex justify-content-center text-center mb-3">
                            <div class="card" style="width: 18rem;">
                                <span class="role">{{ $member->role }}</span>
                                <img src="{{ $member->image_path }}" class="card-img-top">
                                <span class="title">{{ $member->title }}</span>
                                <span class="name">{{ $member->name }}</span>
                            </div>
                        </div>
                    @elseif ($index == 3)
                        <div class="col-12 text-center">
                            <div class="card mx-auto" style="width: 18rem;">
                                <span class="role">{{ $member->role }}</span>
                                <img src="{{ $member->image_path }}" class="card-img-top">
                                <span class="title">{{ $member->title }}</span>
                                <span class="name">{{ $member->name }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    <div id="intro" class="introduction">
        <h1 class="title">{{ __('Introduction') }}</h1>
        <p class="desc">{{ __('IntroductionP1') }}
            <br>
            <br>
            {{ __('IntroductionP2') }}
        </p>
    </div>

    <div class="introduction">
        <h1 class="title">{{ __('Affiliation') }}</h1>
        <p class="desc">
            {{ __('AffiliationP1') }}
            <br>
            <br>
            {{ __('AffiliationP2') }}
            <br>
            <br>
            {{ __('AffiliationP3') }}
            <br>
            <br>
            {{ __('AffiliationP4') }}
        </p>
    </div>
@endsection

@push('cssjs')
    @vite(['resources/css/about.css'])
@endpush
