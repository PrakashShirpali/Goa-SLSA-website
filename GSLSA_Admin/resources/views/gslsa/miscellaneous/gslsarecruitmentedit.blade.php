@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaRecruitments.update', compact('GslsaRecruitment')) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="recruitment_notice">Recruitment notice</label>
        <input class="form-control" type="text" name="recruitment_notice"
            value="{{ $GslsaRecruitment->recruitment_notice }}">

        <label for="path">Path</label>
        <input class="form-control" type="text" name="path" value="{{ $GslsaRecruitment->path }}">

        <button type="submit" class="btn btn-info">update</button>

    </form>
@endsection
