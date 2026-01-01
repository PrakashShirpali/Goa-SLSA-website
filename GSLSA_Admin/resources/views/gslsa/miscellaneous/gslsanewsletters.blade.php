@extends('gslsa.dashboard')

@section('content')

    <form class="form" action="{{ route('GslsaNewsletters.store') }}" method="POST">
        @csrf

        <label for="newsletter_notice">Recruitment notice</label>
        <input class="form-control" type="text" name="newsletter_notice">

        <label for="path">Path</label>
        <input class="form-control" type="text" name="path">

        <button type="submit" class="btn btn-success">Add</button>

    </form>

    @if (isset($GslsaNewsletters) && !$GslsaNewsletters->isEmpty())
    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>sr.no</th>
                    <th>Newsletter notice</th>
                    <th>Path</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php
                    $i = 1;
                @endphp
                @foreach ($GslsaNewsletters as $GslsaNewsletter)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $GslsaNewsletter->newsletter_notice }}</td>
                        <td>{{ $GslsaNewsletter->path }}</td>
                        <td class="d-flex gap-1">
                            <form action="{{ route('GslsaNewsletters.edit', compact('GslsaNewsletter')) }}"
                                method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                            </form>

                            <form action="{{ route('GslsaNewsletters.destroy', compact('GslsaNewsletter')) }}"
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
