@extends('gslsa.dashboard')

@section('content')

    <form class="form" action="{{ route('GslsaNotices.store') }}" method="POST">
        @csrf

        <label for="notice">Notice</label>
        <input class="form-control" type="text" name="notice">
        <label for="path">Path</label>
        <input class="form-control" type="text" name="path">

        <button type="submit" class="btn btn-success">Add</button>

    </form>

    @if (isset($GslsaNotices) && !$GslsaNotices->isEmpty())
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>sr.no</th>
                        <th>Notice</th>
                        <th>Path</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($GslsaNotices as $GslsaNotice)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $GslsaNotice->notice }}</td>
                            <td>{{ $GslsaNotice->path }}</td>
                            <td class="d-flex gap-1">
                                <form action="{{ route('GslsaNotices.edit', compact('GslsaNotice')) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                                </form>
    
                                <form action="{{ route('GslsaNotices.destroy', compact('GslsaNotice')) }}" method="POST">
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
