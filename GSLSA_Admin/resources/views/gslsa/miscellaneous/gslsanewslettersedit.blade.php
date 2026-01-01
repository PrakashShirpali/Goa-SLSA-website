@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaNewsletters.update', compact('GslsaNewsletter')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="newsletter_notice">Newsletter notice</label>
        <input class="form-control" type="text" name="newsletter_notice"
            value="{{ $GslsaNewsletter->newsletter_notice }}">

        <label for="path">Path</label>
        <input class="form-control" type="text" name="path" value="{{ $GslsaNewsletter->path }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
