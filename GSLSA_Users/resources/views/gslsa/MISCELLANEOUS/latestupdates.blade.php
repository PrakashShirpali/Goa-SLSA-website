@extends('gslsa.layout')

@section('firstlayout-title')
    latest updates
@endsection

@section('first-layout-content')
    <div class="recruitment latest_updates">
        <div class="title">{{ __('Notice Board') }}</div>
        <ul>
            @if (isset($homenotices) && !$homenotices->isEmpty())
                @foreach ($homenotices as $homenotice)
                    <a href="{{ $homenotice->path }}" target="_blank">
                        <li>{{ $homenotice->notice }}
                            @if ($homenotice->updated_at->diffInDays(now()) < 7)
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
