@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaYoutubeVideos.update', compact('GslsaYoutubeVideo')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $GslsaYoutubeVideo->title }}">

        <label for="link">Link</label>
        <input class="form-control" type="text" name="link" value="{{ $GslsaYoutubeVideo->link }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
