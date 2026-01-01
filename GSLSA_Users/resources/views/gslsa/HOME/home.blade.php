@extends('gslsa.layout')

@section('firstlayout-title')
    home
@endsection

@section('first-layout-content')
    <div class="home-content">
        <div class="home-div1">

            <div id="carouselExampleCombined" class="home-carousel carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">

                <div class="carousel-indicators">
                    @if (isset($events) && !$events->isEmpty())
                        @foreach ($events as $index => $event)
                            <button type="button" data-bs-target="#carouselExampleCombined"
                                data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    @endif
                </div>

                <div class="carousel-inner">
                    @if (isset($events) && !$events->isEmpty())
                        @foreach ($events as $index => $event)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                                data-event-slug="{{ $event->slug }}">
                                <a href="{{ route('event.show', $event->slug) }}" class="card-link">
                                    <img src="{{ $event->thumbnail_path }}" class="d-block w-100" alt="...">
                                    <div class="event_details">
                                        <div class="event_name">{{ $event->event_title }}</div>
                                        <div class="event_date">{{ $event->event_date }}</div>
                                    </div>
                                    <div class="card">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title">{{ __('Access to Justice for All') }}</h5>
                                            <p class="card-text">{{ __('Your Rights, Our Responsibility') }}</p>
                                            <span class="tollfree">
                                                {{ __('Toll-Free Helpline Number') }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCombined"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    {{-- <span class="visually-hidden">Previous</span> --}}
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCombined"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    {{-- <span class="visually-hidden">Next</span> --}}
                </button>
            </div>


            <div class="notice-board">
                <div class="title">{{ __('Notice Board') }}</div>
                <div class="scroll-div">
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
            </div>

        </div>

        <div class="home-div2">

            <div class="youtube">
                <div id="video-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-indicators">
                        @if (isset($youtubelinks) && !$youtubelinks->isEmpty())
                            @foreach ($youtubelinks as $index => $youtubelink)
                                <button type="button" data-bs-target="#carouselExampleCombined"
                                    data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        @endif
                    </div>
                    <div class="carousel-inner" id="carousel-inner">
                        @if (isset($youtubelinks) && !$youtubelinks->isEmpty())
                            @foreach ($youtubelinks as $index => $youtubelink)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <iframe src="https://www.youtube.com/embed/{{ $youtubelink->link }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                    </iframe>
                                    <div class="videotag">
                                        {{ $youtubelink->title }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#video-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#video-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>


            <div class="about">
                <div class="title">{{ __('Brief Intro') }}</div>
                <div class="description">{{ __('Brief Intro description') }}</div>
                <a href="{{ route('about_us') }}#intro" class="btn">{{ __('read more') }}<i
                        class="bi bi-chevron-double-right"></i></a>
            </div>

        </div>

        <div class="home-div3">
            <h1>{{ __('Services') }}</h1>
            <div class="content">
                <a class="image-div" href="{{ route('legalaid') }}">
                    <img src="images/legalaid.png" alt="legal aid">
                    <span>{{ __('Legal Aid') }}</span>
                </a>
                <a class="image-div" href="{{ route('lokadalat') }}">
                    <img src="images/lok_adalat.png" alt="lok adalat">
                    <span>{{ __('Lok Adalat') }}</span>
                </a>
            </div>
        </div>

        <div class="home-div4">
            <h1 class="title">{{ __('Objective') }}</h1>
            <p class="desc">
                " {{ __('Objective description') }}"
            </p>
        </div>
    </div>
@endsection

@push('cssjs')
    @vite('resources/css/home.css')
@endpush
