@extends('gslsa.layout')

@section('firstlayout-title')
    recruitment
@endsection

@section('first-layout-content')
    <div class="recruitment">
        <div class="title">{{ __('Recruitment') }}</div>
            <ul>
                @if (isset($recruitment_notices) && !$recruitment_notices->isEmpty())
                    @foreach ($recruitment_notices as $recruitment_notice)
                        <a href="{{ $recruitment_notice->path }}" target="_blank">
                            <li>{{ $recruitment_notice->recruitment_notice }}
                                @if ($recruitment_notice->updated_at->diffInDays(now()) < 7)
                                    <div class="new-gif">{{ __('New') }}</div>
                                @endif
                            </li>
                        </a>
                    @endforeach
                @endif
            </ul>
    </div>
@endsection

@push('cssjs')
    @vite('resources/css/miscellaneous.css')
@endpush
