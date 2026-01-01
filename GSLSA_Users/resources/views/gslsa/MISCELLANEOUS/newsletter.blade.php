@extends('gslsa.layout')

@section('firstlayout-title')
    newsletter
@endsection

@section('first-layout-content')
<div class="recruitment newsletter">
    <div class="title">{{ __('Newsletter') }}</div>
        <ul>
            @if (isset($newsletters) && !$newsletters->isEmpty())
                @foreach ($newsletters as $newsletter)
                    <a href="{{ $newsletter->path }}" target="_blank">
                        <li>{{ $newsletter->newsletter_notice }}
                            @if ($newsletter->updated_at->diffInDays(now()) < 7)
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
