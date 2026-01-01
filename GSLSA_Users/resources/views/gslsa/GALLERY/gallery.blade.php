@extends('gslsa.layout')

@section('firstlayout-title')
    gallery
@endsection

@section('first-layout-content')
    <div class="event_container">
        @if (isset($events) && !$events->isEmpty())
            @foreach ($events as $event)
            <a href="{{ route('event.show', $event->slug) }}" class="card text-bg-dark event">
                <img src="{{ $event->thumbnail_path }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <span class="event_name">{{ $event->event_title }}</span>
                    <span class="event_date">{{ $event->event_date }}</span>
                </div>
            </a>
            @endforeach
            @else
            <p>No events found.</p>
        @endif
    </div>
@endsection

@push('cssjs')
    @vite('resources/css/gallery.css')
@endpush
