@extends('gslsa.dashboard')

@section('content')

    <form class="form" action="{{ route('GslsaEvents.store') }}" method="POST">
        @csrf

        <label for="event_title">Title</label>
        <input class="form-control" type="text" name="event_title">

        <label for="event_description">Description</label>
        <input class="form-control" type="text" name="event_description">

        <label for="slug">Slug</label>
        <input class="form-control" type="text" name="slug">

        <label for="event_date">Date</label>
        <input class="form-control" type="date" name="event_date">

        <label for="thumbnail_path">Thumbnail Path</label>
        <input class="form-control" type="text" name="thumbnail_path">

        <button type="submit" class="btn btn-success">Add</button>

    </form>

    @if (isset($GslsaEvents) && !$GslsaEvents->isEmpty())
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>sr.no</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Date</th>
                        <th>Thumbnail Path</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($GslsaEvents as $GslsaEvent)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $GslsaEvent->event_title }}</td>
                            <td>{{ $GslsaEvent->event_description }}</td>
                            <td>{{ $GslsaEvent->slug }}</td>
                            <td>{{ $GslsaEvent->event_date }}</td>
                            <td>{{ $GslsaEvent->thumbnail_path }}</td>
                            <td class="d-flex gap-1">
                                <form action="{{ route('GslsaEvents.edit', compact('GslsaEvent')) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                                </form>

                                <form action="{{ route('GslsaEvents.destroy', compact('GslsaEvent')) }}" method="POST">
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
