@extends('gslsa.dashboard')

@section('content')
<form class="form" action="{{ route('GslsaLegalheirs.store') }}" method="POST">
    @csrf

    <label for="name">Name</label>
    <input class="form-control" type="text" name="name">

    <label for="role">Role</label>
    <input class="form-control" type="text" name="role">

    <label for="contact_no">Contact.No</label>
    <input class="form-control" type="text" name="contact_no">

    <label for="path">Path</label>
    <input class="form-control" type="text" name="path">

    <button type="submit" class="btn btn-success">Add</button>

</form>

@if (isset($GslsaLegalheirs) && !$GslsaLegalheirs->isEmpty())
<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>sr.no</th>
                <th>Name</th>
                <th>Role</th>
                <th>Contact.no</th>
                <th>Path</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @php
                $i = 1;
            @endphp
            @foreach ($GslsaLegalheirs as $GslsaLegalheir)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $GslsaLegalheir->name }}</td>
                    <td>{{ $GslsaLegalheir->role }}</td>
                    <td>{{ $GslsaLegalheir->contact_no }}</td>
                    <td>{{ $GslsaLegalheir->path }}</td>
                    <td class="d-flex gap-1">
                        <form action="{{ route('GslsaLegalheirs.edit', compact('GslsaLegalheir')) }}"
                            method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary bi-pencil-fill"></button>
                        </form>

                        <form action="{{ route('GslsaLegalheirs.destroy', compact('GslsaLegalheir')) }}"
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
