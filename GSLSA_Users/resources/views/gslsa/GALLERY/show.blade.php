@extends('gslsa.layout')

@section('firstlayout-title')
    {{ $event->event_title }}
@endsection

@section('first-layout-content')
    <div class="event_details">
        <h1>{{ $event->event_title }}</h1>
        <p>{{ $event->event_description }}</p>
        <a href="{{ route('gallery') }}" class="btn btn-info back">Events</a>
        <div class="media_links">
            <div class="media_link" id="photo">Photos</div>
            <div class="media_link" id="video">Videos</div>
        </div>

        <div class="photos media">
            @if (isset($photos) && !empty($photos))
                @foreach ($photos as $photo)
                    <a href="{{ asset(str_replace(public_path(), '', $photo)) }}" class="glightbox"
                        data-gallery="gallery"><img class="size" src="{{ asset(str_replace(public_path(), '', $photo)) }}"
                            alt="Event Photo"></a>
                @endforeach
            @else
                <div>
                    No photos available.
                </div>
            @endif
        </div>

        <div class="videos media">
            @if (isset($videos) && !empty($videos))
                @foreach ($videos as $video)
                    @php
                        $video = trim($video);
                        preg_match('/[?&]v=([^&#]*)/', $video, $matches);
                        $videoId = $matches[1] ?? null;
                    @endphp

                    @if ($videoId)
                        <iframe class="size" width="560" height="315"
                            src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                            allowfullscreen></iframe>
                    @endif
                @endforeach
            @else
                <div>
                    No videos available.
                </div>
            @endif
        </div>

        {{-- <div class="videos media">
            @if (isset($videos) && !empty($videos))
                @foreach ($videos as $video)
                    <video class="size" controls>
                        <source src="{{ asset(str_replace(public_path(), '', $video)) }}" type="video/mp4">
                    </video>
                @endforeach
            @else
                <div>
                    No videos available.
                </div>
            @endif
        </div> --}}
    </div>
@endsection

@push('cssjs')
    @vite(['resources/css/gallery.css', 'resources/js/gallery.js'])
@endpush
