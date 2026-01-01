@extends('gslsa.dashboard')

@section('content')
    <form class="form" action="{{ route('GslsaYoutubeVideos.store') }}" method="POST">
        @csrf

        <label for="title">Title</label>
        <input class="form-control" type="text" name="title">

        <label for="link">Link</label>
        <input class="form-control" type="text" name="link">

        <button type="submit" class="btn btn-success w-25">Add</button>

    </form>

    @if (isset($GslsaYoutubeVideos) && !$GslsaYoutubeVideos->isEmpty())
    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>sr.no</th>
                    <th>Title</th>
                    <th>Link</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php
                    $i = 1;
                @endphp
                @foreach ($GslsaYoutubeVideos as $GslsaYoutubeVideo)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $GslsaYoutubeVideo->title }}</td>
                        <td>{{ $GslsaYoutubeVideo->link }}</td>
                        <td class="d-flex gap-1">
                            <form action="{{ route('GslsaYoutubeVideos.edit', compact('GslsaYoutubeVideo')) }}"
                                method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                            </form>

                            <form action="{{ route('GslsaYoutubeVideos.destroy', compact('GslsaYoutubeVideo')) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bi-trash3-fill"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection
