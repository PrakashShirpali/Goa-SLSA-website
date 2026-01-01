@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaEvents.update', compact('GslsaEvent')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="event_title">Title</label>
        <input class="form-control" type="text" name="event_title" value="{{ $GslsaEvent->event_title }}">

        <label for="event_description">Description</label>
        <input class="form-control" type="text" name="event_description" value="{{ $GslsaEvent->event_description }}">

        <label for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{ $GslsaEvent->slug }}">

        <label for="event_date">Date</label>
        <input class="form-control" type="date" name="event_date" value="{{ $GslsaEvent->event_date }}">

        <label for="thumbnail_path">Thumbnail Path</label>
        <input class="form-control" type="text" name="thumbnail_path" value="{{ $GslsaEvent->thumbnail_path }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
