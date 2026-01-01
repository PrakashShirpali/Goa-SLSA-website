@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaNotices.update', compact('GslsaNotice')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="notice">Notice</label>
        <input class="form-control" type="text" name="notice" value="{{ $GslsaNotice->notice }}">

        <label for="path">Path</label>
        <input class="form-control" type="text" name="path" value="{{ $GslsaNotice->path }}">


        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
