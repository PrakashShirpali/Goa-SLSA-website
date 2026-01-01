@extends('gslsa.dashboard')

@section('content')

    <form class="form" action="{{ route('GslsaRecruitments.store') }}" method="POST">
        @csrf

        <label for="recruitment_notice">Recruitment notice</label>
        <input class="form-control" type="text" name="recruitment_notice">

        <label for="path">Path</label>
        <input class="form-control" type="text" name="path">

        <button type="submit" class="btn btn-success">Add</button>

    </form>

    @if (isset($GslsaRecruitments) && !$GslsaRecruitments->isEmpty())
    <div class="table-responsive">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>sr.no</th>
                    <th>Recruitment notice</th>
                    <th>Path</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php
                    $i = 1;
                @endphp
                @foreach ($GslsaRecruitments as $GslsaRecruitment)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $GslsaRecruitment->recruitment_notice }}</td>
                        <td>{{ $GslsaRecruitment->path }}</td>
                        <td class="d-flex gap-1">
                            <form action="{{ route('GslsaRecruitments.edit', compact('GslsaRecruitment')) }}"
                                method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                            </form>

                            <form action="{{ route('GslsaRecruitments.destroy', compact('GslsaRecruitment')) }}"
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
